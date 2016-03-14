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
        'firstname','middlename','lastname','location','abhyasiid', 'email', 'password','image',"quotes","address","mobile",
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function location() {
        return $this->hasOne('App\Location');
    }
}
