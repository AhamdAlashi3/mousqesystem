<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class AdminPermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($adminId)
    {
        //
        $permissions=Permission::where('guard_name','admin')->get();
        $admin=Admin::find($adminId);

        if($admin->permissions->count() > 0 ){
            foreach($permissions as $permission){
                $permission->setAttribute('is_active',false);
                // foreach($admin->permissions as $adminPermission){}
                if($admin->hasPermissionTo($permission)){
                   $permission->setAttribute('is_active',true);
                }
            }
        }
        return response()->view('cms.Admin.index-permission',['permissions'=>$permissions,'adminId'=>$adminId]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$adminId)
    {
        //
        $validator=Validator($request->all(),[
            'permission_id'=>'required|exists:permissions,id|numeric',
            'active'=>'boolean',
        ]);

        if(!$validator->fails()){
            $permissions=Permission::findById($request->get('permission_id'));
            $admin=Admin::findOrfail($adminId);
            if($admin->hasPermissionTo($permissions)){
                $isSaved=$admin->revokePermissionTo($permissions);
            }else{
                $isSaved= $admin->givePermissionTo($permissions);
            }

            return response()->json(['message'=>$isSaved ? 'Permission to operation successfully' : 'The operation is faild permission'], $isSaved ? 200:400);
        }else{
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
