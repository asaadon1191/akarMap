<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PermssionRequest;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        return \view('admin.permissions.index',compact('permissions'));
    }

    public function create()
    {
        return view('admin.permissions.create');
    }

    public function store(Request $request)
    {
        // return $request;

        Permission::create(
            [
                'name'          => $request->name,
                'guard_name'    => "admin",
            ]);

            return \redirect()->route('permission.index')->with(['success' => 'Permission Updated Successfaly']);
    }

    public function edit($id)
    {
        $permission = Permission::find($id);
        return view('admin.permissions.edit',\compact('permission'));
    }

    public function update(PermssionRequest $request,$id)
    {
        // return $request;
        $permission = Permission::findOrFail($id);
        $permission->update(
            [
                'name'          => $request->name,
                'guard_name'    => "admin",
            ]);
            return \redirect()->route('permission.index')->with(['success' => 'Permission Updated Successfaly']);
    }

    public function destroy($id)
    {
        Permission::find($id)->delete();
        return redirect()->route('permission.index')->with('success','permission deleted successfully');
    }
}
