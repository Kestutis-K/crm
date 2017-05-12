<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'user_id',
        'firstname',
        'lastname',
        'position',
        'email',
        'phone',
        'photo',
        'birthday',
    ];

    protected $uploads = '/images/';

    public function getFileAttribute($photo){
        return $this->uploads . $photo;
    }

    public function users() {
        return $this->hasOne('App\User');
    }






}
