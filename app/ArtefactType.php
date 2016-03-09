<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArtefactType extends Model
{
    //
    protected $table="artefacttypes";

    protected $fillable = [
        'artefacttypecode',
        'artefacttypepid',
        'artefacttypedescription',
        'artefacticon',
        'sequencenumber',
    ];
}
