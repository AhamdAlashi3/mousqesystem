<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Surah extends Model
{
    use HasFactory,SoftDeletes;

    public function student_notes(){
        return $this->hasMany(StudentNote::class, 'surah_id','id');
    }

    public function getStatusAttribute()
    {
        if ($this->active) {
            return "Active";
        } else {
            return "InActive";
        }
    }
}
