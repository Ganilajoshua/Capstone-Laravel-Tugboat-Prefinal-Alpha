<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pier extends Model
{
    protected $table = 'tblpier';
    protected $primaryKey = 'intPierID';
    protected $fillable = [
        'isActive',
        'strPierName',
        'boolDeleted',
    ];

    public function berth()
    {
        return $this->hasMany('App\Berth','intBPierID');
    }   
}
