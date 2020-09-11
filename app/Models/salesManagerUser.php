<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class salesManagerUser extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function sales_managers()
    {
        return $this->belongsTo('App\salesManager');
    }
}
