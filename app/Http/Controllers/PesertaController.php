<?php

namespace App\Http\Controllers;

use App\Models\Soal;
use App\Models\User;
use App\Models\Jawaban;
use App\Models\Jadwal;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use jpmurray\LaravelCountdown\Countdown;

class PesertaController extends Controller
{
    public function index()
    {
        $peserta = User::where('id', auth()->user()->id)->first();
        return view('peserta/dashboard', compact('peserta'));
    }
    public function index_paket()
    {
        // $paket = Soal::groupBy('paket', 'paket')->get();
        $peserta = Auth::user()->id;
        $collection = Soal::groupBy('paket')
            ->selectRaw('count(*) as total, paket')
            ->get();
        return view('peserta/paket_soal', compact('collection', 'peserta'));
    }
    public function index_kt($paket)
    {
        $kt = Soal::groupBy('id_kategori')
            ->selectRaw('count(*) as total, id_kategori')
            ->where('paket', $paket)->get();
        return view('peserta/kategori', compact('kt', 'paket'));
    }
    public function profile($id_peserta)
    {
        return view('peserta/profil', compact('id_peserta'));
    }
    public function petunjuk($paket, $id_kategori, $tes)
    {
        // dd($tes);
        $petunjuk = Kategori::where('id_kategori', $id_kategori)->first();
        $kt = Soal::groupBy('id_kategori')
            ->selectRaw('count(*) as total, id_kategori')
            ->where('paket', $paket)->get();
        $jadwal = Jadwal::where(['paket' => $paket, 'id_kategori' => $id_kategori, 'tes_ke' => $tes, 'id_peserta' => auth()->user()->id])->first();
        $jamawal  =  date_create($jadwal->jam_mulai);
        $jamakhir = date_create(); // Waktu sekarang
        $diffjam  = $jamakhir->diff($jamawal);
        $selisihmenit = $diffjam->i;
        $selisihdetik = $diffjam->s;
        $selisihjam = $diffjam->h;
        $tanggalawal  = date_create($jadwal->tanggal_tes);
        $tanggalakhir = date_create(); // Waktu sekarang
        $diffwaktu  = $tanggalawal->diff($tanggalakhir);

        $selisihtahun = $diffwaktu->y;
        $selisihbulan = $diffwaktu->m;
        $selisihhari = $diffwaktu->d;
        // dd($selisihdetik);
        return view('peserta/petunjuk', compact('id_kategori', 'kt', 'paket', 'petunjuk', 'tes', 'selisihmenit', 'selisihdetik'));
    }
    public function soal_kt($paket, $id_kategori, $tes, $nomor_soal)
    {
        $peserta = Auth::user()->id;
        $waktu = Kategori::where('id_kategori', $id_kategori)->first()->waktu;
        $kt = Soal::where(['paket' => $paket, 'id_kategori' => $id_kategori])->get();
        $jadwal = Jadwal::where(['tes_ke' => $tes, 'id_peserta' => $peserta, 'id_kategori' => $id_kategori, 'paket' => $paket])->first();
        $id_jadwal = $jadwal->id_jadwal;
        $jawaban = Jawaban::where(['tes_ke' => $jadwal->tes_ke, 'id_user' => auth()->user()->id, 'id_soal' => $nomor_soal, 'id_kategori' => $id_kategori, 'paket' => $paket])->first();
        // dd($jawaban->jawaban);
        $soal = Soal::where(['paket' => $paket, 'id_kategori' => $id_kategori, 'nomor_soal' => $nomor_soal])->first();
        return view('peserta/soal_kt', compact('jadwal', 'id_jadwal', 'peserta', 'kt', 'paket', 'id_kategori', 'nomor_soal', 'soal', 'jawaban', 'waktu', 'tes'));
    }
    public function soal_kc($paket, $id_kategori, $tes, $nomor_soal)
    {
        $peserta = Auth::user()->id;
        // $isi = Jawaban::where(['id_user' => auth()->user()->id, 'nomor_soal' => $nomor_soal])->first();
        $waktu = Kategori::where('id_kategori', $id_kategori)->first()->waktu;
        $jawaban = Jawaban::where(['id_user' => auth()->user()->id, 'id_soal' => $nomor_soal, 'id_kategori' => $id_kategori, 'paket' => $paket])->first();
        $jadwal = Jadwal::where(['tes_ke' => $tes, 'id_peserta' => $peserta, 'id_kategori' => $id_kategori, 'paket' => $paket])->first();
        $id_jadwal = $jadwal->id_jadwal;
        $kategori = Kategori::where('id_kategori', $id_kategori)->first();
        $kt = Soal::where(['paket' => $paket, 'id_kategori' => $id_kategori])->get();
        $soal = Soal::where(['paket' => $paket, 'id_kategori' => $id_kategori, 'nomor_soal' => $nomor_soal])->first();
        return view('peserta/soal_kc', compact('jadwal', 'kategori', 'peserta', 'kt', 'paket', 'id_kategori', 'nomor_soal', 'soal', 'jawaban', 'waktu', 'tes', 'id_jadwal'));
    }
    public function simpanjawaban(Request $request, $paket, $id_kategori, $tes, $nomor_soal)
    {
        // dd($request->pilihan);
        $jadwal = Jadwal::where(['tes_ke' => $tes, 'id_peserta' => Auth::user()->id, 'id_kategori' => $id_kategori, 'paket' => $paket])->first();
        $soal = Soal::where(['paket' => $paket, 'id_kategori' => $id_kategori, 'nomor_soal' => $nomor_soal])->first();
        $jawaban = Jawaban::where(['id_user' => auth()->user()->id, 'id_kategori' => $id_kategori, 'id_soal' => $nomor_soal, 'paket' => $paket, 'tes_ke' => $jadwal->tes_ke])->first();
        if (!empty($jawaban)) {
            Jawaban::where([
                'id_jawaban' => $jawaban->id_jawaban,
            ])->update([
                'jawaban' => $request->pilihan,
            ]);
        } else {
            Jawaban::create([
                'id_soal' => $request->nomor_soal,
                'id_user' => auth()->user()->id,
                'id_kategori' => $id_kategori,
                'jawaban' => $request->pilihan,
                'paket' => $paket,
                'tes_ke' => $jadwal->tes_ke,
            ]);
        }
        $nomorterakhir = Soal::where(['paket' => $paket, 'id_kategori' => $id_kategori])->orderBy('nomor_soal', 'DESC')->first();
        // dd($nomorterakhir->nomor_soal);
        if ($id_kategori >= 3 && $id_kategori <= 12) {
            if ($request->input('nomor_soal')  == $nomorterakhir->nomor_soal) {
                return redirect()->route('soal_kc', [$paket, $id_kategori, $tes, $nomor_soal]);
            } elseif (($request->input('nomor_soal')  != $nomorterakhir->nomor_soal)) {
                return redirect()->route('soal_kc', [$paket, $id_kategori, $tes, $nomor_soal + 1]);
            }
        } else {
            if ($request->input('nomor_soal')  == $nomorterakhir->nomor_soal) {
                return redirect()->route('soal_kt', [$paket, $id_kategori, $tes, $nomor_soal]);
            } elseif (($request->input('nomor_soal')  != $nomorterakhir->nomor_soal)) {
                return redirect()->route('soal_kt', [$paket, $id_kategori, $tes, $nomor_soal + 1]);
            }
        }
    }
}
