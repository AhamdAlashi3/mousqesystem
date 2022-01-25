<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Supervisor;
use App\Models\Teacher;
use Illuminate\Http\Request;

class SupervisorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $supervisors=Supervisor::withTrashed()->paginate(10);
        return response()->view('cms.Supervisor.index',['supervisors'=>$supervisors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $teachers=Teacher::all();
        $cities=City::where('active',true)->get();
        return response()->view('cms.Supervisor.create',['cities'=>$cities,'teachers'=>$teachers]);
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
            'city_id'=>'required|string|max:30,cities',
            'teacher_id'=>'required|string|max:30,teachers',
            'email' => 'required|string|min:3|max:30',
            'phone' => 'required|string|min:3|max:30',
            'gender' => 'required|in:M,F|string'
            ]);
            if(!$valodator->fails()){
            $supervisors = new Supervisor();
            $supervisors->first_name     = $request->get('first_name');
            $supervisors->last_name     = $request->get('last_name');
            $supervisors->city_id    = $request->get('city_id');
            $supervisors->teacher_id   = $request->get('teacher_id');
            $supervisors->email     = $request->get('email');
            $supervisors->phone    = $request->get('phone');
            $supervisors->gender = $request->get('gender');
            $isSaved = $supervisors->save();
            if($isSaved){
            }
            return response()->json(['message' => $isSaved ? 'Supervisor created successfully' : 'Failed to create Supervisor!'], $isSaved ? 201 : 400);
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
        $supervisors=Supervisor::findOrfail($id);
        $cities=City::where('active',true)->get();
        $teachers=Teacher::all();
        return response()->view('cms.Admin.edit',['cities'=>$cities,'teachers'=>$teachers,'supervisors'=>$supervisors]);
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
            'city_id' => 'required|integer|exists:cities,id',
            'teacher_id' => 'required|integer|exists:teachers,id',
            'first_name' =>'required|string|min:3|max:30',
            'last_name'=>'required|string|min:3|max:30',
            'phone' => 'required|string|min:3|max:30',
            'email' => 'required|string|min:3|max:30',
            'gender' => 'required|in:M,F|string',
        ]);
        if(!$valodator->fails()){
        $admins =Supervisor::findOrFail($id);
        $admins->city_id = $request->get('city_id');
        $admins->first_name    = $request->get('first_name');
        $admins->last_name   = $request->get('last_name');
        $admins->phone   = $request->get('phone');
        $admins->email = $request->get('email');
        $admins->gender = $request->get('gender');

        $isUpdated = $admins->save();
        return response()->json(['message' => $isUpdated ? 'Supervisor updated successfully' : 'Failed to updated Supervisor!'], $isUpdated ? 201 : 400);
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
        // $isDeleted = Admin::destroy($id);
        $isDeleted=Supervisor::findOrFail($id)->delete();

        if($isDeleted){
            // return redirect()->back();
            return response()->json(['title'=>'Deleted!','message'=>'The Supervisor is deleted!','icon'=>'success'],200);
        }else{
            return response()->json(['title'=>'Failed!','message'=>'The Supervisor is failed!','icon'=>'error'],400);
        }
    }

    public function restore($id){
        $admins=Supervisor::withTrashed()->findOrFail($id);

        $isRestored=$admins->restore();
        if($isRestored){
            // return redirect()->back();
            return response()->json(['title'=>'Restored!','message'=>'The Supervisor is Restored!','icon'=>'success'],200);
        }else{
            return response()->json(['title'=>'Failed!','message'=>'The Supervisor is failed!','icon'=>'error'],400);
        }
    }
}
