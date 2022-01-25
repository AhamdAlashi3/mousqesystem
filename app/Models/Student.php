<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
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

    public function classes(){
        return $this->belongsTo(Classes::class, 'classes_id','id');
    }

    public function teachers(){
        return $this->belongsTo(Teacher::class, 'teacher_id','id');
    }

    public function student_notes(){
        return $this->belongsTo(StudentNote::class, 'student_id','id');
    }


}
