<?php

namespace App\Http\Controllers\User;

use App\Models\Governorate;
use Illuminate\Http\Request;
use App\Mail\contactFormMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ContactUsRequest;

class ContactUsController extends Controller
{
   
    public function contactForm()
    {
        $govs       = Governorate::all();
        return \view('user.contact.contactUS',\compact('govs'));
    }

    public function submitMessage(ContactUsRequest $request)
    {
        $data =  $request;
        
        Mail::to('test@test.com')->send(new contactFormMail($data));
      
        return \redirect()->back()->with(['success' => 'Email Send Successfay']);
    }

   
}
