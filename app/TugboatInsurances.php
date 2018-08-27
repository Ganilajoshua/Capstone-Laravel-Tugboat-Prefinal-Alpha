<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TugboatInsurances extends Model
{
    protected $table = 'tbltugboatinsurance';
    public $primaryKey = 'intTugboatInsuranceID';
    protected $fillable = [
        'intTITugboatID',
        'strTugboatInsuranceDesc',
        'boolDeleted',
    ];
}
