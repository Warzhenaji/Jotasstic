<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
    	'user_id',
		'commentable_id',
		'commentable_type',
		'comment_body',
    ];

    public function commentable() {
    	return $this->morphTo();
    }

    public function comment() {
    	return $this->morphOne(Comment::class, 'commentable');
    }

    public function user() {
    	return $this->belongsTo(User::class);
    }
}
