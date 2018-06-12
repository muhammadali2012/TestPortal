<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Option extends Model
{
    //
    //
    use SoftDeletes;
    protected $dates = ['deleted_at'];


    //To know the question  of a option
    public function question()
    {
        return $this->belongsTo('App\Question');
    }

}
