<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thoughts extends Model
{
    protected $table = "thoughts";

    protected $fillable = [
         "description", "user_id",
    ];

    public $timestamps = false;
}
