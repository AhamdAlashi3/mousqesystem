<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Classes;
use App\Models\Student;
use App\Models\StudentNote;
use App\Models\Surah;
use Illuminate\Http\Request;

class StudentNoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Student_notes=StudentNote::withTrashed()->paginate(10);
        return response()->view('cms.Student_notes.index',['Student_notes'=>$Student_notes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $students=Student::all();
        $surahs=Surah::all();
        $cities=City::where('active',true)->get();
        $classes=Classes::where('active',true)->get();
        return response()->view('cms.Student_notes.create',['cities'=>$cities,'classes'=>$classes,'students'=>$students,'surahs'=>$surahs]);
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
            'city_id'=>'required|string|max:30,cities',
            'Classes_id'=>'required|string|max:30,Classes',
            'student_id'=>'required|string|max:30,students',
            'surah_id'=>'required|string|max:30,surahs',
            'From_Quranic_verse'=>'required|string|max:30',
            'to_Quranic_verse'=>'required|string|max:30',
            'name_of_the_revised_surah'=>'required|string|max:30',
            'From_Quranic_verse_revised'=>'required|string|max:30',
            'to_Quranic_verse_revised'=>'required|string|max:30',
            ]);
            if(!$valodator->fails()){
            $studentNotes = new StudentNote();
            $studentNotes->city_id    = $request->get('city_id');
            $studentNotes->Classes_id    = $request->get('Classes_id');
            $studentNotes->student_id    = $request->get('student_id');
            $studentNotes->surah_id    = $request->get('surah_id');
            $studentNotes->From_Quranic_verse     = $request->get('From_Quranic_verse');
            $studentNotes->to_Quranic_verse     = $request->get('to_Quranic_verse');
            $studentNotes->name_of_the_revised_surah     = $request->get('name_of_the_revised_surah');
            $studentNotes->From_Quranic_verse_revised     = $request->get('From_Quranic_verse_revised');
            $studentNotes->to_Quranic_verse_revised     = $request->get('to_Quranic_verse_revised');
            $isSaved = $studentNotes->save();
            if($isSaved){
            }
            return response()->json(['message' => $isSaved ? 'StudentNote created successfully' : 'Failed to create StudentNote!'], $isSaved ? 201 : 400);
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
        $students=Student::findOrfail($id);
        $surahs=Surah::findOrfail($id);
        $classes=Classes::where('active',true)->get();
        $cities=City::where('active',true)->get();
        $studentNotes=StudentNote::findOrfail($id);
        return response()->view('cms.student_notes.edit',['cities'=>$cities,
                                                          'classes'=>$classes,
                                                          'students'=>$students,
                                                          'studentNotes'=>$studentNotes,
                                                          'surahs'=>$surahs
                                                        ]);
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
        $valodator=Validator($request->all(),[
            'city_id'=>'required|string|max:30,cities',
            'Classes_id'=>'required|string|max:30,Classes',
            'student_id'=>'required|string|max:30,students',
            'surah_id'=>'required|string|max:30,surahs',
            'From_Quranic_verse'=>'required|string|max:30',
            'to_Quranic_verse'=>'required|string|max:30',
            'name_of_the_revised_surah'=>'required|string|max:30',
            'From_Quranic_verse_revised'=>'required|string|max:30',
            'to_Quranic_verse_revised'=>'required|string|max:30',
        ]);
        if(!$valodator->fails()){
            $studentNotes =StudentNote::findOrFail($id);
            $studentNotes->city_id    = $request->get('city_id');
            $studentNotes->Classes_id    = $request->get('Classes_id');
            $studentNotes->student_id    = $request->get('student_id');
            $studentNotes->surah_id     = $request->get('surah_id');
            $studentNotes->From_Quranic_verse     = $request->get('From_Quranic_verse');
            $studentNotes->to_Quranic_verse     = $request->get('to_Quranic_verse');
            $studentNotes->name_of_the_revised_surah     = $request->get('name_of_the_revised_surah');
            $studentNotes->From_Quranic_verse_revised     = $request->get('From_Quranic_verse_revised');
            $studentNotes->to_Quranic_verse_revised     = $request->get('to_Quranic_verse_revised');
            $isUpdated = $studentNotes->save();
        return response()->json(['message' => $isUpdated ? 'studentNotes updated successfully' : 'Failed to updated studentNotes!'], $isUpdated ? 201 : 400);
        }else{
        return response()->json(['message'=>$valodator->getMessageBag()->first()], 400);
        }
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
        $isDeleted=StudentNote::findOrFail($id)->delete();

        if($isDeleted){
            return response()->json(['title'=>'Deleted!','message'=>'The StudentNote is deleted!','icon'=>'success'],200);
        }else{
            return response()->json(['title'=>'Failed!','message'=>'The StudentNote is failed!','icon'=>'error'],400);
        }
    }

    public function restore($id){
        $studentNotes=StudentNote::withTrashed()->findOrFail($id);

        $isRestored=$studentNotes->restore();
        if($isRestored){
            return response()->json(['title'=>'Restored!','message'=>'The StudentNote is Restored!','icon'=>'success'],200);
        }else{
            return response()->json(['title'=>'Failed!','message'=>'The StudentNote is failed!','icon'=>'error'],400);
        }
    }
}
