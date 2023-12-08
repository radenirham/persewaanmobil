<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use illuminate\Support\Facades\File;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        $pegawai = User::all();
        return view('pegawai.index',compact('pegawai','keyword'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pegawai.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createuser(Request $request)
    {
        if ($request->hasFile('foto')) {
            $extension = $request->file('foto')->getClientOriginalExtension();
            $filename = uniqid() . '.' . $extension;    
            $request->file('foto')->move('image', $filename);
            user::create([
                'pegawai_nama' => $request->nama,
                'foto' => $filename, 
                'pegawai_umur' => $request->umur,
                'pegawai_alamat' => $request->alamat,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);

        }
        return redirect()->route('pegawai.index');
    }

    public function edituser(Request $request,$id)
    {
        if ($request->hasFile('foto')) {
            $extension = $request->file('foto')->getClientOriginalExtension();
            $filename = uniqid() . '.' . $extension;    
            $request->file('foto')->move('image', $filename);
            user::where('id',$id)->update([
                'pegawai_nama' => $request->nama,
                'foto' => $filename, 
                'pegawai_umur' => $request->umur,
                'pegawai_alamat' => $request->alamat,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);

        }
        return redirect()->route('pegawai.index');
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
        $pegawai = User::find($id);
        return view('pegawai.edit',compact('pegawai'));
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
        $pegawai = user::where('id',$id)->first();
        $pegawai->delete();
        return back();
    }
}
