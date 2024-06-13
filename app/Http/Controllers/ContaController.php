<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContaController extends Controller
{
    public function add(Request $request){

        $contact = new Contact();
        $contact->email = $request->email;
        $contact->message = $request->message;
        $contact->save();

        return redirect('contact');
    }
}
