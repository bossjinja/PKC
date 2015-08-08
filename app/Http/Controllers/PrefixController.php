<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Prefix;

class PrefixController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $prefixes = Prefix::with('users')->get();
        
        return view('prefix.list')->with([
            'prefixes' => $prefixes
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('prefix.create')->with(['prefix' => new Prefix]);
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
          'prefix' => 'required|unique:prefixes'
        ]);
        
        $prefix = Prefix::create($request->all());
        $prefix->users()->attach(\Auth::user()->id);
        return redirect()->route('prefixlist');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $prefix = Prefix::with('users')->find($id);
        return view('prefix.show')->with([
            'prefix' => $prefix
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
        $prefix = Prefix::with('users')->find($id);
        return view('prefix.edit')->with([
            'prefix' => $prefix
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Request $request)
    {
        $prefix = Prefix::find($id);
        $prefix->update($request->all());
        
        return redirect()->route('showprefix', [$id]);
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
