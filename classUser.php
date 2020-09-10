<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class classUser extends Model
{
    public $primarykey='id';

    public function classes()
    {
    return $this->belongsToMany('App\Classes');
    }

    public function user()
    {
    return $this->belongsTo('App\User');
    }
}
