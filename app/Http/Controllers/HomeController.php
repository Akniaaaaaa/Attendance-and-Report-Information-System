<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Soal;
use App\Models\Kategori;
use App\Models\Jadwal;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all()->count('id_kategori');
        $soal = Soal::all()->count('id_soal');
        $jadwal = Jadwal::all()->count('id_jadwal');
        $pengguna = User::all()->count('id');

        $peserta = User::where('id', auth()->user()->id)->first();
        return view('admin/home', compact('peserta', 'kategori', 'soal', 'jadwal', 'pengguna'));
    }

    public function profile()
    {
        $user = User::where('id', auth()->user()->id)->first();
        return view('peserta/profile', compact('user'));
    }

}
