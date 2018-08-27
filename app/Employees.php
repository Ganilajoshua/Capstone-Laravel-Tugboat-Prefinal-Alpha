<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    protected $table = 'tblemployee';
    protected $primaryKey = 'intEmployeeID';
    protected $fillable = [
        'intECompanyID',
        'intEPositionID',
        'intETeamID',
        'enumEmpType',
        'strFName',
        'strMName',
        'strLName',
        'boolDeleted',
    ];

    public function position()
    {
        return $this->belongsTo('App\Position','intEPositionID');
    }
}
