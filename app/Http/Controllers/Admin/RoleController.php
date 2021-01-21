<?php

namespace App\Http\Controllers\Admin;

use DB;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Http\Controllers\Controller;

use App\Http\Requests\permssionsRequest;


class RoleController extends Controller
{
    // function __construct()
    // {
    //     $this->middleware('permission:role-list', ['only' => ['index']]);
    //     $this->middleware('permission:role-create', ['only' => ['create','store']]);
    //     $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
    //     $this->middleware('permission:role-show', ['only' => ['show']]);
    //     $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    // }
    public function index(Request $request)
    {
        $roles = Role::get();
        return view('admin.roles.index',compact('roles'));
    }

    
    public function create()
    {
        return view('admin.roles.create');
    }

   
    public function store(permssionsRequest $request)
    {
        // return $request;
        $role = new Role();
        // return $request;
        $role-> name = $request->name;
        $role->permmsions = \json_encode($request->permission);
        $role->save();
        
        return redirect()->route('roles.index')->with('success','Role created successfully');
    }

    
    public function show($id)
    {
        $role = Role::find($id);
        // return $role->permmsions;
        return view('admin.roles.show',compact('role'));
    }

   
    public function edit($id)
    {
        $role = Role::find($id);
        return view('admin.roles.edit',compact('role'));
    }

    
    public function update(permssionsRequest $request, $id)
    {

        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->permmsions = \json_encode($request->permission);
        $role->save();
        
        return redirect()->route('roles.index')->with('success','Role updated successfully');
    }

    
    public function destroy($id)
    {
        DB::table("roles")->where('id',$id)->delete();
        return redirect()->route('roles.index')->with('success','Role deleted successfully');
    }
}
