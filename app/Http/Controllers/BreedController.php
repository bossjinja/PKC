<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Breedgroup;
use App\Breed;

class BreedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $dogbreeds = Breed::with('breedgroup')
        ->join('breedgroups', 'breeds.breedgroup_id', '=', 'breedgroups.id')
        ->where('breedgroups.species', 'Dog')
        ->orderBy('breedgroups.displayorder', 'asc')
        ->orderBy('breeds.breedname', 'asc')->get();
        
        $catbreeds = Breed::with('breedgroup')
        ->join('breedgroups', 'breeds.breedgroup_id', '=', 'breedgroups.id')
        ->where('breedgroups.species', 'Cat')
        ->orderBy('breedgroups.displayorder', 'asc')
        ->orderBy('breeds.breedname', 'asc')->get();
        
        return view('breed.list')->with([
          'dogbreeds' => $dogbreeds,
          'catbreeds' => $catbreeds
          ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $groups = Breedgroup::all();
        return view('breed.create')->with([
          'groups' => $groups
          ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        //validate form data
        $this->validate($request, [
          'breedname' => 'required|unique:breeds',
          'breedgroup_id' => 'required|integer',
          'structure' => 'required',
          'color' => 'required',
          'faultsdqs' => 'required',
          'notes' => 'required'
        ]);
        
        $breed = Breed::create($request->all());
        return redirect()->route('breedlist');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $breed = Breed::with('breedgroup')->find($id);
        
        return view('breed.show')->with([
                    'breed' => $breed
                    ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
