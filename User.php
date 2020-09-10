<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public $primarykey='id';

    public function role()
    {
    return $this->belongsTo('App\Role');
    }

    public function class_user()
    {
    return $this->hasOne('App\classUser');
    }
}
