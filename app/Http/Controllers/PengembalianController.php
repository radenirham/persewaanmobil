<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengembalian;
use App\Models\Peminjaman;
use App\Models\Mobil;
use Carbon\Carbon;

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
        $request->validate([
            'platnomor' => 'required',
        ]);
        $platnomor = $request->platnomor;
        $mobil = Mobil::where('platnomor', $platnomor)->first();
    
        if (!$mobil) {
            return redirect()->route('pengembalian.index')->with('error', 'Mobil tidak ditemukan.');
        }
    
        $id_mobil = $mobil->id;
        $tarifsewa = $mobil->tarifsewa;
    
        $peminjaman = Peminjaman::where('id_merek', $id_mobil)->first();
    
        if (!$peminjaman) {
            return redirect()->route('pengembalian.index')->with('error', 'Data peminjaman tidak ditemukan.');
        }
    
        // Use Carbon to create DateTime objects
        $durasisewa1 = Carbon::parse($peminjaman->awal_sewa);
        $durasisewa2 = Carbon::now(); // Assuming 'akhir_sewa' represents the end of the rental, you can replace it with the correct value
    
        // Calculate the difference between start and end rental dates
        $durasisewa = $durasisewa1->diffInDays($durasisewa2);
        $pengembalian = new Pengembalian;
        $pengembalian->id_platnomor = $id_mobil;
        
        // Calculate the total price based on the rental duration and the rental rate
        $pengembalian->durasi_sewa = $durasisewa;
        $pengembalian->total_harga_sewa = $tarifsewa * $durasisewa;
    
        $pengembalian->save();
    
        return redirect()->route('pengembalian.index')->with('success', 'Data pengembalian berhasil disimpan.');
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
