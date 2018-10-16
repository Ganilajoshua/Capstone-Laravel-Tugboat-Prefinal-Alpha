<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 'tbllocation';
    protected $primaryKey = 'intLocationID';
    protected $fillable = [
        'intLocationID', 
        'intLDispatchTicketID', 
        'strLocationDesc', 
        'strLocation', 
        'tmLocationTime', 
        'boolDeleted',
    ];

}
