<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Soal;
use App\Models\User;
use App\Models\Jawaban;
use App\Models\Jadwal;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SoalKecermatan extends Component
{
    public $paket;
    public $id_kategori;
    public $tes;
    public $nomor_soal;
    public function mount($paket, $id_kategori, $tes, $nomor_soal)
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
        return view('livewire.soal-kecermatan', compact('jadwal', 'kategori', 'peserta', 'kt', 'paket', 'id_kategori', 'nomor_soal', 'soal', 'jawaban', 'waktu', 'tes', 'id_jadwal'));
    }
    public function simpanjawaban(Request $request, $paket, $id_kategori, $tes, $nomor_soal)
    {

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
    public function render()
    {
        return view('livewire.soal-kecermatan', [
            // 'paket' => $this->paket = $paket,
        ]);
    }
}
