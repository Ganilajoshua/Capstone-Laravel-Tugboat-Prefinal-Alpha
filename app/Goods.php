<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    protected $table = 'tblgoods';
    protected $primaryKey = 'intGoodsID';
    protected $fillable = [
        'strGoodsName',
        'fltRateperTon',
        'boolDeleted',
    ];

}
