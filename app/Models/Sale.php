<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    protected $fillable = [
        'description',
        'user_id',
        'cluster_id',
        'adult',
        'kid',
        'senior',
        'disabled',
        'birthday',
        'amount',
        'amount_card',
        'amount_dollar',
        'amount_cash',
        'gender_male',
        'gender_female',
        'session',
        'user_fullname',
        'stall',
        'state',
        'scanned_at',
        'cancelled_by',
        'dollar_change',
        'card_voucher',
    ];
}
