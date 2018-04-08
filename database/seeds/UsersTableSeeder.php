<?php

use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->truncate();
        DB::table('role_user')->truncate();

//        $faker = Faker\Factory::create();
        // Create Admin
        $user = User::create([
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'email' => 'admin@domain.com',
            'password' => bcrypt('admin'),
            'role' => 'Admin'
        ]);

        // Find Admin Role
        $adminRole = Role::where('name', 'admin')->first();


        // Add User Roles
        $user->attachRole($adminRole);

        // Create Developer
        $developer = User::create([
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'email' => 'developer@domain.com',
            'password' => bcrypt('developer'),
            'role' => 'Developer'
        ]);

        // Find Developer Role
        $developerRole = Role::where('name', 'developer')->first();

        // Add User Roles
        $developer->attachRole($developerRole);
    }
}
