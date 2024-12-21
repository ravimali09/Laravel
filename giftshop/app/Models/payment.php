<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_id', 
        'item_name', 
        'amount', 
        'currency', 
        'status', 
        'payer_id', 
        'payer_email', 
        'payer_name',
    ];
}
