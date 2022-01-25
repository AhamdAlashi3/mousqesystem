<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\City;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

// use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $data=Admin::count();
        // return $data;
        $admins=Admin::withTrashed()->paginate(10);
        return response()->view('cms.Admin.index',['admins'=>$admins]);
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
        return response()->view('cms.Admin.create',['cities'=>$cities]);

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
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            if(!$valodator->fails()){
            $admins = new Admin();
            $admins->first_name     = $request->get('first_name');
            $admins->last_name     = $request->get('last_name');
            $admins->city_id    = $request->get('city_id');
            $admins->email     = $request->get('email');
            $admins->phone    = $request->get('phone');
            $admins->gender = $request->get('gender');

            if($request->hasFile('image'))
            {
                $file=$request->file('image');
                $extention=$file->getClientOriginalExtension();
                $filename=time().'.'.$extention;
                $file->move('cms/img/',$filename);
                $admins->image=$filename;
            }

            $admins->password = Hash::make('admin2020');
            $isSaved = $admins->save();
            if($isSaved){
            }
            return response()->json(['message' => $isSaved ? 'admins created successfully' : 'Failed to create admins!'], $isSaved ? 201 : 400);
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
        $admins=Admin::findOrfail($id);
        $cities=City::where('active',true)->get();
        return response()->view('cms.Admin.edit',['cities'=>$cities,'admins'=>$admins]);
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
            // 'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);
        if(!$valodator->fails()){
        $admins =Admin::findOrFail($id);
        $admins->city_id = $request->get('city_id');
        $admins->first_name    = $request->get('first_name');
        $admins->last_name   = $request->get('last_name');
        $admins->phone   = $request->get('phone');
        $admins->email = $request->get('email');
        $admins->gender = $request->get('gender');

        // if($request->hasfile('image'))
        // {
        //     $destination = 'cms/img/'.$admins->profile_image;
        //     if(File::exists($destination))
        //     {
        //         File::delete($destination);
        //     }
        //     $file = $request->file('image');
        //     $extention = $file->getClientOriginalExtension();
        //     $filename = time().'.'.$extention;
        //     $file->move('cms/img/', $filename);
        //     $admins->image = $filename;
        // }


        $admins->password = Hash::make('admin2020');

        $isUpdated = $admins->save();
        return response()->json(['message' => $isUpdated ? 'Admin updated successfully' : 'Failed to updated admin!'], $isUpdated ? 201 : 400);
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
        $isDeleted=Admin::findOrFail($id)->delete();

        $destination = 'cms/img/'.$admins->image;
        if(File::exists($destination))
        {
            File::delete($destination);
        }

        if($isDeleted){
            // return redirect()->back();
            return response()->json(['title'=>'Deleted!','message'=>'The admin is deleted!','icon'=>'success'],200);
        }else{
            return response()->json(['title'=>'Failed!','message'=>'The admin is failed!','icon'=>'error'],400);
        }
    }

    public function restore($id){
        $admins=Admin::withTrashed()->findOrFail($id);

        $isRestored=$admins->restore();
        if($isRestored){
            // return redirect()->back();
            return response()->json(['title'=>'Restored!','message'=>'The admin is Restored!','icon'=>'success'],200);
        }else{
            return response()->json(['title'=>'Failed!','message'=>'The admin is failed!','icon'=>'error'],400);
        }
    }
}
