<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Models\Building;
use App\Models\Attribute;
use App\Models\BuildingType;
use Illuminate\Http\Request;
use App\Models\BuildingImage;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\BuildingRequest;

class BuildingsController extends Controller
{
   
    public function index()
    {
        $buildings = Building::with('project','building_type')->get();
        // return $buildings;
        return \view('admin.buildings.index',compact('buildings'));
    }

    
    public function create()
    {
        $projects       = Project::active()->get();
        $attributes     = Attribute::active()->get();
        $buildingTypes  = BuildingType::active()->get();
        $lastBuilding   = Building::all()->last();
        if(!$lastBuilding)
        {
            $lastBuilding = 0;
        }
        // return $lastBuilding;  
        return \view('admin.buildings.create',\compact('projects','buildingTypes','attributes','lastBuilding'));
    }

    
    public function store(BuildingRequest $request)
    {
        // return $request;
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
                // CREATE ALL PROJECTS    
                // dd($request->all());
                    $create = Building::create(
                        [
                            'space'                 => $request->space,
                            'total_units'           => $request->total_unites,
                            'price_meter'           => $request->price_meter,
                            'total_price'           => $request->total_price,
                            'bed_Room_Number'       => $request->bed_Room_Number,
                            'bath_Room_Number'      => $request->bath_Room_Number,
                            'aviliable_unites'      => $request->aviliable_unites,
                            'sold_unites'           => $request->sold_unites,
                            'project_id'            => $request->project_id,
                            'building_type_id'      => $request->building_type_id,
                            'is_active'             => $request->is_active,
                        ]);
                
                // CREATE TRANSLATION COLUMNS
                    $create->name      = $request->name;    
                    $create->save();

                //   SAVE BUILDING ATTRIBUTES
                    $create->attributes()->attach($request->attribute_id);

                DB::commit();    

                return redirect()->route('Building.index')->with(['success' => 'New Building Was Created Successfaly']);
        }catch (\Throwable $th) 
        {
            return $th;
            
            DB::rollback();
            return \redirect()->route('Building.index')->with(['error' => 'Something Error Please Try Again Later']);
        }
    }

    
    public function show($id)
    {
        try
        {
            $buildings          = Building::findOrFail($id);

            if($buildings)
            {
                $projects       = Project::active()->get();
                $buildingTypes  = BuildingType::all(); 
                return \view('admin.buildings.show',\compact('projects','buildingTypes','buildings'));  
            }else
            {
                return \redirect()->back()->with(['error' => 'This Building Not Found']);
            }
            
        }catch (\Throwable $th) 
        {
            return $th;
            
            DB::rollback();
            return \redirect()->route('Building.index')->with(['error' => 'Something Error Please Try Again Later']);
        }
    }

    
    public function edit($id)
    {
        try
        {
            $buildings          = Building::findOrFail($id);

            if($buildings)
            {
                $projects       = Project::active()->get();
                $buildingTypes  = BuildingType::all(); 
                $attributes     = Attribute::active()->get();
                $data           = $buildings->attributes->pluck('id')->toArray();
                return \view('admin.buildings.edit',\compact('projects','buildingTypes','buildings','attributes','data'));  
            }else
            {
                return \redirect()->back()->with(['error' => 'This Building Not Found']);
            }
            
        }catch (\Throwable $th) 
        {
            return $th;
            
            DB::rollback();
            return \redirect()->route('Building.index')->with(['error' => 'Something Error Please Try Again Later']);
        }
    }

    
    public function update(BuildingRequest $request, $id)
    {
        try
        {
            
            $buildings          = Building::findOrFail($id);  
            
            if($buildings)
            {


            // GET IS_ACTIVE INPUT
                if (!$request->is_active) 
                {
                $request->request->add(['is_active' => 0]);
                }else
                {
                    $request->request->add(['is_active' => 1]);
                }
                // return $request;

            // UPDATE ALL DATA
            DB::beginTransaction();
                $buildings->name                = $request->name;
                $buildings->space               = $request->space;
                $buildings->total_units        = $request->total_units;
                $buildings->price_meter         = $request->price_meter;
                $buildings->total_price         = $request->total_price;
                $buildings->bed_Room_Number     = $request->bed_Room_Number;
                $buildings->bath_Room_Number    = $request->bath_Room_Number;
                $buildings->aviliable_unites    = $request->aviliable_unites;
                $buildings->sold_unites         = $request->sold_unites;
                $buildings->project_id          = $request->project_id;
                $buildings->building_type_id     = $request->buildingType_id;
                $buildings->is_active           = $request->is_active;
                $buildings->save();

                if($request->attribute_id)
                {
                    $buildings->attributes()->sync($request->attribute_id);
                }  

            DB::commit();
                
                return \redirect()->route('Building.index')->with(['success' => 'Building was updated successfaly']);
                    
            }else
            {
                return \redirect()->route('Building.index')->with(['error' => 'this building not found']);
            }
            
        }catch (\Throwable $th) 
        {
            return $th;
            
            DB::rollback();
            return \redirect()->route('Building.index')->with(['error' => 'Something Error Please Try Again Later']);
        }
    }

    
    public function destroy($id)
    {
        try
        {
            $buildings   = Building::with('buildingImages')->findOrFail($id);
            // return $buildings;

            if($buildings)
            {
                $buildings->attributes()->detach();
                $buildings->buildingImages()->delete();
                $buildings->delete();
                
                return \redirect()->back();
            
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


    public function images($id ,Request $request)
    {
        $lastBuilding = Building::latest()->first()->id;
        // return $request;

         // CHECK IF SUB IMAGES IS FOUND
         if ($request->hasFile('photos')) 
         {
             $IMAGES = $request->photos;
 
             foreach($IMAGES as $buildingPhotos)
             { 
                 // GET IS_ACTIVE INPUT
                 if (!$request->photo_type) 
                 {
                 $request->request->add(['photo_type' => 0]);
                 }else
                 {
                     $request->request->add(['photo_type' => 1]);
                 }

                //  CREATE ALL DATA 
                 $create = BuildingImage::create(
                     [
                         'photos'                => $buildingPhotos->store('BuildingImages','public'),
                          'building_id'          => $lastBuilding,
                          'photo_type'           => $request->photo_type
                     ]);
                     
                     
             }  
             return redirect()->route('Building.index')->with(['success' => 'Project Images Created Successfaly']);
         }
    }
}
