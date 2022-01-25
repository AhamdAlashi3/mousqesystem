<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dashboard extends Model
{
    use HasFactory;

    // public function admins(){
    //     $admins =Admin::count('admins');
    //     return response()->view('cms.dashboard',['admins'=>$admins]);
    // }
}
