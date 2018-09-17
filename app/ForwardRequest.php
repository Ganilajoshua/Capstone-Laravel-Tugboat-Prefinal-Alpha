<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ForwardRequest extends Model
{
    protected $table = 'tblrequest';
    protected $primaryKey = 'intRequestID';
    protected $fillable = [
        'strRequestDescription',
        'intRJobOrderID',
        'intRCompanyID',
        'intRForwardCompanyID',
        'enumRequestType',
        'boolDeleted',  
    ];
}
