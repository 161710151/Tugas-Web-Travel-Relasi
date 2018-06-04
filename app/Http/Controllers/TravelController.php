<?php

namespace App\Http\Controllers;

use App\travel;
use App\kategori;
use Illuminate\Http\Request;

class TravelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $travel = travel::with('kategori')->get();
        return view('travel.index',compact('travel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori =kategori::all();
        return view('travel.create',compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
           $this->validate($request,[
            'nama_wisata' => 'required|',
            'artikel' => 'required',
            'kategori_id' => 'required'     
        ]);
        $travel = new travel;
        $travel->nama_wisata = $request->nama_wisata;
        $travel->artikel = $request->artikel;
        $travel->kategori_id = $request->kategori_id;
        $travel->save();
        return redirect()->route('travel.index'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $travel = travel::findOrFail($id);
        return view('travel.show',compact('travel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $travel = travel::findOrFail($id);
        $kategori = kategori::all();
        $selectedkategori = travel::findOrFail($id)->kategori_id;
        return view('travel.edit',compact('travel','kategori','selectedkategori'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\travel  $travel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
           $this->validate($request,[
            'nama_wisata' => 'required|',
            'artikel' => 'required|',
            'kuliner' => 'required',
            'kategori_id' => 'required'
        ]);
        $travel = travel::findOrFail($id);
        $travel->nama = $request->nama;
        $travel->artikel = $request->artikel;
        $travel->kuliner = $request->kuliner;
        $travel->kategori_id = $request->kategori_id;
        $travel->save();
        return redirect()->route('siswa.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\travel  $travel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $travel = travel::findOrFail($id);
        $travel->delete();
        return redirect()->route('travel.index');
    }
}