<?php

namespace App\Http\Controllers\Admin;

use App\Models\City;
use App\Models\Governorate;
use Illuminate\Http\Request;
use App\Http\Requests\CityRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CitiesController extends Controller
{
    public function index()
    {
        
        $cities = City::with('governorats')->get();
        return view('admin.cities.index',\compact('cities'));
    }

    public function create()
    {
        $governorates = Governorate::all();
        return view('admin.cities.create',compact('governorates'));
    }

    public function store(CityRequest $request)
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

        // CREATE CITY   
        DB::beginTransaction();
            
            $city = City::create(
                [
                    'governorate_id'    => $request->governorate_id,
                    'is_active'         => $request->is_active,
                ]);
            $city->name = $request->name;
            $city->save();
            
        DB::commit();
            
            return \redirect()->route('city.index')->with(['success' => 'New Governorate Created Successfaly']);

        }catch (\Throwable $th) 
        {
            return $th;
            
        DB::rollback();
            return \redirect()->route('city.index')->with(['error' => 'Something Error Please Try Again Later']);
        }
    }

    public function edit($id)
    {
        try
        {
            $city = City::findOrFail($id);
            $governorates = Governorate::all();
            if(!$city)
            {
                return \redirect()->back()->with(['error' => 'This city not found']);
            }else
            {
               return view('admin.cities.edit',compact('city','governorates'));
            }

        }catch (\Throwable $th) 
        {
            return $th;
            return \redirect()->route('city.index')->with(['error' => 'Something Error Please Try Again Later']);
        }
    }


    public function update($id,CityRequest $request)
    {
        try
        {
            $city = City::findOrFail($id);

            if(!$city)
            {
                return \redirect()->back()->with(['error' => 'This city not found']);
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

            // UPDATE ALL DATA 
            DB::beginTransaction();
                $city->update(
                    [
                        'governorate_id'    => $request->governorate_id,
                        'is_active'         => $request->is_active,
                    ]);

                    $city->name = $request->name;
                    $city->save();
                
            DB::commit();    
                return \redirect()->route('city.index')->with(['success' => 'city Updated Successfaly']);
                
            }

        }catch (\Throwable $th) 
        {
            return $th;
            DB::rollback();
            return \redirect()->route('city.index')->with(['error' => 'Something Error Please Try Again Later']);
        }
    }

    public function destroy($id)
    {
        try
        {
            $city = City::with('projects')->findOrFail($id);
            if(!$city)
            {
                return \redirect()->back()->with(['error' => 'This city not found']);

            }elseif($city->is_active == 1)
            {
                return \redirect()->back()->with(['error' => 'This city Is Active']);

            }elseif($city->projects && $city->projects->pluck('is_active')->implode(', ') == 1)
            {
                return \redirect()->route('city.index')->with(['error' => 'THIS CITY HAVE ACTIVE PROJECT']);
               
                

            }elseif($city->projects && $city->projects->pluck('is_active')->implode(', ') == 0)
            {
                DB::beginTransaction();
    
                foreach ($city->projects as $pro) 
                {
                    
                    $pro->delete();
                }
                 $city->delete();
                DB::commit();  
            }
            return \redirect()->back()->with(['success' => 'city Deleted Successfaly']);

        }catch (\Throwable $th) 
        {
            return $th;
            
            DB::rollback();
            return \redirect()->route('city.index')->with(['error' => 'Something Error Please Try Again Later']);
        }
    }
}
