<?php

namespace App\Http\Controllers\User;

use App\Models\Company;
use App\Models\Project;
use App\Models\Building;
use App\Models\Governorate;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class isersController extends Controller
{
    public function welcome()
   {
        $govs = Governorate::all();
        
         $lastCompanies = Company::with('projects','rates')->latest()->paginate(4);
        //  return $lastCompanies;
         $lastProjects  = Project::where( 'created_at', '<', Carbon::now()->subDays(1))->latest()->paginate(6);
       
        // return $lastProjects;

        return view('welcome',\compact('govs','lastCompanies','lastProjects'));
   }
   

    
    
    public function project_detailes($id)
    {
        $govs = Governorate::all();
        $project = Project::with('buildings')->findOrFail($id);
        // return $project;

        try
        {
            if(!$project)
            {
                return \redirect()->back()->with(['error' => 'This PROJECT Not Found']);

            }else
            {
                // return $project;
                return \view('user.projectDetailes',\compact('govs','project'));
            }

        }catch (\Throwable $th) 
        {
            return $th;
            return \redirect()->route('companyDetailes')->with(['error' => 'Something Error Please Try Again Later']);
        }
    }

    public function allCompanies()
    {
        $govs       = Governorate::all();
        $companies  = Company::with('projects')->active()->get();
        // return $companies;
        return \view('user.allCompanies',\compact('govs','companies'));
    }

    public function companyDetailes($id)
    {
        $govs       = Governorate::all();
        $company    = Company::with('projects')->findOrFail($id); 
        try
        {
            if(!$company)
            {
                return \redirect()->route('companyDetailes')->with(['error' => 'This Company Not Found']);

            }else
            {
                // return $company;
                return \view('user.companyDetailes',\compact('govs','company'));
            }

        }catch (\Throwable $th) 
        {
            return $th;
            return \redirect()->route('companyDetailes')->with(['error' => 'Something Error Please Try Again Later']);
        }
        
    }

    public function govProjects($id)
    {
        $govs       = Governorate::all();
        $pros    = Governorate::with('projects')->findOrFail($id); 
        try
        {
            if(!$pros)
            {
                return \redirect()->route('govProjects')->with(['error' => 'This Governorate Not Found']);

            }else
            {
                // return $pros;
                return \view('user.govProjects',\compact('govs','pros'));
            }

        }catch (\Throwable $th) 
        {
            return $th;
            return \redirect()->route('companyDetailes')->with(['error' => 'Something Error Please Try Again Later']);
        }
    }

    public function buildingDetailes($id)
    {
        $govs       = Governorate::all();
        $building    = Building::with('building_type','project','attributes','buildingImages')->findOrFail($id); 
        // return $building;
        try
        {
            if(!$building)
            {
                return \redirect()->route('buildingDetailes')->with(['error' => 'This Building Not Found']);

            }else
            {
                // return $company;
                return \view('user.buildingDetailes',\compact('govs','building'));
            }

        }catch (\Throwable $th) 
        {
            return $th;
            return \redirect()->route('buildingDetailes')->with(['error' => 'Something Error Please Try Again Later']);
        }
    }


}
