<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VesselType extends Model
{
    protected $table = 'tblvesseltype';
    protected $primaryKey = 'intVesselTypeID';
    protected $fillable = [
        'strVesselTypeName',
        'isActive',
        'boolDeleted',
    ];
}
