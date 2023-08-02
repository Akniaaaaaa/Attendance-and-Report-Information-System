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
    public $nomor_soal = 1;
    public $soal;
    public $jadwal;
    public $kategori;
    public $id_jadwal;
    public $simpanjawaban;
    public $pilihan;
    public $nomor;
    public $jawaban;
    public $listeners = ["submitDefaultAns" => "submitDefaultAns"];
    // public $listeners = ["simpanjawaban" => "simpanjawaban"];    

    public function mounted($paket, $id_kategori, $tes, $soal, $jadwal, $kategori, $id_jadwal, $jawaban)
    {
        // $this->nomor_soal = $nomor_soal;
        $this->paket = $paket;
        $this->id_kategori = $id_kategori;
        $this->tes = $tes;
        $this->soal = $soal;
        $this->jadwal = $jadwal;
        $this->kategori = $kategori;
        $this->id_jadwal = $id_jadwal;
        $this->jawaban = $jawaban;
    }
    public function submitingForm()
    {
        $this->dispatchBrowserEvent('clickingSubmitButton');
    }

    public function simpanjawaban()
    {
        $jadwal = Jadwal::where([
            "tes_ke" => $this->tes,
            "id_peserta" => Auth::user()->id,
            "id_kategori" => $this->id_kategori,
            "paket" => $this->paket
        ])->first();

        $soal = Soal::where(["paket" => $this->paket, "id_kategori" => $this->id_kategori, "nomor_soal" => $this->nomor_soal])->first();
        $jawaban = Jawaban::where(['id_user' => auth()->user()->id, 'tes_ke' => $jadwal->tes_ke,  'paket' => $jadwal->paket, "id_soal" => $this->nomor_soal])->first();
        if (!empty($jawaban)) {
            Jawaban::where([
                'id_jawaban' => $jawaban->id_jawaban, 'id_user' => auth()->user()->id, 'tes_ke' => $jadwal->tes_ke,  'paket' => $jadwal->paket, "id_soal" => $this->nomor_soal,
            ])->update([
                'jawaban' => $this->pilihan,
            ]);
        } else {
            Jawaban::create([
                'id_soal' => $this->nomor_soal,
                'id_user' => auth()->user()->id,
                'id_kategori' => $this->id_kategori,
                'jawaban' => $this->pilihan,
                'paket' => $this->paket,
                'tes_ke' => $jadwal->tes_ke,
            ]);
        }
        $this->incrementExerciseNumber();
    }
    public function incrementExerciseNumber()
    {
        $this->nomor_soal = $this->nomor_soal + 1;

        $this->soal = Soal::where('paket', '=', $this->paket)
            ->where('id_kategori', '=', $this->id_kategori)
            ->where('nomor_soal', '=', $this->nomor_soal)
            ->first();
    }
    public function submitDefaultAns()
    {
        return route('detail_hasil', [Auth::user()->id, $this->paket, $this->tes, $this->id_kategori]);
    }
    public function render()
    {
        return view('livewire.kecermatan');
    }
}
