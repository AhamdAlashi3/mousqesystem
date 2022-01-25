<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $cities = City::withTrashed()->withCount('admins')
        ->withCount('students')
        ->withCount('supervisors')
        ->withCount('teachers')
        ->withCount('users')
        ->withCount('leaders')
        ->paginate(10);

        if($request->expectsJson()){
            return response()->json(['status'=>true,'message'=>'Success','data'=>$cities]);
        }else{
            return response()->view('cms.city.index', ['cities' => $cities]);
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
        return response()->view('cms.city.create');
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
        $request->validate([
            'name' => 'required|string|min:3|max:30',
            'active' => 'in:on',
        ], [
            'name.required' => 'City name is required!',
            'name.min' => 'Name must be at least 3 characters'
        ]);
        $cities = new City();
        $cities->name = $request->get('name');
        $cities->active = $request->has('active');
        $isSaved = $cities->save();
        if ($isSaved) {
            session()->flash('message', 'cities created successfully');
            return redirect()->route('city.create');
        } else {
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
        $cities=City::findOrfail($id);
        return response()->view('cms.city.edit',['cities'=>$cities]);
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
        $request->validate([
            'name' => 'required|string|min:3|max:30',
            'active' => 'in:on',
        ], [
            'name.required' => 'City name is required!',
            'name.min' => 'Name must be at least 3 characters'
        ]);
        $cities =City::findOrFail($id);
        $cities->name = $request->get('name');
        $cities->active = $request->has('active');
        $isSaved = $cities->save();
        if ($isSaved) {
            session()->flash('message', 'cities Updated successfully');
            return redirect()->route('city.create');
        } else {
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
        $isDeleted=City::findOrFail($id)->delete();

        if($isDeleted){
            // return redirect()->back();
            return response()->json(['title'=>'Deleted!','message'=>'The City is deleted!','icon'=>'success'],200);
        }else{
            return response()->json(['title'=>'Failed!','message'=>'The City is failed!','icon'=>'error'],400);
        }
    }

    public function restore($id){
        $admins=City::withTrashed()->findOrFail($id);

        $isRestored=$admins->restore();
        if($isRestored){
            // return redirect()->back();
            return response()->json(['title'=>'Restored!','message'=>'The City is Restored!','icon'=>'success'],200);
        }else{
            return response()->json(['title'=>'Failed!','message'=>'The City is failed!','icon'=>'error'],400);
        }
    }
}
