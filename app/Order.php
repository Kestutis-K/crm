<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Order extends Model
{
    use \Venturecraft\Revisionable\RevisionableTrait;
    protected $revisionCleanup = true; //Remove old revisions (works only when used with $historyLimit)
    protected $revisionCreationsEnabled = true;
    protected $historyLimit = 50; //Maintain a maximum of 500 changes at any point of time, while cleaning up old revisions.

    use Searchable;

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

    protected $fillable =
        [
            'user_id',
            'client_id',
            'stage',
            'products',
            'advance',
            'delivery_date',
            'contract',
            'contract_no',
        ];

    public function clients() {
        return $this->belongsToMany('App\Client');
    }

}
