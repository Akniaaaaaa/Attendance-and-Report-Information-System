<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Soal;
use App\Models\Kategori;
use App\Models\User;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index_peserta($paket, $id_peserta)
    {

        $kt = Soal::groupBy('id_kategori')
            ->selectRaw('count(*) as total, id_kategori')
            ->where('paket', $paket)->get();
        $cek_kecermatan = Jadwal::where('id_kategori', 3)->first();
        $jadwal = Jadwal::with(['kategori'])->where(['paket' => $paket, 'id_peserta' => $id_peserta])->get();

        return view('peserta/jadwal', compact('jadwal', 'kt', 'paket', 'cek_kecermatan'));
    }
    public function jadwal_kecermatan()
    {
        $kt = Kategori::whereIn('id_kategori', [3, 4, 5, 6, 7, 8, 9, 10, 11, 12])->get();
        $soal = Soal::groupBy('paket')
            ->selectRaw('count(*) as total, paket')
            ->get();
        $user = User::where('role', '1')->get();
        return view('admin/Tjadwal_kecermatan', compact('kt', 'soal', 'user'));
    }
    public function Sjadwal_kecermatan(Request $request)
    {
        foreach ($request->jadwal as $data) {
            foreach ($request->kategori as $data_kt) {
                Jadwal::create([
                    'tanggal_tes' => $request->tanggal_tes,
                    'jam_mulai' => $request->jam_mulai,
                    'jam_selesai' => $request->jam_selesai,
                    'status_ujian' => 'Belum Ujian',
                    'paket' => $request->paket,
                    'id_kategori' => $data_kt,
                    'tes_ke' => count(Jadwal::where('id_peserta', $data)->get()) + 1,
                    'id_peserta' => $data,
                ]);
            }
        }
        return redirect()->route('jadwal');
    }
    public function Ejadwal_kecermatan($id_peserta)
    {
        $kt = Kategori::whereIn('id_kategori', [3, 4, 5, 6, 7, 8, 9, 10, 11, 12])->get();
        $soal = Soal::groupBy('paket')
            ->selectRaw('count(*) as total, paket')
            ->get();
        $user = Jadwal::where('id_peserta', $id_peserta)->first();
        return view('admin/ubah_kec', compact('kt', 'soal', 'user', 'id_peserta'));
    }
    public function Ujadwal_kecermatan(Request $request, $id_peserta)
    {
        $peserta  = Jadwal::where('id_peserta', $id_peserta)
            ->whereIn('id_kategori', [3, 4, 5, 6, 7, 8, 9, 10, 11, 12])
            ->get();
        // dd($peserta);
        foreach ($peserta as $banyakP) {
            foreach ($request->kategori as $data_kt) {
                Jadwal::where('id_peserta', $id_peserta)
                    ->whereIn('id_kategori', [3, 4, 5, 6, 7, 8, 9, 10, 11, 12])
                    ->update([
                        'tanggal_tes' => $request->tanggal_tes,
                        'jam_mulai' => $request->jam_mulai,
                        'jam_selesai' => $request->jam_selesai,
                        'status_ujian' => 'Belum Ujian',

                    ]);
            }
        }
        return redirect()->route('jadwal');
    }
}
