<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'user_id',
        'type',
        'name',
        'comp_id',
        'comp_vat',
        'phone',
        'email',
        'address',
        'city',
        'country',
        'postcode',
        'comment',
        'vip',
        'bank',
        'bank_account',
        'photo',
        ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function profile() {
        return $this->belongsTo('App\Profile', 'user_id');
    }

    public function file() {
        return $this->hasMany('App\File');
    }
}
