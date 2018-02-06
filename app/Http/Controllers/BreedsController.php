<?php

namespace App\Http\Controllers;
use App\Breed;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BreedsController extends Controller
{
    //list all breeds
    public function index(){
      $breeds = DB::table('breeds')->get();
      return view('breeds.index', ['breeds' => $breeds]);
    }

    //show form to add new breed
    public function create(){
      $groups = config('groups.order');
      return view('breeds.create', ['groups' => $groups]);
    }

    //store the newly created breed
    public function store(Request $request){
        $data = $request->validate([
          'name' => 'required|unique:breeds',
          'standard_url' => 'required|url',
          'group' => 'required|numeric'
        ]);

        Breed::create($data);
        return redirect('breeds')->with('msg', 'Breed successfully added.');
    }

    //display one breed
    public function show($id){

    }

    //show form for editing a breed
    public function edit($id){
      $breed = Breed::find($id);
      $groups = config('groups.order');

      return view('breeds.edit', ['breed' => $breed, 'groups' => $groups]);
    }

    //update the specified breed
    public function update($id, Request $request){
      $data = $request->validate([
        'name' => 'required',
        'standard_url' => 'required|url',
        'group' => 'required|numeric'
      ]);

      $breed = Breed::find($id);
      $breed->fill($data);
      $breed->save();

      return redirect('breeds')->with('msg', $breed->name.' was successfully updated.');
    }

    //delete the specified breed
    public function destroy($id){

    }
}
