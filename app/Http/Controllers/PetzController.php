<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Petz;
use Illuminate\Support\Facades\Auth;

class PetzController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {     
        $pet = Petz::all();
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
        return view('petz.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
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
        return view('petz.petz')->with([
            'pet' => $pet,
            'pedigree' => $pedigree
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
