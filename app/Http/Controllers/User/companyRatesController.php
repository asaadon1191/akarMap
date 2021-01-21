<?php

namespace App\Http\Controllers\User;

use App\Models\Company;
use App\Models\CompanyRate;
use App\Models\Governorate;
use Illuminate\Http\Request;
use App\Http\Requests\RateRequest;
use App\Http\Controllers\Controller;

class companyRatesController extends Controller
{
    public function ratePage($id)
    {
        $company    = Company::findOrFail($id);
        $govs       = Governorate::all();
        if(!$company)
        {
            return \redirect()->route('welcome')->with(['error' => 'This Company Nout Found']);
        }else
        {
            // CHECK IF RATE IS FOUND BERORE OR NOT
            $rate = CompanyRate::where(['company_id' => $company->id])->count();
            $user = CompanyRate::where(['user_id' => auth()->user()->id])->count();

            if($rate > 0 && $user > 0)
            {
                return \redirect()->back()->with(['error' => 'You Are Rated This Company']);
            }else
            {
                return \view('user.rates.rateCompany',\compact('company','govs'));
            }
            
        }
    }
    

    public function rate($id,RateRequest $request)
    {
        // return $request;
        if(!$request->has('rate'))
        {
            return \redirect()->route('welcome')->with(['error' => 'Please Select Rate']);
        }else
        {
            $company = Company::findOrFail($id);
            // return $company->id;
            $create = CompanyRate::create(
                [
                    'rate'          => $request->rate,
                    'user_id'      => \auth()->user()->id,
                    'company_id'    => $company->id
                ]);
            return \redirect()->route('welcome')->with(['success' => 'Rate Created Successfaly']);
        }
    }
}
