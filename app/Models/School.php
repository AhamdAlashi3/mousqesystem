<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class School extends Model
{
    use HasFactory,SoftDeletes;

    public function cities(){
        return $this->belongsTo(City::class, 'city_id','id');
    }

    public function classess(){
        return $this->hasMany(Classes::class,'school_id','id');
    }

    public function students(){
        return $this->hasMany(School::class,'school_id','id');
    }
}

