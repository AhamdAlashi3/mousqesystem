<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Leader;
use Illuminate\Http\Request;

class LeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $leaders=Leader::withTrashed()->paginate(10);
        return response()->view('cms.leader.index',['leaders'=>$leaders]);
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
        return response()->view('cms.leader.create',['cities'=>$cities]);
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
            'gender' => 'required|in:M,F|string'
            ]);
            if(!$valodator->fails()){
            $leaders = new Leader();
            $leaders->first_name     = $request->get('first_name');
            $leaders->last_name     = $request->get('last_name');
            $leaders->city_id    = $request->get('city_id');
            $leaders->email     = $request->get('email');
            $leaders->phone    = $request->get('phone');
            $leaders->gender = $request->get('gender');
            $isSaved = $leaders->save();
            if($isSaved){
            }
            return response()->json(['message' => $isSaved ? 'leader created successfully' : 'Failed to create leader!'], $isSaved ? 201 : 400);
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
        $leaders=Leader::findOrfail($id);
        $cities=City::where('active',true)->get();
        return response()->view('cms.leader.edit',['cities'=>$cities,'leaders'=>$leaders]);
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
        $leaders =Leader::findOrFail($id);
        $leaders->city_id = $request->get('city_id');
        $leaders->first_name    = $request->get('first_name');
        $leaders->last_name   = $request->get('last_name');
        $leaders->phone   = $request->get('phone');
        $leaders->email = $request->get('email');
        $leaders->gender = $request->get('gender');

        $isUpdated = $leaders->save();
        return response()->json(['message' => $isUpdated ? 'Leader updated successfully' : 'Failed to updated Leader!'], $isUpdated ? 201 : 400);
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
        $isDeleted=Leader::findOrFail($id)->delete();

        if($isDeleted){
            // return redirect()->back();
            return response()->json(['title'=>'Deleted!','message'=>'The Leader is deleted!','icon'=>'success'],200);
        }else{
            return response()->json(['title'=>'Failed!','message'=>'The Leader is failed!','icon'=>'error'],400);
        }
    }

    public function restore($id){
        $admins=Leader::withTrashed()->findOrFail($id);

        $isRestored=$admins->restore();
        if($isRestored){
            // return redirect()->back();
            return response()->json(['title'=>'Restored!','message'=>'The Leader is Restored!','icon'=>'success'],200);
        }else{
            return response()->json(['title'=>'Failed!','message'=>'The Leader is failed!','icon'=>'error'],400);
        }
    }
}
