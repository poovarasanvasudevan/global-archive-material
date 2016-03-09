<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Kodeine\Acl\Traits\HasRole;

class User extends Authenticatable
{
    use HasRole;

    protected $table="users";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */


    protected $fillable = [
        'firstname','lastname','location','abhyasiid', 'email', 'password','image',"quotes",
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
