<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $table ='tblcontractlist';
    public $primaryKey ='intContractListID';
    protected $fillable = [
        'intCAgreementID',
        'intCAttachmentsID',
        'intCQuotationID',
        'intCStandardID',
        'intCTermsConditionsID',
        'intCCompanyID',
        'strContractListTitle',
        'strContractListDesc',
        'isPending',
        'datContractActive',
        'datContractExpire',
        'enumConValidity',
        'enumStatus',
        'isFinalized',
        'boolDeleted',
    ];

    public function company(){
        return $this->belongsTo('App\Company','intCCompanyID');
    }
    public function attachments(){
        return $this->belongsTo('App\Attachments','intCAttachmentsID');   
    }
    public function termscondition(){
        return $this->belongsTo('App\TermsandCondition','intCTermsConditionID');
    }
    public function agreements(){
        return $this->belongsTo('App\Agreements','intCAgreementID');
    }
    public function quotations(){
        return $this->belongsTo('App\Quotations','intCQuotationID');
    }
    public function standard(){
        return $this->belongsTo('App\Standard','intCStandardID');
    }
}
