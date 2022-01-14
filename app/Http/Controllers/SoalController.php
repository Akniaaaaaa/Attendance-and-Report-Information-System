<?php

namespace App\Http\Controllers;

use App\Exports\SoalExport;
use App\Imports\SoalImport;
use App\Models\Kategori;
use App\Models\Soal;
use Illuminate\Http\Request;
use Illuminate\Support\File;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class SoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_kategori)
    {
        $kategori = Soal::orderBy('id_kategori', 'DESC')->first();
        $data_soal = Soal::where('id_kategori', $id_kategori)->first();
        $data_kategori = Kategori::where('id_kategori', $id_kategori)->first();

        if ($id_kategori != 3) {
            $soal = Soal::where('id_kategori', $id_kategori)->get();
        } else {
            $soal = Soal::whereIn('id_kategori', [3, 4, 5, 6, 7, 8, 9, 10, 11, 12])->get();
        }
        return view('admin/soal', compact('soal', 'data_soal', 'id_kategori', 'kategori', 'data_kategori'));
    }

    public function indexx()
    {

        $soal = Soal::get();
        return view('admin/ssoal', compact('soal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kt = Kategori::get();
        return view('admin/tambah_sl', compact('kt'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->soal_file != null) {
            $name_s = $request->soal_file->getClientOriginalName();
            $input_s = $request->soal_file->storeAs('soal_file', $name_s);
        } else {
            $input_s = "Tidak Ada Gambar";
        }
        if ($request->filepilgan_a != null) {
            $name_a = $request->filepilgan_a->getClientOriginalName();
            $input_a = $request->filepilgan_a->storeAs('pilganA', $name_a);
        } else {
            $input_a = "Tidak Ada Gambar";
        }
        if ($request->filepilgan_b != null) {
            $name_b = $request->filepilgan_b->getClientOriginalName();
            $input_b = $request->filepilgan_b->storeAs('pilganB', $name_b);
        } else {
            $input_b = "Tidak Ada Gambar";
        }
        if ($request->filepilgan_c != null) {
            $name_c = $request->filepilgan_c->getClientOriginalName();
            $input_c = $request->filepilgan_c->storeAs('pilganC', $name_c);
        } else {
            $input_c = "Tidak Ada Gambar";
        }
        if ($request->filepilgan_d != null) {
            $name_d = $request->filepilgan_d->getClientOriginalName();
            $input_d = $request->filepilgan_d->storeAs('pilganD', $name_d);
        } else {
            $input_d = "Tidak Ada Gambar";
        }
        if ($request->filepilgan_e != null) {
            $name_e = $request->filepilgan_e->getClientOriginalName();
            $input_e = $request->filepilgan_e->storeAs('pilganE', $name_e);
        } else {
            $input_e = "Tidak Ada Gambar";
        }
        Soal::create([
            'soal' => $request->soal,
            'soal_file' => $input_s,
            'pilgan_a' => $request->pilgan_a,
            'pilgan_b' => $request->pilgan_b,
            'pilgan_c' => $request->pilgan_c,
            'pilgan_d' => $request->pilgan_d,
            'pilgan_e' => $request->pilgan_e,
            'filepilgan_e' => $input_e,
            'filepilgan_d' => $input_d,
            'filepilgan_c' => $input_c,
            'filepilgan_b' => $input_b,
            'filepilgan_a' => $input_a,
            'kunci_jawaban' => $request->kunci_jawaban,
            'bobot' => $request->bobot,
            'nomor_soal' => $request->nomor_soal,
            'paket' => $request->paket,
            'id_kategori' => $request->id_kategori,
        ]);
        return redirect()->route('soal');
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
        $kt = Kategori::get();
        $soal = Soal::where('id_soal', $id)->first();
        return view('admin/ubah_sl', compact('soal', 'kt'));
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
        if ($request->soal_file != null) {
            $name_s = $request->soal_file->getClientOriginalName();
            $input_s = $request->soal_file->storeAs('soal_file', $name_s);
        } else {
            $input_s = "Tidak Ada Gambar";
        }
        if ($request->filepilgan_a != null) {
            $name_a = $request->filepilgan_a->getClientOriginalName();
            $input_a = $request->filepilgan_a->storeAs('pilganA', $name_a);
        } else {
            $input_a = "Tidak Ada Gambar";
        }
        if ($request->filepilgan_b != null) {
            $name_b = $request->filepilgan_b->getClientOriginalName();
            $input_b = $request->filepilgan_b->storeAs('pilganB', $name_b);
        } else {
            $input_b = "Tidak Ada Gambar";
        }
        if ($request->filepilgan_c != null) {
            $name_c = $request->filepilgan_c->getClientOriginalName();
            $input_c = $request->filepilgan_c->storeAs('pilganC', $name_c);
        } else {
            $input_c = "Tidak Ada Gambar";
        }
        if ($request->filepilgan_d != null) {
            $name_d = $request->filepilgan_d->getClientOriginalName();
            $input_d = $request->filepilgan_d->storeAs('pilganD', $name_d);
        } else {
            $input_d = "Tidak Ada Gambar";
        }
        if ($request->filepilgan_e != null) {
            $name_e = $request->filepilgan_e->getClientOriginalName();
            $input_e = $request->filepilgan_e->storeAs('pilganE', $name_e);
        } else {
            $input_e = "Tidak Ada Gambar";
        }

        Soal::where('id_soal', $id)->update([
            'soal' => $request->soal,
            'id_kategori' => $request->id_kategori,
            'soal_file' => $input_s,
            'pilgan_a' => $request->pilgan_a,
            'pilgan_b' => $request->pilgan_b,
            'pilgan_c' => $request->pilgan_c,
            'pilgan_d' => $request->pilgan_d,
            'pilgan_e' => $request->pilgan_e,
            'filepilgan_e' => $input_e,
            'filepilgan_d' => $input_d,
            'filepilgan_c' => $input_c,
            'filepilgan_b' => $input_b,
            'filepilgan_a' => $input_a,
            'kunci_jawaban' => $request->kunci_jawaban,
            'bobot' => $request->bobot,
        ]);
        return redirect()->route('soal');
    }
    public function soalexport()
    {
        return Excel::download(new SoalExport, 'soal.xlsx');
    }
    public function soalimport(Request $request)
    {
        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();
        $file->move('DataSoal', $namaFile);
        Excel::import(new SoalImport, public_path('/DataSoal/' . $namaFile));
        return redirect()->route('soal');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Soal::where('id_soal', $id)->delete();
        return redirect()->route('soal');
    }
}
