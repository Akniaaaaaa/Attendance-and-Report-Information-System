<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use App\Models\User;
use App\Models\Hasil;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $pengguna = User::when($request->cari, function ($query) use ($request) {
            $query->where('name', 'LIKE', "%{$request->cari}%");
        })->paginate(25);

        $pengguna->appends($request->only('cari'));
        return view('admin/user', compact('pengguna'));
    }
    public function index_tutor()
    {
        $pengguna = User::where('id', 2);
        $tutor = Absen::groupBy(['tgl_absen', 'level'])
            ->selectRaw('count(*) as total, nm_tutor, tgl_absen, level')
            ->orderBy('tgl_absen', 'ASC')
            ->get();
        return view('admin/tutor', compact('pengguna', 'tutor'));
    }
    public function filter(Request $request)
    {
        $startDate = $request->input('start_date'); // Tanggal mulai
        $endDate = $request->input('end_date');     // Tanggal akhir

        $tutor = Absen::whereBetween('tgl_absen', [$startDate, $endDate])
            ->groupBy(['tgl_absen', 'level'])
            ->get();
        $pengguna = User::where('id', 2);
        // $tutor = Absen::groupBy(['tgl_absen', 'level'])
        //     ->selectRaw('count(*) as total, nm_tutor, tgl_absen, level')
        //     ->orderBy('tgl_absen', 'ASC')
        //     ->get();
        return view('admin/tutor', compact('pengguna', 'tutor'));
    }
    public function destroy($id)
    {
        User::where('id_user', $id)->delete();
        return redirect()->route('pengguna');
    }
}
