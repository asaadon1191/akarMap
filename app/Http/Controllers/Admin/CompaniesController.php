<?php

namespace App\Http\Controllers\Admin;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyRequest;
use Illuminate\Support\Facades\Storage;

class CompaniesController extends Controller
{

    // function __construct()
    // {
    //     $this->middleware('permission:company-list', ['only' => ['index']]);
    //     $this->middleware('permission:company-create', ['only' => ['create','store']]);
    //     $this->middleware('permission:company-edit', ['only' => ['edit','update']]);
    //     $this->middleware('permission:company-delete', ['only' => ['destroy']]);
    // }



    public function index()
    {
        $companies = Company::all();
        return view('admin.companies.index',\compact('companies'));
    }

    public function create()
    {
        return \view('admin.companies.create');
    }


    public function store(CompanyRequest $request)
    {
        try
        {
             // GET IS_ACTIVE INPUT
             if (!$request->is_active) 
             {
                $request->request->add(['is_active' => 0]);
             }else
             {
                 $request->request->add(['is_active' => 1]);
             }

            
        DB::beginTransaction();
        // CREATE ALL COLUMNES    
            $create = Company::create(
                [
                   'adress'     => $request->adress,
                   'phone'      => $request->phone,
                   'phone2'     => $request->phone2,
                   'is_active'  => $request->is_active,
                ]);

            // CHECK PHOTO
                if ($request->hasFile('logo')) 
                {
                    $photo =  $request->logo->store('companies','public');
                    $create->logo = $photo;
                    $create->save();
                }    
               

            // CREATE TRANSLATION COLUMNS
                $create->name = $request->name;  
                $create->save();

            //   SAVE PRODUCT_CATEGORY
                $create->admins()->attach(auth()->user()->id);
        
        DB::commit();
            
        return \redirect()->route('company.index')->with(['success' => 'New Company Created Successfaly']);
        

        }catch (\Throwable $th) 
        {
            return $th;
            
            DB::rollback();
            return \redirect()->route('company.index')->with(['error' => 'Something Error Please Try Again Later']);
        }
       
    }

    public function edit($id)
    {
        $company = Company::find($id);
        return view('admin.companies.edit',\compact('company'));
    }

    public function update($id,CompanyRequest $request)
    {
         try
        {

        // GET COMPANY
            $company = Company::find($id);


        // CHECKE IF COMPANY EXISTS
            if(!$company)
            {
                return redirect()->route('company.index')->with(['error' => 'This Company Not Found']);
            }else
            {

            // GET IS_ACTIVE INPUT
                if (!$request->is_active) 
                {
                $request->request->add(['is_active' => 0]);
                }else
                {
                    $request->request->add(['is_active' => 1]);
                }

            // UPDATE COMPANY
                DB::beginTransaction();
                   
                    // CHECK PHOTO
                        if ($request->hasFile('logo')) 
                        {
                            Storage::disk('public')->delete('/assets/admin/images/',$company->logo);
                            $photo =  $request->logo->store('companies','public');
                            $company->update(['logo' => $photo]);
                        }    
                    
        
                    // UPDATE ALL COLUMNES 
                        $company->name      = $request->name;  
                        $company->adress    = $request->adress;  
                        $company->phone     = $request->phone;  
                        $company->phone2    = $request->phone2;   
                        $company->is_active = $request->is_active;  
                        $company->save();
        
                    //   UPDATE ADMIN_COMPANY
                        $company->admins()->sync(auth()->user()->id);

                DB::commit();
                    
                return \redirect()->route('company.index')->with(['success' => 'Company Updated Successfaly']);

            } 

        }catch (\Throwable $th) 
        {
            return $th;
            
            DB::rollback();
            return \redirect()->route('company.index')->with(['error' => 'Something Error Please Try Again Later']);
        }
    }

    public function destroy($id)
    {
        try
        {

            $company = Company::with('projects')->findOrFail($id);
            // return $company;
            if(!$company)
            {
                return redirect()->route('company.index')->with(['error' => 'This Company Not Found']);
            }else
            {
                if($company->is_active == 1)
                {
                    return \redirect()->back()->with(['error' => 'You Can,t Delete This Company , Make It Un Active Before']);
                }else
                {
                    
                DB::beginTransaction();
                
               

                if($company->projects && $company->projects->count() == 0)
                {
                    Storage::disk('public')->delete('/assets/admin/images/',$company->logo);
                    $company->delete();
                    $company->admins()->detach();

                }elseif($company->projects && $company->projects->count() > 0)
                {
                    Storage::disk('public')->delete('/assets/admin/images/',$company->logo);
                    
                
                    foreach ($company->projects as $pro) 
                    {
                        $pro->delete();
                    }
                    $company->admins()->detach();
                    $company->delete();
                }
                    
                    
                DB::commit();
                return \redirect()->back()->with(['success' => 'Company Was Deleted Successfaly']);
                }
            }

        }catch (\Throwable $th) 
        {
            return $th;
            
            DB::rollback();
            return \redirect()->route('company.index')->with(['error' => 'Something Error Please Try Again Later']);
        }
    }
}
