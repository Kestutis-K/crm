<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use \Venturecraft\Revisionable\RevisionableTrait;
    protected $revisionCleanup = true; //Remove old revisions (works only when used with $historyLimit)
    protected $revisionCreationsEnabled = true;
    protected $historyLimit = 50; //Maintain a maximum of 500 changes at any point of time, while cleaning up old revisions.

    protected $fillable =
        [
            "user_id",
            "client_id",
            "comment",

        ];


}
