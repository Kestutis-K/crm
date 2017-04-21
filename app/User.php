<?php

namespace App;

use Illuminate\Notifications\Notifiable;
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
        'name', 'email', 'password', 'remember_token', 'role_id', 'is_active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

//    public static function boot(){
//        parent::boot();
//
//        // Attach event handler, on deleting of the user
//        User::deleting(function($user)
//        {
//            // Delete all tricks that belong to this user
//            foreach ($user->profile as $profile) {
//                $profile->delete();
//            }
//        });
//    }

    public function role() {
        return $this->belongsTo('App\Role');
    }

    public function profile() {
        return $this->hasOne('App\Profile', 'user_id');
    }
}
