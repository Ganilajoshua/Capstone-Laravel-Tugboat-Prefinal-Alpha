<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobOrder extends Model
{
    protected $table = 'tbljoborder';
    protected $primaryKey = 'intJobOrderID';
    protected $fillable = [
        'intJOBerthID',
        'intJOBargeID',
        'intJOVesselID',
        'intJOCompanyID',
        'intJOGoodsID',
        'intJOAttachmentsID',
        'strJODesc',
        'dtmETA',
        'dtmETD',
        'dtTransaction',
        'fltWeight',
        'enumStatus',
        'boolDeleted',
    ];

    public function company()
    {
        return $this->belongsTo('App\Company','intSCompanyID');
    }
    public function barge()
    {

    }
    public function vessel()
    {

    }
    public function berth()
    {

    }

}
