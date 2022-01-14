<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kt = Kategori::get();
        return view('admin/kategori', compact('kt'));
    }
    public function waktu($id)
    {
        $kt = Kategori::where('id_kategori', $id)->first();
        return view('admin/waktu', compact('kt'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/admin/tambah_kt');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_kategori(Request $request)
    {
        Kategori::create([

            'nama_kategori' => $request->nama_kategori,
            'petunjuk' => $request->petunjuk,
        ]);
        return redirect()->route('kategori');
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
        $tb_kat = Kategori::where('id_kategori', $id)->first();
        return view('/admin/ubah_kt', compact('tb_kat', 'id'));
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
        // dd($request);
        $kat = Kategori::where('id_kategori', $id)->first();
        Kategori::where('id_kategori', $kat->id_kategori)
            ->update([
                'nama_kategori' => $request->input('nama_kategori'),
                'petunjuk' => $request->input('petunjuk'),
            ]);
        return redirect()->route('kategori')->with('status', 'Data Berhasil Ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kat = Kategori::where('id_kategori', $id)->delete();
        return redirect()->route('kategori');
    }
}
