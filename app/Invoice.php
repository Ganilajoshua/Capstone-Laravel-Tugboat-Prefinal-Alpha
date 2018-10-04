<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = 'tblinvoice';
    protected $primaryKey = 'intInvoiceID';
}
