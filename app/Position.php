<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $table = 'tblposition';
    protected $primaryKey = 'intPositionID';
    protected $fillable = [
        'intPositionID',
        'strPositionName',
        'intPCompanyID',
        'boolDeleted',
    ];

    public function employee(){
        return $this->hasOne('App\Employees','intEPositionID');
    }
}
