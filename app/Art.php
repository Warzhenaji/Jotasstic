<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Art extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'user_id', 'media',
    ];

    public function user() {
    	return $this->belongsTo(User::class);
    }
}