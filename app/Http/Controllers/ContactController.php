<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index');
    }

    public function show()
    {
        $contacts = Contact::all();

        return view('contact.show', compact('contacts'));
    }

    public function store(Request $request)
    {
        $contact = new Contact;
        
        $contact->name = $request->input('name');
        $contact->email = $request->input('email');
        $contact->subject = $request->input('subject');
        $contact->message = $request->input('message');
        $contact->save();
        
        return redirect()->route('contact.index');
    }
}
