<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attachments extends Model
{
    protected $table = 'tblattachments';
    public $primaryKey = 'intAttachmentsID';
    protected $fillable = [
        'strAttachmentsDesc',
        'boolDeleted',
    ];

    public function contracts(){
        return $this->belongsTo('App\Contract','intCAttachmentsID');
    }

}
