<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::all();
        return view('admin.permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
           // Validation Data
           $request->validate([
            'name' => 'required|max:50',
            'guard_name' => 'required',
            'permission_action' => 'required',
        ]);

        // Create New User
        // dd($request->permission_action);

        foreach($request->permission_action as $key=>$permission_action)
        {
            $permission = new Permission();
            $permission->name = $request->name.'.'.$permission_action;
            $permission->guard_name = $request->guard_name;
            $permission->group_name = $request->name;  
            $permission->save();
        }   
 
        session()->flash('success', 'User has been created !!');
        return redirect()->route('permissions.index');
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
        $permission = Permission::find($id);
        $permissions = Permission::where('group_name', $permission->group_name)->get();
        return view('admin.permissions.edit', compact('permission', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
       Permission::where('group_name', $permission->group_name)->delete();
           // Validation Data
        $request->validate([
            'name' => 'required|max:50',
            'guard_name' => 'required',
            'permission_action' => 'required',
        ]);

        // Create New User
        // dd($request->permission_action);

        foreach($request->permission_action as $key=>$permission_action)
        {
            $permission = new Permission();
            $permission->name = $request->name.'.'.$permission_action;
            $permission->guard_name = $request->guard_name;
            $permission->group_name = $request->name;  
            $permission->save();
        }   
 
        session()->flash('success', 'Permission has been updated !!');
        return redirect()->route('permissions.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permission = Permission::find($id);
        if (!is_null($permission)) {
            $permission->delete();
        }

        session()->flash('success', 'User has been deleted !!');
        return back();
    }
}
