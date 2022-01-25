<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentNote extends Model
{
    use HasFactory,SoftDeletes;

    public function cities(){
        return $this->belongsTo(City::class, 'city_id','id');
    }

    public function classes(){
        return $this->belongsTo(Classes::class, 'classes_id','id');
    }

    public function students(){
        return $this->belongsTo(Student::class, 'student_id','id');
    }

    public function surahs(){
        return $this->belongsTo(Surah::class, 'surah_id','id');
    }
}
