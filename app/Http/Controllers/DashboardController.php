<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\City;
use App\Models\Classes;
use App\Models\Dashboard;
use App\Models\Leader;
use App\Models\Student;
use App\Models\StudentNote;
use App\Models\Supervisor;
use App\Models\Surah;
use App\Models\Teacher;
use App\Models\User;
use App\Models\Useru;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $dashboards=Dashboard::paginate(10);
        $admins=Admin::count();
        $users=Useru::count();
        $cities=City::count();
        $students=Student::count();
        $students_notes=StudentNote::count();
        $class=Classes::count();
        $teachers=Teacher::count();
        $leaders=Leader::count();
        $supervisors=Supervisor::count();
        $surahs=Surah::count();
        return response()->view('cms.Dashboard.index',
        ['dashboards'=>$dashboards,
        'admins'=>$admins,
        'users'=>$users,
        'cities'=>$cities,
        'students'=>$students,
        'students_notes'=>$students_notes,
        'class'=>$class,
        'teachers'=>$teachers,
        'leaders'=>$leaders,
        'supervisors'=>$supervisors,
        'surahs'=>$surahs,
    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
