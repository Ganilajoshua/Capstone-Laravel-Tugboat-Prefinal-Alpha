<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JoborderForwardRequests extends Model
{
    protected $table = 'tbljoborderforwardrequests';
    protected $primaryKey = 'intJOForwardRequestsID';
    protected $fillable = [
        'intJOForwardRequestsID', 
        'intJOFRJobOrderID', 
        'strJOFRDescription', 
        'intJOFRForwardCompanyID', 
        'enumStatus', 
        'strRequestCompanyName', 
        'boolDeleted',
    ];
}
