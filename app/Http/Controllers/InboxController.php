<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class InboxController extends Controller
{
    public function index(){
        $inbox=Contact::paginate(100);
        return view('inbox.index',compact('inbox'));
    }

    public function edit($id){
        $inbox=Contact::where('id', $id)->firstOrFail();
        return view('inbox.edit',compact('inbox'));
    }
    public function update(Request $request, $id){
        $update = $request->status;
        
        Contact::where('id', $id)->update(['status' =>$update]);
        return back()->with('success', 'Operation was successful!');


    }
    public function destroy(string $id)
    {
        $inbox=Contact::where('id', $id)->firstOrFail();

        $inbox->delete();
        return back()->with('success', 'Operation was successful!');
    }
}
