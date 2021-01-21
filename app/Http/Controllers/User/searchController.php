<?php

namespace App\Http\Controllers\User;

use App\Models\City;
use App\Models\Company;
use App\Models\Project;
use App\Models\Building;
use App\Models\Governorate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\searchRequest;

class searchController extends Controller
{
   

   public function cities($id)
    {
        $city = City::where('governorate_id',$id)->get();
        return \response()->json($city);
    }

   public function projects($id)
    {
        $project = Project::where('city_id',$id)->get();
        return \response()->json($project);
    }

   public function bedRoom($id)
    {
        $building = Building::where('project_id',$id)->get();
        return \response()->json($building);
    }


   public function bathRoom($id)
    {
        $building = Building::where('project_id',$id)->get();
        return \response()->json($building);
    }


    public function search(searchRequest $request)
    {
        // return $request;
        $search = Building::where('project_id',$request->project_id)->with('buildingImages')->get();
        $govs   = Governorate::all();
        // return $search;
        return \view('user.buildingSearch',\compact('search','govs'));
    }


   


   
}
