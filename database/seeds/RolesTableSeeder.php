<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('roles')->truncate();

        $roles = [
            'admin' => 'Admin',
            'visitor' => 'Visitor',
            'project_owner' => 'Project owner',
            'member' => 'Member',
            'supporting_stuff' => 'Supporting stuff',
        ];

        foreach ($roles as $role => $roleDetails) {
            Role::create([
                'name' => $role,
                'display_name' => $roleDetails,
                'description' => null
            ]);
        }
    }
}
