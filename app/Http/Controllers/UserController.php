<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Useru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $users=Useru::paginate(10);
        if($request->expectsJson()){
            return response()->json(['status'=>true,'message'=>'Success','data'=>$users],200);
        }else{
        return response()->view('cms.User.index',['users'=>$users]);
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
        $cities=City::all();
        return response()->view('cms.User.create',['cities'=>$cities]);
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
            'first_name' =>'required|string|min:3|max:30',
            'last_name'=>'required|string|min:3|max:30',
            'city_id'=>'required|string|max:30,cities',
            'DoB' => 'required|string|min:3|max:30',
            'phone' => 'required|string|min:3|max:30',
            'email' => 'required|string|min:3|max:30',
            'gender' => 'required|in:M,F|string',
        ]);
        if(!$validator->fails()){
            $users = new Useru();
            $users->first_name    = $request->get('first_name');
            $users->last_name   = $request->get('last_name');
            $users->city_id    = $request->get('city_id');
            $users->DoB    = $request->get('DoB');
            $users->phone   = $request->get('phone');
            $users->email = $request->get('email');
            $users->gender = $request->get('gender');
            $users->password = Hash::make('user2020');
            $isSaved = $users->save();
            if ($isSaved) {
            }
              return response()->json(['message' => $isSaved ? 'User created successfully' : 'Failed to create user!'], $isSaved ? 201 : 400);
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
    }
}
