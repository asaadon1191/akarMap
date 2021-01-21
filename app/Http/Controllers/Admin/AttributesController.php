<?php

namespace App\Http\Controllers\Admin;

use App\Models\Attribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\AttributesRequest;

class AttributesController extends Controller
{
    
    public function index()
    {
        $attributes = Attribute::all();
        return \view('admin.attributes.index',compact('attributes'));
    }

    
    public function create()
    {
        return \view('admin.attributes.create');
    }

    
    public function store(AttributesRequest $request)
    {
        // return $request;
        try
        {  
            // CREATE Attribute
            $attr = Attribute::create([]);
            $attr->name         = $request->name;
            $attr->is_active    = $request->is_active;
            $attr->save();
            return \redirect()->route('Attribute.index')->with(['success' => 'New Attribute Created Successfaly']);

        }catch (\Throwable $th) 
        {
            return $th;
            return \redirect()->route('Attribute.index')->with(['error' => 'Something Error Please Try Again Later']);
        }
    }

   
    public function edit($id)
    {
        try
        {
            $attr = Attribute::findOrFail($id);
            if(!$attr)
            {
                return \redirect()->route('Attribute.index')->with(['error' => 'THIS Attribute Not Found']);
            }else
            {
                return view('admin.attributes.edit',\compact('attr'));
            }
            
        }catch (\Throwable $th) 
        {
            return $th;
            return \redirect()->route('Attribute.index')->with(['error' => 'Something Error Please Try Again Later']);
        }
    }

   
    public function update(AttributesRequest $request, $id)
    {
        try
        {
            $attribute = Attribute::with('buildings')->findOrFail($id);

            if(!$attribute)
            {
                return \redirect()->route('Attribute.index')->with(['error' => 'THIS Attribute Not Found']);
            }else
            {
                
            // UPDATE DATA    
            DB::beginTransaction();
                
                $attribute->name        = $request->name;
                $attribute->save();

                // CHECK IF IS PROJECT HAVE BUILDINGS 
                if($attribute->buildings && $attribute->buildings->count() > 0)
                {
                    return \redirect()->route('Attribute.index')->with(['error' => 'This project have buildings so can,t deactivate it']);
                }else
                {
                    $attribute->is_active   = $request->is_active;
                    $attribute->save();
                }
                
            DB::commit();

                return redirect()->route('Attribute.index')->with(['success' => 'Attribute Updated Successfaly']);
            }
            
        }catch (\Throwable $th) 
        {
            return $th;
            
            DB::rollback();
            return \redirect()->route('Attribute.index')->with(['error' => 'Something Error Please Try Again Later']);
        }
    }

    
    public function destroy($id)
    {
        try
        {
            $attr = Attribute::with('buildings')->findOrFail($id);


            if($attr)
            {
                if($attr->is_active == 0)
                {
                    $attr->buildings()->delete();
                    $attr->delete();
                    
                    return \redirect()->back()->with(['success' => 'This Row Was Deleted Successfaly']);
                }else
                {
                    return \redirect()->back()->with(['error' => 'Can,t Delete This Row Becouse It Is Active ']);
                }
                
            
            }else
            {
                return \redirect()->back()->with(['error' => 'This Building Not Found']);
            }
        }catch (\Throwable $th) 
        {
            DB::rollback();
            return $th;
            return \redirect()->route('Building.index')->with(['error' => 'Something Error Please Try Again Later']);
        }
    }
}
