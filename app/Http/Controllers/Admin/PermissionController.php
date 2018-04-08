<?php

namespace App\Http\Controllers\Admin;

use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['permissions'] = Permission::latest()->paginate(10);

        return view('admin.permissions.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:permissions',
            'display_name' => 'required|unique:permissions',
        ]);

        $permission = new Permission();
        $permission->name         = strtolower($request->input('name'));
        $permission->display_name = $request->input('display_name');;
        $permission->description  = $request->input('description');; // optional
        $permission->save();

        return back()->with('status', ['type' => 'success', 'message' => 'Successfully Saved']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['permission'] = Permission::findOrFail($id);
        return view('admin.permissions.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|unique:permissions,name,'. $id,
            'display_name' => 'required|unique:permissions,display_name,'. $id,
        ]);

        $permission = Permission::find($id);
        $permission->name        = strtolower($request->input('name'));
        $permission->display_name = $request->input('display_name');
        $permission->description  = $request->input('description');
        $permission->save();

        return back()->with('status', ['type' => 'success', 'message' => 'Successfully Updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('permission_role')->where('permission_id', $id)->delete();
        $permission = Permission::find($id);
        $permission->delete();

        return $this->index();
    }
}
