<?php

namespace App\Http\Controllers;

use App\Models\Surah;
use Illuminate\Http\Request;

class SurahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $surahs=Surah::withTrashed()->paginate(10);
        return response()->view('cms.Surah.index',['surahs'=>$surahs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return response()->view('cms.Surah.create');
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

            $surahs = new Surah();

            $surahs->name   = $request->get('name');
            $surahs->active = $request->has('active') ? true : false;
            $isSaved = $surahs->save();
            if ($isSaved) {
                 return response()->json(['message' => $isSaved ? 'surahs created successfully' : 'Failed to create surahs!'], $isSaved ? 201 : 400);
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
        $surahs=Surah::findOrfail($id);
        return response()->view('cms.Surah.edit',['surahs'=>$surahs]);
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
        $validator=Validator($request->all(),[
            'name' =>'required|string|min:3|max:30',
            'active' => 'in:on',
        ]);
        if (!$validator->fails()) {

            $surahs = Surah::FindOrFail($id);

            $surahs->name   = $request->get('name');
            $surahs->active = $request->has('active') ? true : false;
            $isSaved = $surahs->save();
            if ($isSaved) {
                 return response()->json(['message' => $isSaved ? 'surahs updated successfully' : 'Failed to updated surahs!'], $isSaved ? 201 : 400);
            }
            }else {
             return response()->json(['message'=>$validator->getMessageBag()->first()], 400);
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
        $isDeleted=Surah::findOrFail($id)->delete();

        if($isDeleted){
            // return redirect()->back();
            return response()->json(['title'=>'Deleted!','message'=>'The Surah is deleted!','icon'=>'success'],200);
        }else{
            return response()->json(['title'=>'Failed!','message'=>'The Surah is failed!','icon'=>'error'],400);
        }
    }

    public function restore($id){
        $admins=Surah::withTrashed()->findOrFail($id);

        $isRestored=$admins->restore();
        if($isRestored){
            // return redirect()->back();
            return response()->json(['title'=>'Restored!','message'=>'The Surah is Restored!','icon'=>'success'],200);
        }else{
            return response()->json(['title'=>'Failed!','message'=>'The Surah is failed!','icon'=>'error'],400);
        }
    }
}
