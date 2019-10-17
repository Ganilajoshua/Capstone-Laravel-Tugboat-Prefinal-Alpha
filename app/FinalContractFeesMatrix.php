<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FinalContractFeesMatrix extends Model
{
    protected $table = 'tblfinalcontractfeesmatrix';
    protected $primaryKey = 'intContractFeesID';
    protected $fillable = [
        'intFinalContractFeesID', 
        'intFCFContractListID', 
        'enumFCFServiceType', 
        'fltFCFStandardRate', 
        'fltFCFTugboatDelayFee', 
        'fltFCFViolationFee', 
        'fltFCFConsigneeLateFee', 
        'fltFCFMinDamageFee', 
        'fltFCFMaxDamageFee', 
        'intFCFDiscountFee',
    ];
}
