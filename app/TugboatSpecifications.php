<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TugboatSpecifications extends Model
{
    protected $table = 'tbltugboatspecs';
    public $primaryKey = 'intTugboatSpecsID';
    protected $fillable = [
        'strHullMaterial',
        'strBuilder',
        'strMakerPower',
        'strDrive',
        'strCylinderperCycle',
        'strAuxEngine',
        'strLocationBuilt',
        'datBuiltDate',
        'enumAISGPSVHFRadar',
        'boolDeleted',
    ];
    public function tugboatSpecifications()
    {
        return $this->hasOne('App\Tugboat','intTTugboatSpecsID');
    }
    
}
