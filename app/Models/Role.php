<?php

namespace App\Models;

use Zizaco\Entrust\EntrustRole;
use Illuminate\Support\Facades\Config;


class Role extends EntrustRole
{
    protected $fillable = ['name','display_name','is_active','description'];

    /**
     * Many-to-Many relations with the user model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(Config::get('auth.providers.users.model'), Config::get('entrust.role_user_table'),Config::get('entrust.role_foreign_key'),Config::get('entrust.user_foreign_key'));
    }
}