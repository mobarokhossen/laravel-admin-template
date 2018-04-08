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
        DB::table('students')->truncate();
        DB::table('addresses')->truncate();
        DB::table('notification_systems')->truncate();

//        $faker = Faker\Factory::create();

        // For Default Address Setting for Users
        $country = \App\Models\Country::where('countryName', 'Bangladesh')->first();
        $state = \App\Models\State::where('name', 'Dhaka')->first();
        $city = \App\Models\City::where('name', 'Dhaka')->first();

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

        // Create Developer
        $institution = User::create([
            'first_name' => 'institution',
            'last_name' => '1',
            'email' => 'institution@domain.com',
            'password' => bcrypt('institution'),
            'role' => 'Institution',
            'is_verify' => 1
        ]);

        // Find Developer Role
        $institutionRole = Role::where('name', 'institution')->first();

        // Add User Roles
        $institution->attachRole($institutionRole);



        $data = [];
        $data['country_id'] = $country->id;
        $data['city_id'] = $city->id;
        $data['state_id'] = $state->id;

        $institution->address()->create($data);

        // Create Developer
        $student = User::create([
            'first_name' => 'Student',
            'last_name' => '1',
            'email' => 'student@domain.com',
            'password' => bcrypt('student'),
            'role' => 'Student',
            'is_verify' => 1
        ]);

        // Find Developer Role
        $studentRole = Role::where('name', 'student')->first();

        // Add User Roles
        $student->attachRole($studentRole);

        $inputs = [];
        $student->student()->create($inputs);
        $studentID = \App\Models\Student::where('user_id', $student->id)->first();

        $inputs['sms'] = 1;
        $inputs['email'] = 1;
        $inputs['calender'] = 1;

        $studentID->notification()->create($inputs);

        $student->address()->create($data);
    }
}
