<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use App\Models\Kids;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Framework\Constraint\Count;

class AbsenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $level = Kids::groupBy('level')
            ->selectRaw('count(*) as total, level')
            ->orderBy('level', 'ASC')
            ->get();
        $tutor = User::where('id', Auth::user()->id)->first();
        // dd($tutor);
        return view('tutor/level', compact('level', 'tutor'));
    }
    public function index_absen($level)
    {
        $kids = Kids::where('level', $level)
            ->get();
        $subject = Subject::all();
        // dd($kids);
        $tutor = User::where('id', Auth::user()->id)->first();
        return view('tutor/absen', compact('level', 'tutor', 'kids', 'subject'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $level)
    {
        $kids = Kids::where('level', $level)->get();
        $nm_tutor = Auth::user()->id;
        $name_tutor = User::where('id', $nm_tutor)->first()->name;
        // dd($name_tutor);
        $count = Count($request->id_anak);
        // dd($kids);
        // for ($i = 0; $i < $count; $i++) {
        foreach ($kids as $data) {
            $keterangan = $request->input('keterangan.' . $data->id); // Check this line
            // foreach ($request->id_anak as $data) {
            Absen::create([
                'id_anak' => $data->id,
                'tgl_absen' => $request->tgl_absen,
                'jam_mulai' => $request->jam_mulai,
                'jam_selesai' => $request->jam_selesai,
                'nm_tutor' => $name_tutor,
                'level' => $level,
                'nm_subject' => $request->nm_subject,
                'keterangan' => $keterangan,
            ]);
            // }
        }

        return redirect('level');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function show(Absen $absen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function edit(Absen $absen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Absen $absen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Absen $absen)
    {
        //
    }
}
