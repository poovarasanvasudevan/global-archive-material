<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    //

    protected $fillable = [
        'code','description',
    ];

    public function location() {
        return $this->belongsTo('App\User');
    }
}
