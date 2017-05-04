<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Client extends Model
{
    use \Venturecraft\Revisionable\RevisionableTrait;
    protected $revisionCleanup = true; //Remove old revisions (works only when used with $historyLimit)
    protected $revisionCreationsEnabled = true;
    protected $historyLimit = 50; //Maintain a maximum of 500 changes at any point of time, while cleaning up old revisions.
    protected $revisionFormattedFieldNames = array(
        'name' => 'vardą',
        'created_at' => 'Sukurtas',
        'vip' => 'svarbą',
        'type' => 'tipą',
        'comp_id' => 'įmonės kodą',
        'comp_vat' => 'PVM kodą',
        'phone' => 'telefoną',
        'email' => 'el. paštą',
        'address' => 'adresą',
        'city' => 'miestą',
        'country' => 'šalį',
        'postcode' => 'pašto kodą',
        'comment' => 'komentarą',
        'bank' => 'banką',
        'bank_account' => 'banko sąskaitą',
        'photo' => 'nuotrauką/logotipą',

    );

    use Searchable;

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

    public function toSearchableArray()
    {
        $array = $this->toArray();

        $array = [
            $this->type,
            $this->name,
            $this->comp_id,
            $this->address,
            $this->city,
            $this->vip ,
        ];

        return $array;
    }

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
