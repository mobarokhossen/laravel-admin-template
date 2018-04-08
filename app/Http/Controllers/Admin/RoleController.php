<?php

namespace App\Http\Controllers\Admin;

use App\Models\Permission;
use App\Models\Role;
use Dompdf\Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['roles'] = Role::latest()->paginate(10);

        return view('admin.roles.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['permissions'] = Permission::get();

        return view('admin.roles.create', $data);
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
            'name' => 'required|unique:roles',
            'display_name' => 'required|unique:roles',
        ]);

        try{
            $role = new Role();
            $role->name = strtolower(str_replace(' ', '_', $request->input('name')));
            $role->display_name = $request->input('display_name');;
            $role->description  = $request->input('description');; // optional
            $role->save();

            $role->perms()->sync($request->input('permissions'));

            return back()->with('status', ['type' => 'success', 'message' => 'Successfully Saved']);
        }catch( Exception $exception ){
            return back()->with('status', ['type' => 'error', 'message' => 'Unable to Add']);
        }


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
        $data['permissions'] = Permission::get();
        $data['model']= $role = Role::findOrFail($id);
        $data['rolePermissions'] = $role->perms()->pluck('id')->toArray();

        return view('admin.roles.edit', $data);
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
            'name' => 'required|unique:roles,name,'. $id,
            'display_name' => 'required|unique:roles,display_name,'. $id,
        ]);

        if(!Auth::user()->can('super-admin')) {
            return redirect()->back();
        }

        $role = Role::find($id);

        if($this->isModifiableRole($role->name)) {
            $role->name = strtolower(str_replace(' ', '_', $request->input('name')));
        }

        $role->display_name = $request->input('display_name');
        $role->description  = $request->input('description');
        $role->save();

        $role->perms()->sync($request->input('permissions'));

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
        $role = Role::find($id);

        if ($this->isModifiableRole($role->name)) {
            $role->delete();
        }

        return $this->index();
    }

    /**
     * Get restricted roles that can't be edited or deleted
     *
     * @return array
     */
    private function restrictedRoles()
    {
        return ['admin', 'developer', 'merchant', 'ambassador'];
    }

    /**
     * Check if role is editable or deletable
     *
     * @param $role
     * @return bool
     */
    private function isModifiableRole($role)
    {
        return !in_array($role, $this->restrictedRoles());
    }
}
