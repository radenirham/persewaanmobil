<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobil;

class MobilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        $keyword = $request->keyword;
        $mobil = mobil::all();
        if($keyword){
            $mobil = $mobil->where('merek', 'LIKE', '%'.$keyword.'%')
            ->orwhere('model','LIKE', '%'.$keyword.'%')
            ->orwhere('platnomor','LIKE', '%'.$keyword.'%')
            ->orwhere('tarifsewa','LIKE', '%'.$keyword.'%')
            ;
        } 
        return view('mobil.index',compact('mobil','keyword'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mobil.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createmobil(Request $request)
    {
        $mobil = new mobil;
        $mobil->merek = $request->merek;
        $mobil->model = $request->model;
        $mobil->platnomor = $request->platnomor;
        $mobil->tarifsewa = $request->tarifsewa;
        $mobil->save();
        return redirect()->route('mobil');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
