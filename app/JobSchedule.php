<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobSchedule extends Model
{
    protected $table = 'tbljobsched';
    protected $primaryKey = 'intJobSchedID';
    protected $fillable = [
        'intJSJobOrderID',
        'intJSSchedID',
        'intJSTugboatAssignID',
        'boolDeleted',
    ];
}
