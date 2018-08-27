<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'tblteam';
    public $primaryKey = 'intTeamID';
    protected $fillable = [
        'strTeamName',
        'boolDeleted',
    ];
    public function teamassignment(){
        return $this->hasOne('App\TeamAssignment','intTATeamID');
    }
}
