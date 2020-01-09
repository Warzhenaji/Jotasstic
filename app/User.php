<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'bio',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = ['avatar'];

    public function getPossessiveNameAttribute() {
        $name = $this->attributes['name'];
        $lastLetter = strtolower($name[strlen($name) - 1]);
        if ($lastLetter === 's') {
            return $name."'";
        }
        return $name."'s";
    }

    public function getFullNameAttribute() {
        return $this->name . ' ' . $this->last_name;
    }

    public function getJoinDateAttribute() {
        return date('M jS, Y', strtotime($this->attributes['created_at']));
    }

    public function getAvatarAttribute() {
        $hashString = md5($this->attributes['email']);
        return 'https://api.adorable.io/avatars/250/'.$hashString.'.png';
    }

    public function posts() {
        return $this->hasMany(Post::class);
    }

    public function invitation() {
        return $this->hasOne(Invitation::class, 'email', 'email');
    }  
}
