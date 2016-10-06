<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thoughts extends Model
{
    protected $fillable = [
         'description', 'user_id',
    ];

}
