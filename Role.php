<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public $primarykey='id';

    public function user()
    {
    return $this->hasOne('App\User');
    }
    public function getid()
    {
        return $this->id;
    }
}
