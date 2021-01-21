<?php

namespace App\Http\Controllers\Admin;

use App\Models\Governorate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\GvernorateTranslation;
use App\Http\Requests\GovernorateRequest;

class GovernoratesController extends Controller
{

    
    public function index()
    {
      
        $governorates = Governorate::all();
        return view('admin.governorates.index',\compact('governorates'));
    }

    public function create()
    {
        return view('admin.governorates.create');
    }

    public function store(GovernorateRequest $request)
    {
        // return $request;
        try
        {
            
            // CREATE Governorate
            $gov = Governorate::create([]);
            $gov->name = $request->name;
            $gov->save();
            return \redirect()->route('governorate.index')->with(['success' => 'New Governorate Created Successfaly']);

        }catch (\Throwable $th) 
        {
            return $th;
            return \redirect()->route('governorate.index')->with(['error' => 'Something Error Please Try Again Later']);
        }
    }

    public function edit($id)
    {
        try
        {
            $governorate = Governorate::findOrFail($id);
            if(!$governorate)
            {
                return \redirect()->route('governorate.index')->with(['error' => 'THIS Governorate Not Found']);
            }else
            {
                return view('admin.governorates.edit',\compact('governorate'));
            }
            
        }catch (\Throwable $th) 
        {
            return $th;
            return \redirect()->route('governorate.index')->with(['error' => 'Something Error Please Try Again Later']);
        }
    }

    public function update($id,GovernorateRequest $request)
    {
        try
        {
            $governorate = Governorate::findOrFail($id);
            // return $governorate;
            if(!$governorate)
            {
                return \redirect()->route('governorate.index')->with(['error' => 'THIS Governorate Not Found']);
            }else
            {
                $governorate->name = $request->name;
                $governorate->save();

                return redirect()->route('governorate.index')->with(['success' => 'Governorate Updated Successfaly']);
            }
            
        }catch (\Throwable $th) 
        {
            return $th;
            return \redirect()->route('governorate.index')->with(['error' => 'Something Error Please Try Again Later']);
        }
    }

    public function destroy($id)
    {
        try
        {
            $governorate = Governorate::with('cities')->findOrFail($id);
            
            if(!$governorate)
            {
                return \redirect()->route('governorate.index')->with(['error' => 'THIS Governorate Not Found']);

            }elseif($governorate->cities && $governorate->cities->pluck('is_active')->implode(', ') == 1)
            {
                return \redirect()->route('governorate.index')->with(['error' => 'THIS Governorate HAVE ACTIVE CITIES']);
                
            }elseif($governorate->cities && $governorate->cities->pluck('is_active')->implode(', ') == 0)
            {
                
            DB::beginTransaction();
               
                // $governorate->cities->delete();
                foreach ($governorate->cities as $cit) 
                {
                    
                    $cit->delete();
                }
                $governorate->delete();
            DB::commit();  
            }
            return \redirect()->back()->with(['success' => 'Governorate Deleted Successfaly']);
            
        }catch (\Throwable $th) 
        {
            return $th;
            
        DB::rollback();
            
            return \redirect()->route('governorate.index')->with(['error' => 'Something Error Please Try Again Later']);
        }
    }
}
