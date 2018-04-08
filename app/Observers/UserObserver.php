<?php
/**
 * Created by PhpStorm.
 * User: Sovon
 * Date: 9/25/2017
 * Time: 11:34 AM
 */

namespace App\Observers;

use App\User;
use Illuminate\Support\Facades\Auth;

class UserObserver
{
    /**
     * Listen to the User created event.
     *
     * @param  User  $user
     * @return void
     */
    public function created(User $user)
    {
        if (Auth::check()) {
            $user->created_by = Auth::user()->id;
        }
    }

    /**
     * Listen to the User updated event.
     *
     * @param  User  $user
     * @return void
     */
    public function updated(User $user)
    {
        if (Auth::check()) {
            $user->updated_by = Auth::user()->id;
        }
    }
}