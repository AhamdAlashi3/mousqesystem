<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
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

    public function admins(){
        return $this->hasMany(Admin::class,'city_id','id');
    }

    public function users(){
        return $this->hasMany(Useru::class,'city_id','id');
    }

    public function schools(){
        return $this->hasMany(School::class,'city_id','id');
    }

    public function students(){
        return $this->hasMany(Student::class,'city_id','id');
    }

    public function teachers(){
        return $this->hasMany(Teacher::class,'city_id','id');
    }


	public function supervisors(){
        return $this->hasMany(Supervisor::class,'city_id','id');
    }

    public function leaders(){
        return $this->hasMany(Leader::class,'city_id','id');
    }

    public function student_notes(){
        return $this->hasMany(StudentNote::class,'city_id','id');
    }
}
