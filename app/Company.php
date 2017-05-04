<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use \Venturecraft\Revisionable\RevisionableTrait;

    protected $fillable =
        [
            'title',
            'comp_id',
            'comp_vat',
            'address',
            'country',
            'postcode',
            'register_nr',
            'email',
            'phone',
            'fax',
            'mob_phone',
            'website',
            'logo',
        ];
}
