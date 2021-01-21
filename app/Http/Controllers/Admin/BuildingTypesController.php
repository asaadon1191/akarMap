<?php

namespace App\Http\Controllers\Admin;

use App\Models\Building;
use App\Models\BuildingType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\buildinTypeRequest;

class BuildingTypesController extends Controller
{
   
    public function index()
    {
        $buildingTypes = BuildingType::paginate(10);
        return \view('admin.bulides_type.index',\compact('buildingTypes'));
    }

   
    public function create()
    {
        return \view('admin.bulides_type.create');
    }

    
    public function store(buildinTypeRequest $request)
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

             
             // CREATE BuildingType
             $BuildingType                  = BuildingType::create([]);
             $BuildingType->name            = $request->name;
             $BuildingType->is_active       = $request->is_active;
             $BuildingType->save();
             return \redirect()->route('BuildingType.index')->with(['success' => 'New BuildingType Created Successfaly']);
 
         }catch (\Throwable $th) 
         {
             return $th;
             return \redirect()->route('BuildingType.index')->with(['error' => 'Something Error Please Try Again Later']);
         }
    }

   
    public function edit($id)
    {
        try
        {
            $BuildingType = BuildingType::findOrFail($id);
            if(!$BuildingType)
            {
                return \redirect()->route('BuildingType.index')->with(['error' => 'THIS BuildingType Not Found']);
            }else
            {
                return view('admin.bulides_type.edit',\compact('BuildingType'));
            }
            
        }catch (\Throwable $th) 
        {
            return $th;
            return \redirect()->route('BuildingType.index')->with(['error' => 'Something Error Please Try Again Later']);
        }
    }

   
    public function update(buildinTypeRequest $request, $id)
    {
        try
        {
            $BuildingType = BuildingType::with('building')->findOrFail($id);
            // return $BuildingType;
            if(!$BuildingType)
            {
                return \redirect()->route('BuildingType.index')->with(['error' => 'THIS BuildingType Not Found']);
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
                
            DB::beginTransaction();
          
            //   UPDATE ALL DATA
               $BuildingType->name = $request->name;
               $BuildingType->save();

               if($BuildingType->building && $BuildingType->building->count() > 0)
                {
                    return \redirect()->route('BuildingType.index')->with(['error' => 'This Building Type have buildings so can,t deactivate it']);
                }else
                {
                    $BuildingType->is_active     = $request->is_active; 
                    $BuildingType->save();
                }
                
                DB::commit();
                
                return \redirect()->route('BuildingType.index')->with(['success' => 'Building Type Was Updated Succesfaly']);
            }
            
        }catch (\Throwable $th) 
        {
            
            DB::rollback();
            
            return $th;
            return \redirect()->route('BuildingType.index')->with(['error' => 'Something Error Please Try Again Later']);
        }
    }

    
    public function destroy($id)
    {
        try
        {
        // GET ROW DATA
            $BuildingType = BuildingType::with('building')->findOrFail($id);

        // CHECK IF BUILD TYPE IS FOUND OR NOT
            if($BuildingType)
            {
                if($BuildingType->is_active == 0)
                {
                    $BuildingType->building()->delete();
                    $BuildingType->delete();
                    
                    return \redirect()->back()->with(['success' => 'This Row Was Deleted Successfaly']);
                }else
                {
                    return \redirect()->back()->with(['error' => 'Can,t Delete This Row Becouse It Is Active ']);
                }
            }else
            {
                return \redirect()->back()->with(['error' => 'This Building Type Not Found']);
            }

            
        }catch (\Throwable $th) 
        {
            DB::rollback();
            return $th;
            return \redirect()->route('Building.index')->with(['error' => 'Something Error Please Try Again Later']);
        }
    }
}
