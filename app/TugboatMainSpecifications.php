<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TugboatMainSpecifications extends Model
{
    protected $table = 'tbltugboatmain';
    public $primaryKey = 'intTugboatMainID';
    protected $fillable = [
        'strLength',
        'strBreadth',
        'strDepth',
        'strHorsepower',
        'strMaxSpeed',
        'strBollardPull',
        'strGrossTonnage',
        'strNetTonnage',
        'datLastDrydocked',
        'boolDeleted',
    ];

    public function tugboat(){
        return $this->hasOne('App\Tugboat','intTTugboatMainID');
    }
}
