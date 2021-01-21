<?php

namespace App\Http\Controllers\Admin;

use App\Models\City;
use App\Models\Admin;

use App\Models\Company;
use App\Models\Project;
use App\Models\Governorate;
use App\Models\ProjectImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;
use Illuminate\Support\Facades\Storage;

class ProjectsController extends Controller
{
   
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index',compact('projects'));
    }

    public function create()
    {
        $governorates       = Governorate::select()->get();
        $companies          = Company::all();
        $lastPro            = Project::all()->last(); 
        if(!$lastPro)
        {
            $lastPro = 0;
        }
        // return $lastPro;
        return view('admin.projects.create',\compact('governorates','companies','lastPro'));
    }

    public function cities($id)
    {
        $city = City::where('governorate_id',$id)->get();
        return \response()->json($city);
    }

   
    public function store(ProjectRequest $request)
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
        // CREATE ALL PROJECTS   
        // dd($request->all()); 
            $create = Project::create(
                [
                    'space'         => $request->space,
                    'total_units'   => $request->total_units,
                    'admin_id'      => auth()->user()->id,
                    'city_id'       => $request->city_id,
                    'company_id'    => $request->company_id,
                    'governorate_id'=> $request->gov_id,
                    'is_active'     => $request->is_active,
                ]);

        // CHECK PHOTO
            if ($request->hasFile('logo')) 
            {
                $photo          =  $request->logo->store('projectes','public');
                $create->logo   = $photo;
                $create->save();
            }    

            if ($request->hasFile('map_desigen')) 
            {
                $photo =  $request->map_desigen->store('projectes','public');
                $create->map_desigen = $photo;
                $create->save();
            }    
            

        // CREATE TRANSLATION COLUMNS
             $create->name      = $request->name;  
             $create->adress    = $request->adress;  
             $create->save();
        DB::commit();

            return redirect()->route('project.index')->with(['success' => 'New Project Was Created Successfaly']);

       }catch (\Throwable $th) 
       {
           return $th;
           
           DB::rollback();
           return \redirect()->route('project.index')->with(['error' => 'Something Error Please Try Again Later']);
       }
    }

    
    public function show($id)
    {
        try
        {
            $project = Project::FindOrFail($id);
            if(!$project)
            {
                return \redirect()->back()->with(['error' => 'This Project Not Found']);
            }else
            {
                return view('admin.projects.show',\compact('project'));
            }

        }catch (\Throwable $th) 
        {
            return $th;
            return \redirect()->route('project.index')->with(['error' => 'Something Error Please Try Again Later']);
        }
       
        
    }

  
    public function edit($id)
    {

        try
        {
            $project = Project::FindOrFail($id);
            if(!$project)
            {
                return \redirect()->back()->with(['error' => 'This Project Not Found']);
            }else
            {
                $governorates       = Governorate::select()->get();
                $companies          = Company::all();
                return view('admin.projects.edit',\compact('project','governorates','companies'));
            }

        }catch (\Throwable $th) 
        {
            return $th;
            return \redirect()->route('project.index')->with(['error' => 'Something Error Please Try Again Later']);
        }
    }

    
    public function update(ProjectRequest $request, $id)
    {
        try
        {
            // GET PROJECT ROW
                $project = Project::with('buildings')->findOrFail($id);
                // return $project->buildings->count();

            // GET IS_ACTIVE INPUT
                if (!$request->is_active) 
                {
                $request->request->add(['is_active' => 0]);
                }else
                {
                    $request->request->add(['is_active' => 1]);
                }

            DB::beginTransaction();

        // CHECK PHOTO

                if ($request->hasFile('logo')) 
                {
                    Storage::disk('public')->delete('/assets/admin/images/',$project->logo);
                    $photo =  $request->logo->store('projectes','public');
                    $project->update(['logo' => $photo]);
                }    
                

                if ($request->hasFile('map_desigen')) 
                {
                    Storage::disk('public')->delete('/assets/admin/images/',$project->map_desigen);
                    $photo =  $request->map_desigen->store('projectes','public');
                    $project->update(['map_desigen' => $photo]);
                }     
            

        // UPDATE TRANSLATION COLUMNS AND ALL PROJECT DATA
                $project->name          = $request->name;  
                $project->adress        = $request->adress;  
                $project->space         = $request->space;  
                $project->total_units   = $request->total_units;  
                $project->city_id       = $request->city_id;  
                $project->company_id    = $request->company_id;  
                $project->governorate_id= $request->gov_id;  
                $project->admin_id      = auth()->user()->id;  
                $project->save();

                // CHECK IF IS PROJECT HAVE BUILDINGS 
                if($project->buildings && $project->buildings->count() > 0)
                {
                    return \redirect()->route('project.index')->with(['error' => 'This project have buildings so can,t deactivate it']);
                }else
                {
                    $project->is_active     = $request->is_active; 
                    $project->save();
                }
            DB::commit();

            return redirect()->route('project.index')->with(['success' => 'Update Project Successfaly']);


        }catch (\Throwable $th) 
        {
                return $th;
            DB::rollback();
                return \redirect()->route('project.index')->with(['error' => 'Something Error Please Try Again Later']);
        }
    }

    
    public function destroy($id)
    {
        try
        {
            $project   = Project::with('proIamges')->findOrFail($id);


            if($project)
            {
                if($project->is_active == 0)
                {
                    $project->proIamges()->delete();
                    $project->delete();
                    
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

    public function images($id ,Request $request)
    {
        $lastProject = Project::latest()->first()->id;
        // return $request;

         // CHECK IF SUB IMAGES IS FOUND
         if ($request->hasFile('photos')) 
         {
             $IMAGES = $request->photos;
 
             foreach($IMAGES as $proPhotos)
             { 
                 // dd($proPhotos);
                 $create = ProjectImage::create(
                     [
                         'photos'             => $proPhotos->store('projectPhotos','public'),
                          'project_id'       => $lastProject
                     ]);
                     
                     
             }  
             return redirect()->route('project.index')->with(['success' => 'Project Images Created Successfaly']);
         }
        // return $lastProject;
    }
}
