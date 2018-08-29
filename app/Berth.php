<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Berth extends Model
{
    protected $table = 'tblberth';
    protected $primaryKey = 'intBerthID';
    protected $fillable = [
        'intBPierID',
        'strBerthName',
        'isActive',
        'boolDeleted',
    ];

    public function piers()
    {
        return $this->belongsTo('App\Pier','intPierID');
    }
}