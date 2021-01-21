<?php

namespace App\Http\Controllers\Admin;

use DB;
use Hash;
use App\Models\Admin;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Requests\AdminRequest;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    function __construct()
    {
        // $this->middleware('permission:admin-list', ['only' => ['index']]);
        // $this->middleware('permission:admin-create', ['only' => ['create','store']]);
        // $this->middleware('permission:admin-edit', ['only' => ['edit','update']]);
        $this->middleware('can:delete_admins', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $data = Admin::with('rolees')->orderBy('id','DESC')->get();
        return view('admin.admins.index',compact('data'));
    }

    public function create()
    {
       $roles = Role::all();
        // return $roles;
        return view('admin.admins.create',compact('roles'));
    }

    public function store(AdminRequest $request)
    {
       try
       {
            if (!$request->status) 
            {
            $request->request->add(['status' => 0]);
            }else
            {
                $request->request->add(['status' => 1]);
            }
            
            // CONVERT ROLE ID FROM STRING TO INTEGER
            $roleId =  \join(',',$request->role_id);
            
            DB::beginTransaction();
            
            $create = Admin::create(
                [
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                    'phone' => $request->phone,
                    'status' => $request->status,
                ]);
               
                $create->role_id = $roleId;
                $create->save();
                
                DB::commit();

            return redirect()->route('admin.index')->with('success','Admin created successfully');
       }catch (\Throwable $th) 
       {
           DB::rollback();
           return $th;
           return \redirect()->route('admin.index')->with(['error' => 'Something Error Please Try Again Later']);
       }
    }


    public function show($id)
    {
        $admin = Admin::with('rolees')->find($id);
        return view('admin.admins.show',compact('admin'));
    }

    public function edit($id)
    {
        $admin = Admin::find($id);
        $roles = Role::all();
        
        return view('admin.admins.edit',compact('admin','roles'));
    }


    public function update(AdminRequest $request, $id)
    {
        try
        {

            $admin = Admin::find($id);
            if(!$admin)
            {
                return redirect()->route('admin.index')
                ->with('error','Admin Not Found ');
            }else
            {
                // CONVERT ROLE ID FROM STRING TO INTEGER
                $roleId =  \join(',',$request->role_id);

                // return $request;
                $admin->name = $request->name;
                $admin->email = $request->email;
                $admin->password = bcrypt($request->password);
                $admin->phone = $request->phone;
                $admin->status = $request->status;
                $admin->role_id = $roleId;
                $admin->save();
            }
            return redirect()->route('admin.index')
            ->with('success','Admin updated successfully');

        }catch (\Throwable $th) 
        {
    
            return $th;
            return \redirect()->route('admin.index')->with(['error' => 'Something Error Please Try Again Later']);
        }
    }

    public function destroy($id)
    {
        $admin = Admin::with('companies')->find($id);
        // return $admin->companies->count();
        if(!$admin)
        {
            return redirect()->route('admin.index')->with('success','Admin Not Found');

        }else
        {
            if($admin->companies && $admin->companies->count() > 0 && $admin->status == 0)
            {
                $adamin->companies->delete();
                $admin->delete();
                return redirect()->route('admin.index')->with('success','Admin deleted successfully');

            }elseif($admin && $admin->status == 0)
            {
                $admin->delete();
                return redirect()->route('admin.index')->with('success','Admin deleted successfully');

            }else
            {
                return \redirect()->route('admin.index')->with(['error' => 'this admis is active please deActivate it']);
            }
            

        }
    }
}
