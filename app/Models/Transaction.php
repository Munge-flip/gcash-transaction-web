<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'date',
        'time_period',
        'type',
        'amount',
        'status',
        'fee',
    ];
}
