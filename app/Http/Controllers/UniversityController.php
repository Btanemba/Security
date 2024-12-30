<?php

namespace App\Http\Controllers;
use Webpatser\Countries\Countries;
use App\Models\University;
use Illuminate\Http\Request;

class UniversityController extends Controller
{
    //Show the registration form
    public function create()
    {
        return view('universities.create');
    }



    public function store(Request $request)
    {
        // Validate the form data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'country' => 'required|string|max:255',
        ]);

        // Store the university with the validated data
        University::create([
            'name' => $validated['name'],
            'address' => $validated['address'],
            'state' => $validated['state'],
            'country' => $validated['country'],
        ]);

        return redirect()->route('home')->with('success', 'University registered successfully!');
    }


}

