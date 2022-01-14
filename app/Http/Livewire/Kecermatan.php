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

class Kecermatan extends Component
{
    public $paket;
    public $id_kategori;
    public $tes;
    public $nomor_soal;
    public $soal;
    public $jadwal;
    public $kategori;
    public $id_jadwal;
    public $simpanjawaban;
    public $pilihan;
    // public $listeners = ["simpanjawaban" => "simpanjawaban"];

    public function mounted($paket, $id_kategori, $tes, $nomor_soal, $soal, $jadwal, $kategori, $id_jadwal)
    {
        $this->nomor_soal = $nomor_soal;
        $this->paket = $paket;
        $this->id_kategori = $id_kategori;
        $this->tes = $tes;
        $this->soal = $soal;
        $this->jadwal = $jadwal;
        $this->kategori = $kategori;
        $this->id_jadwal = $id_jadwal;
    }
    public function render()
    {
        return view('livewire.kecermatan');
    }
    public function simpanjawaban()
    {
        $jadwal = Jadwal::where(["tes_ke" => $this->tes, "id_peserta" => Auth::user()->id, "id_kategori" => $this->id_kategori, "paket" => $this->paket])->first();
        $soal = Soal::where(["paket" => $this->paket, "id_kategori" => $this->id_kategori, "nomor_soal" => $this->nomor_soal])->first();
        $jawaban = Jawaban::where(["id_user" => auth()->user()->id, "id_kategori" => $this->id_kategori, "id_soal" => $this->nomor_soal, "paket" => $this->paket, "tes_ke" => $this->jadwal->tes_ke])->first();
        // if (!empty($jawaban)) {
        //     Jawaban::where([
        //         'id_jawaban' => $jawaban->id_jawaban,
        //     ])->update([
        //         'jawaban' => $this->pilihan,
        //     ]);
        // } else {
        Jawaban::create([
            'id_soal' => $this->nomor_soal,
            'id_user' => auth()->user()->id,
            'id_kategori' => $this->id_kategori,
            'jawaban' => $this->pilihan,
            'paket' => $this->paket,
            'tes_ke' => $this->jadwal->tes_ke,
        ]);
        $nomor_soal = $this->nomor_soal + 1;
        // }
        // $this->resetInput();
        // $nomorterakhir = Soal::where(["paket" => $this->paket, "id_kategori" => $this->id_kategori])->orderBy('nomor_soal', 'DESC')->first();
        // dd($nomorterakhir->nomor_soal);
        // if ($this->id_kategori >= 3 && $this->id_kategori <= 12) {
        //     if ($this->nomor_soal  == $nomorterakhir->nomor_soal) {
        //         return redirect()->route('soal_kc', [$this->paket, $this->id_kategori, $this->tes, $this->nomor_soal]);
        //     } elseif (($this->nomor_soal  != $nomorterakhir->nomor_soal)) {
        //         return redirect()->route('soal_kc', [$this->paket, $this->id_kategori, $this->tes, $this->nomor_soal + 1]);
        //     }
        // } else {
        //     if ($this->nomor_soal  == $nomorterakhir->nomor_soal) {
        //         return redirect()->route('soal_kt', [$this->paket, $this->id_kategori, $this->tes, $this->nomor_soal]);
        //     } elseif (($this->nomor_soal   != $nomorterakhir->nomor_soal)) {
        //         return redirect()->route('soal_kt', [$this->paket, $this->id_kategori, $this->tes, $this->nomor_soal + 1]);
        //     }
        // }
    }
}
