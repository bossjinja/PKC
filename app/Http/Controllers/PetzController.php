<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Petz;
use Illuminate\Support\Facades\Auth;
use App\Prefix;
use App\Breed;
use File;
use App\Image;

class PetzController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $pet = Petz::with('prefix1', 'prefix2', 'suffix')->where('workflow', '=', 'Complete')->get();
        return view('petz.index')->with([
            'pet' => $pet
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //probably need to pull a list of all prefixes, all breeds, etc to send to the view to build the form
        //pull all prefixes
        $prefixes = Prefix::orderBy('prefix')->get();

        //pull all breeds
        $breeds = Breed::with('breedgroup')
        ->join('breedgroups', 'breeds.breedgroup_id', '=', 'breedgroups.id')
        ->orderBy('breedgroups.species', 'asc')
        ->orderBy('breedgroups.displayorder', 'asc')
        ->orderBy('breeds.breedname', 'asc')
        ->get(array('breeds.*', 'breeds.id as breed_id'));


        return view('petz.create')->with([
            'prefixes' => $prefixes,
            'breeds' => $breeds
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $pet = new Petz();

        //validate form data
        $this->validate($request, $pet->get_rules());

        //insert petz data into database
        $pet->fill($request->all());
        $pet->workflow = "Draft";
        $pet->user_id = \Auth::user()->id;
        $pet->save();

        //make directories for the files
        $path = '/images/petz/'.date('Y').'/'.$pet->id;
        File::makeDirectory($path, '0774', true);

        //move the reg pictures to where they're stored and add to database
        if($request->hasFile('reg1')){
          if($request->file('reg1')->isValid()){
            $request->file('reg1')->move(public_path().$path, 'reg1.'.$request->file('reg1')->getClientOriginalExtension());

            //save to Image database
            $reg1 = new Image();
            $reg1->resource_id = $pet->id;
            $reg1->filename = 'reg1.'.$request->file('reg1')->getClientOriginalExtension();
            $reg1->path = $path;
            $reg1->imagetype = 'Reg';
            $reg1->save();
          }
        }

        if($request->hasFile('reg2')){
          if($request->file('reg2')->isValid()){
            $request->file('reg2')->move(public_path().$path, 'reg2.'.$request->file('reg2')->getClientOriginalExtension());

            //save to Image database
            $reg2 = new Image();
            $reg2->resource_id = $pet->id;
            $reg2->filename = 'reg2.'.$request->file('reg2')->getClientOriginalExtension();
            $reg2->path = $path;
            $reg2->imagetype = 'Reg';
            $reg2->save();
          }
        }

        if($request->hasFile('reg3')){
          if($request->file('reg3')->isValid()){
            $request->file('reg3')->move(public_path().$path, 'reg3.'.$request->file('reg3')->getClientOriginalExtension());

            //save to Image database
            $reg3 = new Image();
            $reg3->resource_id = $pet->id;
            $reg3->filename = 'reg3.'.$request->file('reg3')->getClientOriginalExtension();
            $reg3->path = $path;
            $reg3->imagetype = 'Reg';
            $reg3->save();
          }
        }

        return redirect()->route('regslist');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $pet = Petz::with('breed', 'hexer', 'breeder', 'owner', 'breedfile', 'prefix1', 'prefix2', 'suffix')->find($id);
        $pedigree = $pet->pedigree();
        $regpics = Image::where('resource_id', $pet->id)->where('imagetype', 'Reg')->get();
        return view('petz.petz')->with([
            'pet' => $pet,
            'pedigree' => $pedigree,
            'regpics' => $regpics
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

    //lists all regs the current user
    public function regs(){
        $petz = Petz::with('prefix1', 'prefix2', 'suffix')->where('user_id', Auth::user()->id)->where('workflow', '!=', 'Complete')->get();
        return view('petz.regs')->with([
            'regs' => $petz
            ]);
    }
}
