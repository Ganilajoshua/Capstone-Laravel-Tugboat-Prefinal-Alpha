<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobOrder extends Model
{
    protected $table = 'tbljoborder';
    protected $primaryKey = 'intJobOrderID';
    protected $fillable = [
        'intJobOrderID', 
        'intJOBerthID', 
        'strJOStartPoint',
        'strJODestination',
        'intJOBargeID',
        'intJOGoodsID',
        'intJOCompanyID',
        'intJOttachmentsID',
        'strJODesc',
        'strJOVesselName',
        'dtmETA',
        'dtmETD',
        'enumStatus',
        'fltWeight',
        'boolDeleted',
        'intJOVesselTypeID',
        'enumServiceType',
        'datStartDate',
        'datEndDate',
        'tmStart',
        'tmEnd',
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
