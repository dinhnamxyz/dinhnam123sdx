<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class ListingController extends Controller
{
    //Show all listings
    public function index(){
        return view('listings.index', [
            'listings' => Listing::latest()->
            filter(request(['tag','search']))->paginate(3)
        ]);
    }

    //Show single listing
    public function show(Listing $listing) {
        return view('listings.show',[
            'listing' => $listing
        ]);
    }
// Store listing data
    public function store(Request $request,Listing $listing)
    {
        $formFields = $request->validate([
            'name'=> ['required'],
            'tags' =>   'required',
            'minides'=> 'required',
            'description'=> 'required',
            'price'=> 'required',
            'website'=> 'required',
            'logo'=>'nullable|file',
             'screenshot'=>'nullable|file'
        ]);

        if($request->hasFile('logo')){
            $formFields['logo'] =$request->file('logo')->store('logos','public');
        }

        if($request->hasFile('screenshot')){
            $formFields['screenshot'] =$request->file('screenshot')->store('screenshots','public');
        }

        Listing::create($formFields);

        return redirect('/')->with('message','Listing created successfully !!');
    }


    //Update Listing data
    public function update(Request $request,Listing $listing)
    {
        $formFields = $request->validate([
            'name'=> ['required'],
            'tags' =>   'required',
            'minides'=> 'required',
            'description'=> 'required',
            'price'=> 'required',
            'website'=> 'required',
            'logo'=>'nullable|file',
             'screenshot'=>'nullable|file'
        ]);

        if($request->hasFile('logo')){
            $formFields['logo'] =$request->file('logo')->store('logos','public');
        }

        if($request->hasFile('screenshot')){
            $formFields['screenshot'] =$request->file('screenshot')->store('screenshots','public');
        }

        $listing->update($formFields);

        return redirect('/')->with('message','Listing updated successfully !!');
    }

    // Show create form
    public function create(){
        return view('listings.create');
    }
    //Show Edit Form
    public function edit(Listing $listing){
        return view('listings.edit',['listing' => $listing]);
    }

    //Delete Listing
    public function destroy(Listing $listing){
        $listing->delete();
        return redirect('/') ->with('message','Listing deleted Successfully');
    }
}




