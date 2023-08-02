<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use App\Models\Kids;
use App\Models\Rapor;
use App\Models\Rapor2;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use LDAP\Result;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\FuncCall;
use PHPUnit\Framework\Constraint\Count;

class RaporController extends Controller
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
        return view('tutor/scoring_level', compact('level', 'tutor'));
    }
    public function index_name($level)
    {
        $kids = Kids::where('level', $level)
            ->get();
        return view('tutor/scoring', compact('kids', 'level'));
    }
    public function detail_scoring($level, $id_anak)
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
        return view('tutor/detail_scoring', compact('rapor2', 'tot2', 'tot', 'kids', 'level', 'tutor', 'subject', 'detail_kids', 'id_anak', 'user', 'absen', 'cek', 'rapor_sis', 'Hadir', 'Izin', 'Sakit', 'tot_absen'));
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
    public function store(Request $request, $level, $id_anak)
    {
        $subject = Subject::all();
        // $count = Count($request->id_anak);
        $id_user = Auth::user()->id;
        $cek_kids = Rapor::where(['id_anak' => $id_anak])
            ->get();
        // dd($cek_kids);
        $count_result = Rapor::groupBy('id_anak')
            ->selectRaw('count(*) as total, id_anak')
            ->selectRaw('catatan')
            ->get();
        $rapor_sis = Rapor::with(['subject'])
            ->where(['id_anak' => $id_anak])
            ->get();
        // dd($rapor_sis[0]->id_subject);
        $tot = Count($rapor_sis);
        // dd($tot);
        if ($tot == 0) {
            $count = Count($request->score);
            for ($i = 0; $i < $count; $i++) {
                Rapor::create([
                    'id_anak' => $id_anak,
                    'id_user' => $id_user,
                    'id_subject' => $request->id_subject[$i],
                    'score' => $request->score[$i],
                    'catatan' => $request->catatan,
                ]);
            }
        } else {
            for ($i = 0; $i < $tot; $i++) {
                foreach ($request->id_subjectu as $data) {
                    // dd($data);
                    Rapor::where(['id_anak' => $id_anak, 'id_user' => $id_user, 'id_subject' => $request->id_subjectu[$i]])
                        ->update([
                            'id_anak' => $id_anak,
                            'id_user' => $id_user,
                            'id_subject' => $request->id_subjectu[$i],
                            'score' => $request->scoreu[$i],
                            'catatan' => $request->catatan,
                        ]);
                }
            }
        }
        return redirect()->route('scoring');
    }
    public function store2(Request $request, $level, $id_anak)
    {
        $subject = Subject::all();
        // $count = Count($request->id_anak);
        $id_user = Auth::user()->id;
        $cek_kids = Rapor::where(['id_anak' => $id_anak])
            ->get();
        // dd($id_user);
        $count_result = Rapor::groupBy('id_anak')
            ->selectRaw('count(*) as total, id_anak')
            ->selectRaw('catatan')
            ->get();
        $rapor_sis = Rapor2::where(['id_anak' => $id_anak])
            ->get();
        // dd($rapor_sis[0]->id_subject);
        $tot = Count($rapor_sis);
        // dd($tot);
        if ($tot == 0) {
            $count = Count($request->topic);
            for ($i = 0; $i < $count; $i++) {
                Rapor2::create([
                    'id_anak' => $id_anak,
                    'id_user' => $id_user,
                    'date' => $request->date,
                    'topic' => $request->topic[$i],
                    'activities' => $request->activities[$i],
                    'goal' => $request->goal[$i],
                    'evaluation' => $request->evaluation[$i],
                ]);
            }
        } else {
            for ($i = 0; $i < $tot; $i++) {
                foreach ($request->topicU as $data) {
                    // dd($data);
                    Rapor2::where(['id_anak' => $id_anak, 'id_user' => $id_user,  'date' => $rapor_sis[$i]->date])
                        ->update([
                            'id_anak' => $id_anak,
                            'id_user' => $id_user,
                            'date' => $rapor_sis[$i]->date,
                            'topic' => $request->topicU[$i],
                            'activities' => $request->activitiesU[$i],
                            'goal' => $request->goalU[$i],
                            'evaluation' => $request->evaluationU[$i],
                        ]);
                }
            }
        }
        return redirect()->route('scoring');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rapor  $rapor
     * @return \Illuminate\Http\Response
     */
    public function show(Rapor $rapor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rapor  $rapor
     * @return \Illuminate\Http\Response
     */
    public function edit(Rapor $rapor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rapor  $rapor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rapor $rapor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rapor  $rapor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rapor $rapor)
    {
        //
    }
}
