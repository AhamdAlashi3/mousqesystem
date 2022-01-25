<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LeaderController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentNoteController;
use App\Http\Controllers\SupervisorController;
use App\Http\Controllers\SurahController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('cms/admin')->group(function(){
    // Route::view('', 'cms.dashboard')->name('cms.dashboard');
    Route::resource('', DashboardController::class);


    Route::resource('admin', AdminController::class);
    Route::delete('admin/{id}/restore',[AdminController::class,'restore'])->name('admin.restore');

    Route::resource('city', CityController::class);
    Route::delete('city/{id}/restore',[CityController::class,'restore'])->name('city.restore');

    Route::resource('user', UserController::class);
    Route::delete('user/{id}/restore',[UserController::class,'restore'])->name('user.restore');

    Route::resource('teacher', TeacherController::class);
    Route::delete('teacher/{id}/restore',[TeacherController::class,'restore'])->name('teacher.restore');

    Route::resource('student', StudentController::class);
    Route::delete('student/{id}/restore',[StudentController::class,'restore'])->name('student.restore');

    Route::resource('surah', SurahController::class);
    Route::delete('surah/{id}/restore',[SurahController::class,'restore'])->name('surah.restore');

    Route::resource('student_notes', StudentNoteController::class);
    Route::delete('student_notes/{id}/restore',[StudentNoteController::class,'restore'])->name('student_notes.restore');

    Route::resource('class', ClassesController::class);
    Route::delete('class/{id}/restore',[ClassesController::class,'restore'])->name('class.restore');

    Route::resource('supervisor', SupervisorController::class);
    Route::delete('supervisor/{id}/restore',[SupervisorController::class,'restore'])->name('supervisor.restore');

    Route::resource('leader', LeaderController::class);
    Route::delete('leader/{id}/restore',[LeaderController::class,'restore'])->name('leader.restore');

    // Route::get('dashboard', 'DachboardController@show')->name('cms.dashboard');

});


