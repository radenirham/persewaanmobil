<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengembalian;
use App\Models\Peminjaman;
use App\Models\Mobil;

class PengembalianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mobil = mobil::all();
        $pengembalian = pengembalian::all();
        return view('pengembalian.index',compact('pengembalian','mobil'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $platnomor = $request->platnomor;
        $mobil = mobil::where('platnomor', $platnomor)->first();
        $id_mobil = $mobil->id;
        $tarifsewa = $mobil->tarifsewa;
        $peminjaman = Peminjaman::where('id_merek', $id_mobil)->first();
        $durasisewa1 = $peminjaman->awal_sewa;
        $durasisewa2 = $peminjaman->akhir_sewa;
        $durasisewa = $durasisewa1->diff($durasisewa2);
        $pengembalian = new Pengembalian;
        $pengembalian->id_platnomor = $request->platnomor;
        $pengembalian->harga = $tarifsewa * $durasisewa;
        $pengembalian->save();
        return redirect()->route('pengembalian.index');
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
