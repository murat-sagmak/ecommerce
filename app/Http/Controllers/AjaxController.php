<?php

namespace App\Http\Controllers;
use App\Http\Requests\ContentFormRequest;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;




class AjaxController extends Controller
{
    public function contactsave(ContentFormRequest $request){ #posttan aldigimiz verileri kaydetmek icin Request fonksiyonunu dahil ediyoruz

        $data = $request->all();
        $data["ip"] = $request->ip();
        $newdata =[
            'name'=> Str::title($request->name),
            'email'=> $request->email,
            'subject'=> $request->subject,
            'message'=> $request->message,
            'ip'=> request()->ip(),
        ];

       $savedmessage = Contact::create($data);
       
       Mail::to('demo@gmail.com')->send(new ContactMail($newdata));

       return redirect()->route('contact');
    }
}
