<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Soal;
use App\Models\Kategori;
use App\Models\User;
use Illuminate\Http\Request;

class JadwaladminController extends Controller
{
    public function index_peserta($paket, $id_peserta)
    {
        $kt = Soal::groupBy('id_kategori')
            ->selectRaw('count(*) as total, id_kategori')
            ->where('paket', $paket)->get();
        $jadwal = Jadwal::with(['kategori'])->where(['paket' => $paket, 'id_peserta' => $id_peserta])
            ->whereNotIn('id_kategori',  [3, 4, 5, 6, 7, 8, 9, 10, 11, 12])
            ->get();
        $cek_kecermatan = Jadwal::where('id_kategori', 3)->orderBy('id_jadwal', 'DESC')->first();

        return view('peserta/jadwal', compact('jadwal', 'kt', 'paket', 'cek_kecermatan'));
    }

    public function index(Request $request)
    {

        $jadwal = Jadwal::when($request->cari, function ($query) use ($request) {
            $query->where('tanggal_tes', 'LIKE', "%{$request->cari}%");
        })->paginate(25);
        $jadwall = Jadwal::with(['kategori'])
            ->whereNotIn('id_kategori',  [3, 4, 5, 6, 7, 8, 9, 10, 11, 12])
            ->get();
        $cek_kecermatanp = Jadwal::where('id_kategori', 3)->get();
        return view('admin/jadwal', compact('jadwall', 'cek_kecermatanp'));
    }

    public function create()
    {
        $kt = Kategori::get();
        $soal = Soal::groupBy('paket')
            ->selectRaw('count(*) as total, paket')
            ->get();
        $user = User::where('role', '1')->get();
        return view('/admin/tambah_jadwal', compact('kt', 'user', 'soal'));
    }

    public function store_jadwal(Request $request)
    {
        foreach ($request->jadwal as $data) {
            Jadwal::create([
                'tanggal_tes' => $request->tanggal_tes,
                'jam_mulai' => $request->jam_mulai,
                'jam_selesai' => $request->jam_selesai,
                'status_ujian' => 'Belum Ujian',
                'paket' => $request->paket,
                'id_kategori' => $request->id_kategori,
                'tes_ke' => count(Jadwal::where('id_peserta', $data)->get()) + 1,
                'id_peserta' => $data,
            ]);
        }
        return redirect()->route('jadwal');
    }

    public function edit($id)
    {
        $soal = Soal::groupBy('paket')
            ->selectRaw('count(*) as total, paket')
            ->get();
        $kt = Kategori::get();
        $user = User::where('role', '1')->get();
        $tb_jadwal = Jadwal::where('id_jadwal', $id)->first();
        $id_peserta = $tb_jadwal->id_peserta;
        return view('/admin/ubah_jadwal', compact('tb_jadwal', 'kt', 'user', 'id_peserta', 'soal'));
    }

    public function update(Request $request, $id)
    {
        $jadwal = Jadwal::where('id_jadwal', $id)->first();
        Jadwal::where('id_jadwal', $jadwal->id_jadwal)->update([
            'tanggal_tes' => $request->input('tanggal_tes'),
            'jam_mulai' => $request->input('jam_mulai'),
            'jam_selesai' => $request->input('jam_selesai'),
            'status_ujian' => $request->input('status_ujian'),
            'paket' => $request->input('paket'),
            'id_kategori' => $request->input('id_kategori'),
            'id_peserta' => $request->input('id_peserta')
        ]);
        return redirect()->route('jadwal')->with('status', 'Data Berhasil Ditambahkan');
    }

    public function destroy(Request $request)
    {
        // $jadwal = Jadwal::where('id_jadwal', $id)->delete();
        foreach ($request->hapus as $data) {

            Jadwal::where('id_jadwal', $data)

                ->delete();
        }
        return redirect()->route('jadwal');
    }
}
