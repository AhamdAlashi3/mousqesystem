<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Student;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $classes=Classes::withTrashed()->withCount('student')->paginate(10);
        return response()->view('cms.Classess.index',['classes'=>$classes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return response()->view('cms.Classess.create');
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
        $validator=Validator($request->all(),[
            'name' =>'required|string|min:3|max:30',
            'active' => 'in:on',
        ]);
        if (!$validator->fails()) {

            $classes = new Classes();

            $classes->name   = $request->get('name');
            $classes->active = $request->has('active') ? true : false;
            $isSaved = $classes->save();
            if ($isSaved) {
                 return response()->json(['message' => $isSaved ? 'Classess created successfully' : 'Failed to create Classess!'], $isSaved ? 201 : 400);
            }
            }else {
             return response()->json(['message'=>$validator->getMessageBag()->first()], 400);
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
        // $isDeleted = Admin::destroy($id);
        $isDeleted=Classes::findOrFail($id)->delete();

        if($isDeleted){
            // return redirect()->back();
            return response()->json(['title'=>'Deleted!','message'=>'The class is deleted!','icon'=>'success'],200);
        }else{
            return response()->json(['title'=>'Failed!','message'=>'The class is failed!','icon'=>'error'],400);
        }
    }

    public function restore($id){
        $admins=Classes::withTrashed()->findOrFail($id);

        $isRestored=$admins->restore();
        if($isRestored){
            // return redirect()->back();
            return response()->json(['title'=>'Restored!','message'=>'The class is Restored!','icon'=>'success'],200);
        }else{
            return response()->json(['title'=>'Failed!','message'=>'The class is failed!','icon'=>'error'],400);
        }
    }
}
