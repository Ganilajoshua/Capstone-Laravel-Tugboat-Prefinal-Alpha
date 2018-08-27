<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TugboatType extends Model
{
    protected $table = 'tbltugboattype';
    protected $primaryKey = 'intTugboatTypeID';
    protected $fillable = [
        'intTugboatTypeID',
        'strTugboatTypeName',
        'boolDeleted',
    ];

    public function class()
    {
        return $this->hasMany('App\TugboatClass','intTTugboatTypeID');
    }
}
