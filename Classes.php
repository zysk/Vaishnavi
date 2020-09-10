<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    public $primarykey='id';

    public function kk()
    {
        return classUser::where('student_id',NULL)->get();
    }

    public function class_user()
    {
    return $this->hasMany('App\classUser');
    }
}
