<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseRequest extends Model
{
    protected $fillable = [
    	'art_id',
        'name',
        'email',
        'accepted_at',
        'paid_at',
        'fulfilled_at',
        'rejected_at',
        'rejection_reason',
    ];
}
