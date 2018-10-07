<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContractFeesMatrix extends Model
{
    protected $table = 'tblcontractfeesmatrix';
    protected $primaryKey = 'intContractFeesID';
    protected $fillable = [
        'intContractFeesID', 
        'enumServiceType',
        'fltCFStandardRate', 
        'fltCFDelayFee', 
        'fltCFViolationFee', 
        'fltCFMinDamageFee', 
        'fltCFMaxDamageFee', 
        'intCFDiscount',
    ];


}
