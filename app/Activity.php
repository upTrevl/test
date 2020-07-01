<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [];

    public function city()
    {
        return $this->belongsTo('App\City');
    }
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
