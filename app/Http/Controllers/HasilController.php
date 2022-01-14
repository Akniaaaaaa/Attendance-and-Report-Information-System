<?php

namespace App\Http\Controllers;

use App\Models\Hasil;
use App\Models\Jadwal;
use App\Models\Jawaban;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Soal;
use Illuminate\Support\Facades\Hash;

class HasilController extends Controller
{
    public function index()
    {
        $hasil = Hasil::with(['peserta'])->groupBy('id_user')
            ->selectRaw('count(*) as total, id_user')
            ->get();

        return view('admin/hasil', compact('hasil'));
    }

    public function info_hasil($id_user)
    {
        $hasil = Hasil::where('id_user', $id_user)->get();

        return view('admin/info_hasil', compact('hasil'));
    }
    public function hasil_peserta($id_peserta)
    {
        $peserta = User::where('id', $id_peserta)->first();
        $id_peserta = Auth::user()->id;
        $collection = Soal::groupBy('paket')
            ->selectRaw('count(*) as total, paket')
            ->get();

        return view('peserta/hasil', compact('peserta', 'id_peserta', 'collection'));
    }
    public function detail_hasil($id_peserta, $paket, $tes, $id_kategori)
    {
        $peserta = User::where('id', $id_peserta)->first();
        $id_peserta = Auth::user()->id;
        // $jadwal = Jadwal::where('id_jadwal', $tes)->first();
        $soal = Soal::where(['paket' => $paket, 'id_kategori' => $id_kategori, 'nomor_soal' => 1])->get();

        $sumsoal = count($soal);
        $jawaban_peserta1 = Jawaban::where(['id_kategori' => $id_kategori, 'id_user' => $id_peserta, 'tes_ke' => $tes, 'paket' => $paket])->get();
        $jumlahjawaban1 = count($jawaban_peserta1);

        $score = 0;
        $benar = 0;
        $salah = 0;
        $kosong = 0;
        $p1 = 0;
        if ($jumlahjawaban1 != null) {
            foreach ($jawaban_peserta1 as $dj1) {
                $dj[] = $dj1->id_soal;
                $djb[] = $dj1->jawaban;
            }
            for ($i = 0; $i < count($dj); $i++) {
                $soal = Soal::where(['paket' => $paket, 'id_kategori' => $id_kategori, 'nomor_soal' => $dj[$i]])->get();
                foreach ($soal as $ds1) {
                    $ds[] = $ds1->kunci_jawaban;
                    $dsb[] = $ds1->bobot;
                }
            }
            for ($i = 0; $i < count($djb); $i++) {
                if ($djb[$i] == $ds[$i]) {
                    $p1++;
                    // $x = $p1 + $dsb[$i];
                    // $p1 = $x;
                }
            }
        }
        // dd($p1);
        $salah = $jumlahjawaban1 - $p1;
        $cek_hasil = Hasil::where(['id_user' => $id_peserta, 'id_kategori' => $id_kategori, 'paket' => $paket])->first();
        if (!empty($cek_hasil)) {
            Hasil::where([
                'id_hasil' => $cek_hasil->id_hasil,
            ])->update([
                'tes_ke' => $tes,
                'hasil' => $p1,
                'salah' => $salah,
                'sum_jawaban' => $jumlahjawaban1,
            ]);
        } else {
            Hasil::create([
                'id_user' => $id_peserta,
                'id_kategori' => $id_kategori,
                'tes_ke' => $tes,
                'paket' => $paket,
                'hasil' => $p1,
                'salah' => $salah,
                'sum_jawaban' => $jumlahjawaban1,
            ]);
        }
        $jadwal = Jadwal::where(['tes_ke' => $tes, 'id_peserta' => $id_peserta, 'id_kategori' => $id_kategori, 'paket' => $paket])->first();
        // dd($tes);
        Jadwal::where('id_jadwal', $jadwal->id_jadwal)->update([
            'status_ujian' => "Sudah Ujian",
        ]);
        $kec_end = $id_kategori > 12;
        $kt = Hasil::where(['paket' => $paket, 'id_kategori' => $id_peserta])->get();
        if ($id_kategori >= 3 && $id_kategori <= 12) {
            if ($id_kategori > 12) {
                return redirect()->route('jadwal_peserta', [$paket, $id_peserta]);
            } else {
                return redirect()->route('soal_kc', [$paket, $id_kategori + 1, $tes + 1, 1]);
            }
        } else {
            return redirect()->route('jadwal_peserta', [$paket, $id_peserta]);
        }
    }
    public function lihat_hasil($id_peserta, $paket)
    {
        $kt = Hasil::where('id_user', $id_peserta)
            ->where('paket', $paket)
            ->get();

        $k1 = Hasil::where(['id_user' => $id_peserta, 'paket' => $paket, 'id_kategori' => '3'])->first();
        if ($k1 != null) {
            $name1 = $k1->sum_jawaban;
        } else {
            $name1 = "0";
        }

        $k2 = Hasil::where(['id_user' => $id_peserta, 'paket' => $paket, 'id_kategori' => '4'])->first();
        if ($k2 != null) {
            $name2 = $k2->sum_jawaban;
        } else {
            $name2 = "0";
        }

        $k3 = Hasil::where(['id_user' => $id_peserta, 'paket' => $paket, 'id_kategori' => '5'])->first();
        if ($k3 != null) {
            $name3 = $k3->sum_jawaban;
        } else {
            $name3 = "0";
        }

        $k4 = Hasil::where(['id_user' => $id_peserta, 'paket' => $paket, 'id_kategori' => '6'])->first();
        if ($k4 != null) {
            $name4 = $k4->sum_jawaban;
        } else {
            $name4 = "0";
        }

        $k5 = Hasil::where(['id_user' => $id_peserta, 'paket' => $paket, 'id_kategori' => '7'])->first();
        if ($k5 != null) {
            $name5 = $k5->sum_jawaban;
        } else {
            $name5 = "0";
        }

        $k6 = Hasil::where(['id_user' => $id_peserta, 'paket' => $paket, 'id_kategori' => '8'])->first();
        if ($k6 != null) {
            $name6 = $k6->sum_jawaban;
        } else {
            $name6 = "0";
        }

        $k7 = Hasil::where(['id_user' => $id_peserta, 'paket' => $paket, 'id_kategori' => '9'])->first();
        if ($k7 != null) {
            $name7 = $k7->sum_jawaban;
        } else {
            $name7 = "0";
        }

        $k8 = Hasil::where(['id_user' => $id_peserta, 'paket' => $paket, 'id_kategori' => '10'])->first();
        if ($k8 != null) {
            $name8 = $k8->sum_jawaban;
        } else {
            $name8 = "0";
        }

        $k9 = Hasil::where(['id_user' => $id_peserta, 'paket' => $paket, 'id_kategori' => '11'])->first();
        if ($k9 != null) {
            $name9 = $k9->sum_jawaban;
        } else {
            $name9 = "0";
        }

        $k10 = Hasil::where(['id_user' => $id_peserta, 'paket' => $paket, 'id_kategori' => '12'])->first();
        if ($k10 != null) {
            $name10 = $k10->sum_jawaban;
        } else {
            $name10 = "0";
        }

        return view('peserta/lihat_hasil', compact(
            'kt',
            'paket',
            'id_peserta',
            'k1',
            'k2',
            'k3',
            'k4',
            'k5',
            'k6',
            'k7',
            'k8',
            'k9',
            'k10',
            'name1',
            'name2',
            'name3',
            'name4',
            'name5',
            'name6',
            'name7',
            'name8',
            'name9',
            'name10'
        ));
    }
    public function info_hasil_peserta($id_peserta, $paket, $id_kategori)
    {
        $kt = Hasil::where('id_user', $id_peserta)
            ->where('paket', $paket)
            ->get();
        $sum_peserta = Jawaban::where(['id_user' => $id_peserta, 'paket' => $paket, 'id_kategori' => $id_kategori])->first();

        return view('peserta/lihat_hasil', compact('kt', 'paket', 'id_peserta'));
    }
}
