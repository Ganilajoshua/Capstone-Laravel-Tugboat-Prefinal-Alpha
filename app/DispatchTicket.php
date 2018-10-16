<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DispatchTicket extends Model
{
    protected $table = 'tbldispatchticket';
    protected $primaryKey = 'intDispatchTicketID';
    protected $fillable = [
<<<<<<< HEAD
        'boolAApprovedby',
        'boolCApprovedby',
        'strConsigneeSign',
        'strAdminSign',
        'strDispatchTicketDesc',
        'boolDeleted',
=======
>>>>>>> 7712b1c15e8e7dacf060f59ec77af195931decb9
    ];

}
