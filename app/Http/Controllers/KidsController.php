<?php

namespace App\Http\Controllers;

use App\Models\Kids;
use Illuminate\Http\Request;

class KidsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kids = Kids::all();
        return view('admin/kids', compact('kids'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/admin/tambah_kids');
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
            'name' => 'required',
            'age' => 'required',
            'ac_year' => 'required',
            'address' => 'required',
            'level' => 'required',
            'wali_murid' => 'required',
            'pic' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $fileName = time() . '.' . $request->pic->extension();
        $request->pic->storeAs('foto', $fileName);

        $kids = new Kids();
        $kids->name = $request->name;
        $kids->age = $request->age;
        $kids->ac_year = $request->ac_year;
        $kids->address = $request->address;
        $kids->level = $request->level;
        $kids->wali_murid = $request->wali_murid;
        $kids->pic = $request->file('pic')->store('poto');;
        $kids->save();
        // Kids::create([
        //     'name' => $request->name,
        //     'age' => $request->age,
        //     'ac_year' => $request->ac_year,
        //     'address' => $request->address,
        //     'level' => $request->level,
        //     'wali_murid' => $request->wali_murid,
        //     'pic' => $request->pic,
        // ]);
        return redirect()->route('kids');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kids  $kids
     * @return \Illuminate\Http\Response
     */
    public function show(Kids $kids)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kids  $kids
     * @return \Illuminate\Http\Response
     */
    public function edit(Kids $kids, $id)
    {
        $kids = Kids::where('id', $id)->first();
        return view('/admin/edit_ks', compact('kids', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kids  $kids
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kids $kids, $id)
    {
        $kids = Kids::where('id', $id)->first();
        Kids::where('id', $kids->id)
            ->update([
                'name' => $request->name,
                'age' => $request->age,
                'ac_year' => $request->ac_year,
                'address' => $request->address,
                'level' => $request->level,
                'wali_murid' => $request->wali_murid,
            ]);
        return redirect()->route('kids')->with('status', 'Data Berhasil Ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kids  $kids
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kids $kids, $id)
    {
        $kids = Kids::where('id', $id)->delete();
        return redirect()->route('kids');
    }
}
