<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DispatchTicket extends Model
{
    protected $table = 'tbldispatchticket';
    protected $primaryKey = 'intDispatchTicketID';
    protected $fillable = [
        'boolAApprovedby',
        'boolCApprovedby',
        'strConsigneeSign',
        'strAdminSign',
        'strDispatchTicketDesc',
        'boolDeleted',
    ];

}
