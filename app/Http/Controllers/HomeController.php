<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Soal;
use App\Models\Kategori;
use App\Models\Jadwal;
use App\Models\Kids;
use App\Models\Subject;
use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\Count;

class HomeController extends Controller
{
    public function index()
    {

        $kids = Kids::all()->count('id');
        $subject = Count(Subject::all());
        $tutor = Count(User::where('id', 1)->get());
        $level = Count(Kids::groupBy('level')
            ->get());
        // dd($level);
        $peserta = User::where('id', auth()->user()->id)->first();
        return view('admin/home', compact('peserta', 'kids', 'subject', 'tutor', 'level'));
    }
    public function index2()
    {

        $kids = Kids::all()->count('id');
        $subject = Count(Subject::all());
        $tutor = Count(User::where('id', 1)->get());
        $level = Count(Kids::groupBy('level')
            ->get());
        // dd($level);
        $peserta = User::where('id', auth()->user()->id)->first();
        return view('tutor/home', compact('peserta', 'kids', 'subject', 'tutor', 'level'));
    }

    public function profile()
    {
        $user = User::where('id', auth()->user()->id)->first();
        return view('peserta/profile', compact('user'));
    }
}
