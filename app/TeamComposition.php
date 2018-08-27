<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeamComposition extends Model
{
    protected $table = 'tblteamcomp';
    public $primaryKey = 'intTeamCompositionID';
    protected $fillable = [
        'intTCCaptainNumber',
        'intTCChiefEngineerNumber',
        'intTCCrewNumber',
        'inrTCOthersNumber',
        'intTCCompanyID',
        'boolDeleted',
    ];
}
