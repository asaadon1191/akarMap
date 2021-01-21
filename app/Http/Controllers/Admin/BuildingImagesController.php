<?php

namespace App\Http\Controllers\Admin;

use App\Models\Building;
use Illuminate\Http\Request;
use App\Models\BuildingImage;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\BuildingImagesRequest;

class BuildingImagesController extends Controller
{
   
    public function index()
    {
        $Buildings  = BuildingImage::all();
        // return $Buildings;
        return \view('admin.buildingImages.index',\compact('Buildings'));
    }

    
    public function create()
    {
        $buildings = Building::active()->get();
        return \view('admin.buildingImages.create',\compact('buildings'));
    }

    
    public function store(BuildingImagesRequest $request)
    {
         // return $request;
         try
         {

                // GET IS_ACTIVE INPUT
                if (!$request->photo_type) 
                {
                $request->request->add(['photo_type' => 0]);
                }else
                {
                    $request->request->add(['photo_type' => 1]);
                }


            // CHECK IF SUB IMAGES IS FOUND
            if ($request->hasFile('photos')) 
            {
                $IMAGES = $request->photos;
    
                foreach($IMAGES as $proPhotos)
                { 
                    
                    $create = BuildingImage::create(
                        [
                            'photos'               => $proPhotos->store('BuildingImages','public'),
                            'building_id'          => $request->building_id,
                            'photo_type'           => $request->photo_type,
                        ]);
                        
                        
                }  
                return redirect()->route('BuildingImage.index')->with(['success' => 'Building Images Created Successfaly']);
            }
         }catch (\Throwable $th) 
         {
             return $th;
             
             DB::rollback();
             return \redirect()->route('BuildingImage.index')->with(['error' => 'Something Error Please Try Again Later']);
         }
    }

    
    public function edit($id)
    {
        try
        {
            $buildingImage = BuildingImage::findOrFail($id);
            $buildings = Building::active()->get();

            return \view('admin.buildingImages.edit',\compact('buildingImage','buildings'));
        }catch (\Throwable $th) 
        {
            return $th;
            
            DB::rollback();
            return \redirect()->route('BuildingImage.index')->with(['error' => 'Something Error Please Try Again Later']);
        }
    }

    
    public function update(Request $request, $id)
    {
        try 
        {
            
            // GET BUILDING IMAGE
                $buildingImage = BuildingImage::findOrFail($id);

            // CHECK IF BUILDING IMAGE IS FOUND
                if (!$buildingImage) 
                {
                    return \redirect()->route('BuildingImage.index')->with(['error' => 'This Brand Not Found']);

                }else
                {
                    
            // UPDATE ALL DATA
            DB::beginTransaction();
                  

                    $buildingImage->building_id = $request->building_id;
                    $buildingImage->photo_type = $request->photo_type;
                    $buildingImage->save();
                    
            // UPDATE PHOTO 
                    if ($request->hasFile('photos')) 
                    {
                        Storage::disk('public')->delete('/assets/admin/images/',$buildingImage->photos);
                        $photo =  $request->photos->store('BuildingImages','public');
                        $buildingImage->update(['photos' => $photo]);
                    }

            DB::commit();

                        return \redirect()->route('BuildingImage.index')->with(['success' => 'Project Image Updated successfaly']);
                }
           

        } catch (\Throwable $th) 
        {
            return $th;
            DB::rollback();
            return \redirect()->route('BuildingImage.index')->with(['error' => 'Something Error Please Try Again Later']);
        }
    }

  
    public function destroy($id)
    {
        try
        {
            // GET BUILDING IMAGE
            $buildingImage = BuildingImage::findOrFail($id);

            // CHECK IF BUILDING IMAGE IS FOUND
                if (!$buildingImage) 
                {
                    return \redirect()->route('BuildingImage.index')->with(['error' => 'This Brand Not Found']);

                }else
                {
                    Storage::disk('public')->delete('/assets/admin/images/',$buildingImage->photos);
                    $buildingImage->delete();
                    return \redirect()->route('BuildingImage.index')->with(['success' => 'Project Image Deleted successfaly']);
                }


        } catch (\Throwable $th) 
        {
            return $th;
            return \redirect()->route('BuildingImage.index')->with(['error' => 'Something Error Please Try Again Later']);
        }
    }
}
