<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $fillable = ['follow', 'follower'];
    public $timestamps = false;
}
