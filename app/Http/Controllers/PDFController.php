<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Barryvdh\DomPDF\Facade as PDF;
use Barryvdh\DomPDF\PDF;
use App\Models\Kids;
use App\Models\Absen;
use App\Models\Rapor;
use App\Models\Rapor2;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PDFController extends Controller
{
    public function view($level, $id_anak)
    {
        $kids = Kids::where('level', $level)
            ->get();
        $detail_kids = Kids::where([
            'level' => $level,
            'id' => $id_anak
        ])->first();
        $absen = Absen::where([
            'level' => $level,
            'id_anak' => $id_anak
        ])->get();
        $tot_absen = Count($absen);
        $Hadir = Count(Absen::where([
            'level' => $level,
            'id_anak' => $id_anak,
            'keterangan' => "Hadir"
        ])->get());
        $Sakit = Count(Absen::where([
            'level' => $level,
            'id_anak' => $id_anak,
            'keterangan' => "Sakit"
        ])->get());
        $Izin = Count(Absen::where([
            'level' => $level,
            'id_anak' => $id_anak,
            'keterangan' => "Izin"
        ])->get());
        // dd($Izin);
        $cek = Rapor::groupBy('id_anak')
            ->select('id_anak', DB::raw('count(*) as total'))
            ->select('catatan', DB::raw('count(*) as total,catatan'))
            ->first();
        // dd($cek->);
        $rapor_sis = Rapor::with(['subject'])
            ->where(['id_anak' => $id_anak])
            ->get();
        $tot = Count($rapor_sis);
        $rapor2 = Rapor2::where(['id_anak' => $id_anak])
            ->get();
        $tot2 = Count($rapor2);
        // dd($rapor2->date);
        $user = User::where('id', Auth::user()->id)->first();
        // dd($detail_kids);
        $subject = Subject::all();
        $tutor = User::where('id', Auth::user()->id)->first();
        return view('tutor/view', compact('rapor2', 'tot2', 'tot', 'kids', 'level', 'tutor', 'subject', 'detail_kids', 'id_anak', 'user', 'absen', 'cek', 'rapor_sis', 'Hadir', 'Izin', 'Sakit', 'tot_absen'));
    }
    public function generatePDF($level, $id_anak)
    {
        $kids = Kids::where('level', $level)
            ->get();
        $detail_kids = Kids::where([
            'level' => $level,
            'id' => $id_anak
        ])->first();
        $absen = Absen::where([
            'level' => $level,
            'id_anak' => $id_anak
        ])->get();
        $tot_absen = Count($absen);
        $Hadir = Count(Absen::where([
            'level' => $level,
            'id_anak' => $id_anak,
            'keterangan' => "Hadir"
        ])->get());
        $Sakit = Count(Absen::where([
            'level' => $level,
            'id_anak' => $id_anak,
            'keterangan' => "Sakit"
        ])->get());
        $Izin = Count(Absen::where([
            'level' => $level,
            'id_anak' => $id_anak,
            'keterangan' => "Izin"
        ])->get());
        // dd($Izin);
        $cek = Rapor::groupBy('id_anak')
            ->select('id_anak', DB::raw('count(*) as total'))
            ->select('catatan', DB::raw('count(*) as total,catatan'))
            ->first();
        // dd($cek->);
        $rapor_sis = Rapor::with(['subject'])
            ->where(['id_anak' => $id_anak])
            ->get();
        $tot = Count($rapor_sis);
        $rapor2 = Rapor2::where(['id_anak' => $id_anak])
            ->get();
        $tot2 = Count($rapor2);
        // dd($rapor2->date);
        $user = User::where('id', Auth::user()->id)->first();
        // dd($detail_kids);
        $subject = Subject::all();
        $tutor = User::where('id', Auth::user()->id)->first();
        // $posts = Post::all(); // Ganti dengan query yang sesuai untuk mengambil data yang ingin ditampilkan di PDF
        $pdf = PDF::loadView('tutor/view', compact('rapor2', 'tot2', 'tot', 'kids', 'level', 'tutor', 'subject', 'detail_kids', 'id_anak', 'user', 'absen', 'cek', 'rapor_sis', 'Hadir', 'Izin', 'Sakit', 'tot_absen')); // Ganti 'pdf_template' dengan nama view PDF Anda

        $pdf->save(storage_path('app/public/posts.pdf')); // Simpan PDF di direktori storage/app/public

        return $pdf->download('posts.pdf'); // Download PDF ke browser
    }
}
