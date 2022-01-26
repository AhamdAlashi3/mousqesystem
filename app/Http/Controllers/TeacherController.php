<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $teachers=Teacher::withTrashed()->withCount('students')->with(['cities'])->paginate(10);
        if($request->expectsJson()){
            return response()->json(['status'=>true,'message'=>'Success','data'=>$teachers],200);
        }else{
        return response()->view('cms.Teacher.index',['teachers'=>$teachers]);
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
        return response()->view('cms.Teacher.create',['cities'=>$cities]);
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
            'email' => 'required|string|min:3|max:30',
            'phone' => 'required|string|min:3|max:30',
            'gender' => 'required|in:M,F|string',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:4000',
            ]);
            if(!$valodator->fails()){
            $teachers = new Teacher();
            $teachers->first_name     = $request->get('first_name');
            $teachers->last_name     = $request->get('last_name');
            $teachers->city_id    = $request->get('city_id');
            $teachers->email     = $request->get('email');
            $teachers->phone    = $request->get('phone');
            $teachers->gender = $request->get('gender');

            if($request->hasFile('image'))
            {
                $file=$request->file('image');
                $extention=$file->getClientOriginalExtension();
                $filename=time().'.'.$extention;
                $file->move('cms/img/',$filename);
                $teachers->image=$filename;
            }

            $isSaved = $teachers->save();
            if($isSaved){
            }
            return response()->json(['message' => $isSaved ? 'Teacher created successfully' : 'Failed to create Teacher!'], $isSaved ? 201 : 400);
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
        $teachers=Teacher::findOrfail($id);
        $cities=City::where('active',true)->get();
        return response()->view('cms.Teacher.edit',['cities'=>$cities,'teachers'=>$teachers]);
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
            'first_name' =>'required|string|min:3|max:30',
            'last_name'=>'required|string|min:3|max:30',
            'phone' => 'required|string|min:3|max:30',
            'email' => 'required|string|min:3|max:30',
            'gender' => 'required|in:M,F|string',
        ]);
        if(!$valodator->fails()){
        $admins =Teacher::findOrFail($id);
        $admins->city_id = $request->get('city_id');
        $admins->first_name    = $request->get('first_name');
        $admins->last_name   = $request->get('last_name');
        $admins->phone   = $request->get('phone');
        $admins->email = $request->get('email');
        $admins->gender = $request->get('gender');

        $isUpdated = $admins->save();
        return response()->json(['message' => $isUpdated ? 'Teacher updated successfully' : 'Failed to updated Teacher!'], $isUpdated ? 201 : 400);
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
        $isDeleted=Teacher::findOrFail($id)->delete();

        if($isDeleted){
            // return redirect()->back();
            return response()->json(['title'=>'Deleted!','message'=>'The Teacher is deleted!','icon'=>'success'],200);
        }else{
            return response()->json(['title'=>'Failed!','message'=>'The Teacher is failed!','icon'=>'error'],400);
        }
    }

    public function restore($id){
        $teachers=Teacher::withTrashed()->findOrFail($id);

        $isRestored=$teachers->restore();
        if($isRestored){
            // return redirect()->back();
            return response()->json(['title'=>'Restored!','message'=>'The Teacher is Restored!','icon'=>'success'],200);
        }else{
            return response()->json(['title'=>'Failed!','message'=>'The Teacher is failed!','icon'=>'error'],400);
        }
    }
}
