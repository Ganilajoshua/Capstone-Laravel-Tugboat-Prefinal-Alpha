<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hauling extends Model
{
    protected $table = 'tblhauling';
    protected $primaryKey = 'intHaulingID';
    protected $filable= [
        'intHaulingID', 
        'intHJobSchedID', 
        'intHLocationID', 
        'intBerthID', 
        'intHServicesID', 
        'intHAttachmentsID', 
        'strHaulingDesc', 
        'strDestinationPoint', 
        'enumStatus', 
        'strPermitsAttachments', 
        'datPreparationStart', 
        'dateStarted', 
        'datHaulingEnd',
        'boolDeleted', 
    ];
}
