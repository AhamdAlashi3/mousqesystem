<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Classes extends Model
{
    use HasFactory,SoftDeletes;

    public function getStatusAttribute()
    {
        if ($this->active) {
            return "Active";
        } else {
            return "InActive";
        }
    }

    public function student(){
        return $this->hasMany(Student::class, 'classes_id','id');
    }

    public function student_notes(){
        return $this->hasMany(StudentNote::class, 'classes_id','id');
    }
}
