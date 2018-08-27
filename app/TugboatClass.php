<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TugboatClass extends Model
{
    protected $table = 'tbltugboatclass';
    public $primaryKey = 'intTugboatClassID';
    protected $fillable = [
        'strOwner',
        'strTugboatFlag',
        'intTCTugboatTypeID',
        'strClassNum',
        'strOfficialNum',
        'strIMONum',
        'strTradingArea',
        'strHomePort',
        'enumISPSCodeCompliance',
        'enumISMCodeStandard',
        'boolDeleted',
    ];
    public function tugboatClass()
    {
        return $this->hasOne('App\Tugboat','intTTugboatClassID');
    }
    public function type(){
        return $this->belongsTo('App\TugboatType','intTTugboatTypeID');
    }
}
