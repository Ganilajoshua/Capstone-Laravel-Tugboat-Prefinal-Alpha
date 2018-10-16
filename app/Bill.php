<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = 'tblbill';
    protected $primaryKey = 'intBillID';
}
