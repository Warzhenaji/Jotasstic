<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    protected $fillable = [
    	'token',
		'email',
		'expires_at',
		'registered_at',
    ];

    public function markUsed() {
    	$this->attributes['registered_at'] = date('Y-m-d H:i:s');
    	$this->update();
    }
}
