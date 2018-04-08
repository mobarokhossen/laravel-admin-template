<?php

namespace App\Http\Controllers\Auth;

use App\Models\City;
use App\Models\Country;
use App\Models\Role;
use App\Models\State;
use App\Models\User;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/register';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        //Check Duplicate users
        $user = $this->hasUser($data['email']);

        if($user != "Has User"){

            //  Verify Token generate by date and email MD5
            $token = md5(Carbon::today().$data['email']);

            if($this->sendVerifyToken($token, $data['email'])){

                if($user == "Not User"){
                    User::create([
                        'email' => $data['email'],
                        'role' => $data['role'],
                        'password' => bcrypt($data['password']),
                        'verify_code' => $token,
                    ]);
                }elseif ($user=="Not Verify User"){

                    $user = User::where('email', $data['email'])->first();

                    $user->update([
                            'verify_code' => $token,
                            'role' => $data['role'],
                            'password' => bcrypt($data['password']),
                        ]);

                }

                $type  = "status";
                $message = "Please check your mail and click Confirm Verification link";

            }
        }else{
            $type  = "error";
            $message = "Already Register User";
        }

        Session::flash($type, $message);

        return true;
    }


    protected function sendVerifyToken($token, $email){

        $url = route('verify.registration', $token);

        Mail::send('common.verifyTokenMail', ['url' => $url], function ($message) use($email){

            $message->to($email);
            $message->subject('AddAlarm Registration Confirmation');
            $message->from('info@addalarm.com','AddAlarm');
        });

        return true;
    }

    public function verifyByUser($id){

        $user = User::where('verify_code', $id)->first();

        // Find Developer Role
        $userRole = Role::where('name', $user->role)->first();

        DB::beginTransaction();
            try{
            // Add User Roles
            $user->attachRole($userRole);
            $user->update(
                [
                    'verify_date' => Carbon::today()->toDateTimeString(),
                    'is_verify' => 1
                ]
            );

            if($user->role == "student"){

                // Sync as a  student
                $inputs = [];
                $user->student()->create($inputs);

                $inputs['sms'] = 1;
                $inputs['email'] = 1;
                $inputs['calender'] = 1;

                // Sync for Notification
                $studentID = \App\Models\Student::where('user_id', $user->id)->first();
                $studentID->notification()->create($inputs);

            }

            // Default Setting Address for Users
            $country = Country::where('countryName', 'Bangladesh')->first();
            $state = State::where('name', 'Dhaka')->first();
            $city = City::where('name', 'Dhaka')->first();

            $inputs = [];
            $inputs['country_id'] = $country->id;
            $inputs['city_id'] = $city->id;
            $inputs['state_id'] = $state->id;
            $user->address()->create($inputs);

                DB::commit();

            }catch (\Exception $e){
                DB::rollback();
            }


        return redirect('/login');
    }


    private function hasUser($email){

        $verifyUser = User::where('email', $email)->where('is_verify',1)->first();

        if($verifyUser)
        {
            return "Has User";

        } else{
            $notVerifyUser = User::where('email', $email)
                                ->whereNull('is_verify')
                                ->first();
            if($notVerifyUser){
                return "Not Verify User";
            }else{
                return "Not User";
            }
        }

    }


}
