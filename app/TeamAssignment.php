<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeamAssignment extends Model
{
    protected $table = 'tbltugboatassign';
    public $primaryKey = 'intTAssignID';
    protected $fillable = [
        'intTATugboatID',
        'intTATeamID',
        'strTADesc',
        'enumStatus',
        'boolDeleted',
    ];
    public function tugboat(){
        return $this->belongsTo('App\Tugboat','intTATugboatID');
    }
    public function team(){
        return $this->belongsTo('App\Team','intTATeamID');
    }
}
