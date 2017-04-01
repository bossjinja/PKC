<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Breed;

class BreedfileController extends Controller
{
    //lists all the breedfiles ever
    public function index()
    {
        //
    }
    
    //returns all breedfiles for the given breed
    public function get_breedfiles(Request $request)
    {
        $breed = $request->breed;
        //find the breed
        $breedfiles = Breed::with('breedfiles')->find($breed);
        //return the breedfiles
        return $breedfiles;
    }

    //shows the form to add a new breedfile
    public function create()
    {
        //
    }

    //saves a new breedfile
    public function store()
    {
        //
    }

    //shows a single breedfile
    public function show($id)
    {
        //
    }

    //displays form to edit a single breedfile
    public function edit($id)
    {
        //
    }

    //saves the edits to a single breedfile
    public function update($id)
    {
        //
    }

    //deletes a single breedfile
    public function destroy($id)
    {
        //
    }
}
