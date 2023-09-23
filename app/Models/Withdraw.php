<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Withdraw extends Model
{
    use HasFactory;

    protected $fillable = [
        'session',
        'amount',
        'type',
        'user_id',
        'supervisor_id',
        'user_fullname',
        'supervisor_fullname',
        'one_thousand_bills',
        'five_hundred_bills',
        'two_hundred_bills',
        'one_hundred_bills',
        'fifty_bills',
        'twenty_bills',
        'coins',
        'dollars',
        'ten_coins',
        'five_coins',
        'two_coins',
        'one_coins',
        'cash_in_register',
        'dollars_in_register',
    ];
}
