<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Models\ProjectImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProjectImagesRequest;

class ProjectImagesController extends Controller
{
   
    public function index()
    {
        $projects  = ProjectImage::all();
        return \view('admin.projects_images.index',\compact('projects'));
    }

  
    public function create()
    {
        $projects = Project::active()->get();
        return \view('admin.projects_images.create',\compact('projects'));
    }

    
    public function store(ProjectImagesRequest $request)
    {
        // return $request;
        try
        {
            // CHECK IF SUB IMAGES IS FOUND
            if ($request->hasFile('photos')) 
            {
                $IMAGES = $request->photos;
    
                foreach($IMAGES as $proPhotos)
                { 
                    // dd($proPhotos);
                    $create = ProjectImage::create(
                        [
                            'photos'            => $proPhotos->store('projectPhotos','public'),
                            'project_id'        => $request->project_id
                        ]);
                        
                        
                }  
                return redirect()->route('project_images.index')->with(['success' => 'Project Images Created Successfaly']);
            }
        }catch (\Throwable $th) 
        {
            return $th;
            
            DB::rollback();
            return \redirect()->route('project_images.index')->with(['error' => 'Something Error Please Try Again Later']);
        }
    }

   
    public function edit($id)
    {
        
        $proImage = ProjectImage::findOrFail($id);
        $projects = Project::active()->get();
        // return $proImage;
        return \view('admin.projects_images.edit',\compact('proImage','projects'));
    }

  
    public function update(ProjectImagesRequest $request, $id)
    {
        try 
        {
            
            // GET PROJECT IMAGE
                $proImage = ProjectImage::findOrFail($id);

            // CHECK IF PROJECT IMAGE IS FOUND
                if (!$proImage) 
                {
                    return \redirect()->route('project_images.index')->with(['error' => 'This Brand Not Found']);

                }else
                {
                    
            // UPDATE ALL DATA
            DB::beginTransaction();
                  

                    $proImage->project_id = $request->project_id;
                    $proImage->save();
                    
            // UPDATE PHOTO 
                    if ($request->hasFile('photos')) 
                    {
                        Storage::disk('public')->delete('/assets/admin/images/',$proImage->photos);
                        $photo =  $request->photos->store('projectPhotos','public');
                        $proImage->update(['photos' => $photo]);
                    }

            DB::commit();

                        return \redirect()->route('project_images.index')->with(['success' => 'Project Image Updated successfaly']);
                }
           

        } catch (\Throwable $th) 
        {
            return $th;
            DB::rollback();
            return \redirect()->route('project_images.index')->with(['error' => 'Something Error Please Try Again Later']);
        }
    }

   
    public function destroy($id)
    {
        try
        {
            // GET PROJECT IMAGE
            $proImage = ProjectImage::findOrFail($id);

            // CHECK IF PROJECT IMAGE IS FOUND
                if (!$proImage) 
                {
                    return \redirect()->route('project_images.index')->with(['error' => 'This Brand Not Found']);

                }else
                {
                    Storage::disk('public')->delete('/assets/admin/images/',$proImage->photos);
                    $proImage->delete();
                    return \redirect()->route('project_images.index')->with(['success' => 'Project Image Deleted successfaly']);
                }


        } catch (\Throwable $th) 
        {
            return $th;
            return \redirect()->route('project_images.index')->with(['error' => 'Something Error Please Try Again Later']);
        }
    }
}
