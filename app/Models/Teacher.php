<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{
    use HasFactory,SoftDeletes;

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function getGenderTitleAttribute()
    {
        return $this->gender == 'M' ? 'Male' : 'Female';
    }

    public function cities(){
        return $this->belongsTo(City::class, 'city_id','id');
    }

    public function supervisors(){
        return $this->hasMany(Supervisor::class, 'teacher_id','id');
    }

    public function students(){
        return $this->hasMany(Student::class, 'teacher_id','id');
    }


}
