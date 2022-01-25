<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Classes;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $students = Student::withTrashed()
        ->paginate(10);

        if($request->expectsJson()){
            return response()->json(['status'=>true,'message'=>'Success','data'=>$students]);
        }else{
            return response()->view('cms.Student.index', ['students' => $students]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $cities=City::where('active',true)->get();
        $classes=Classes::where('active',true)->get();
        $teachers=Teacher::all();
        return response()->view('cms.Student.create',['cities'=>$cities,'classes'=>$classes,'teachers'=>$teachers]);
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
        $valodator=Validator($request->all(),[
            'first_name' =>'required|string|min:3|max:30',
            'last_name' =>'required|string|min:3|max:30',
            'Data_Of_Barth' =>'required|string|min:3|max:30',
            'city_id'=>'required|string|max:30,cities',
            'teacher_id'=>'required|string|max:30,teachers',
            'Classes_id'=>'required|string|max:30,classes',
            'email' => 'required|string|min:3|max:30',
            'phone' => 'required|string|min:3|max:30',
            'gender' => 'required|in:M,F|string'
            ]);
            if(!$valodator->fails()){
            $students = new Student();
            $students->first_name     = $request->get('first_name');
            $students->last_name     = $request->get('last_name');
            $students->Data_Of_Barth     = $request->get('Data_Of_Barth');
            $students->city_id    = $request->get('city_id');
            $students->teacher_id    = $request->get('teacher_id');
            $students->Classes_id    = $request->get('Classes_id');
            $students->email     = $request->get('email');
            $students->phone    = $request->get('phone');
            $students->gender = $request->get('gender');
            $isSaved = $students->save();
            if($isSaved){
            }
            return response()->json(['message' => $isSaved ? 'Student created successfully' : 'Failed to create Student!'], $isSaved ? 201 : 400);
            }else{
            return response()->json(['message'=>$valodator->getMessageBag()->first()], 400);
            }
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
    public function destroy($id)
    {
        //
        // $isDeleted = Admin::destroy($id);
        $isDeleted=Student::findOrFail($id)->delete();

        if($isDeleted){
            // return redirect()->back();
            return response()->json(['title'=>'Deleted!','message'=>'The Student is deleted!','icon'=>'success'],200);
        }else{
            return response()->json(['title'=>'Failed!','message'=>'The Student is failed!','icon'=>'error'],400);
        }
    }

    public function restore($id){
        $admins=Student::withTrashed()->findOrFail($id);

        $isRestored=$admins->restore();
        if($isRestored){
            // return redirect()->back();
            return response()->json(['title'=>'Restored!','message'=>'The Student is Restored!','icon'=>'success'],200);
        }else{
            return response()->json(['title'=>'Failed!','message'=>'The Student is failed!','icon'=>'error'],400);
        }
    }
}
