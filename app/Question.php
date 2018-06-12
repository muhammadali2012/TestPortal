<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Question extends Model
{
    //
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    //To know all the options of a question
    public function options()
    {
        return $this->hasMany('App\Option');

    }


    //To know the category it is related to
    public function catagory()
    {
        return $this->belongsTo('App\Catagory');
    }

    // correct option of question
    public function option()
    {
        return $this->belongsTo('App\Option');
    }

}
