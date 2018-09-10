<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    protected $table = 'tblservices';
    protected $primaryKey = 'intServicesID';
    protected $fillable = [
        'strServicesName',
        'boolDeleted'   
    ];
}
