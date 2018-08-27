<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quotations extends Model
{
    protected $table = 'tblquotation';
    protected $primaryKey = 'intQuotationID';
    protected $fillable = [
        'intQAgreementID',
        'strQuotationTitle',
        'strQuotationDesc',
        'isAssigned', 
        'fltStandardRate',
        'fltQuotationTDelayFee',  
        'fltQuotationViolationFee', 
        'fltQuotationConsigneeLateFee', 
        'fltMinDamageFee', 
        'fltMaxDamageFee', 
        'intDiscount',
        'boolDeleted',
    ];
    public function contract()
    {
        return $this->hasOne('App\Contract','intCQuotationID');
    }
    public function quotationfees()
    {
        return $this->hasMany('App\QuotationFees','intQFQuotationID');
    }
    // public function agreement(){
    //     return $this->hasOne('App\Agreements','intAQuotationID');
    // }
}
