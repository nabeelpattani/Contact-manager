<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        return view('contacts.index', compact('contacts'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|max:255',
            'phone_number' => 'required|numeric|max_digits:15',

        ]);


        $contact = new Contact();
        $contact->name = $request->name;
        $contact->phone_number = $request->phone_number;
        $contact->save();
        return redirect()->back()->with('success', 'Contact added successfully');
    }
}
