<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Catagory extends Model
{
    //for soft deletion
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    //To know all the questions of a catagory
    public function questions()
    {
        return $this->hasMany('App\Question');

    }
}
