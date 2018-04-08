<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use Notifiable, EntrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'username', 'email', 'password', 'dob', 'phone', 'gender', 'verify_code',
        'verify_date', 'is_verify', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'is_verify', 'verify_code'
    ];


    // User have must address

    /**
     * @return bool
     */
    public function address()
    {
        return $this->hasOne(Address::class,'user_id' );
    }

    // User can have student

    /**
     * @return bool
     */
    public function student()
    {
        return $this->hasOne(Student::class,'user_id' );
    }

}
