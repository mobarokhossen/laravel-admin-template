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
            'developer' => 'Developer',
            'admin' => 'Admin',
            'student' => 'Student',
            'institution' => 'Institution',
            'management' => 'Management',
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
