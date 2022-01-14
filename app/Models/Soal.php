<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    use HasFactory;
    protected $table = 'tb_soal';
    protected $fillable = ['soal', 'soal_file', 'pilgan_a', 'filepilgan_a', 'pilgan_b', 'filepilgan_b', 'pilgan_c', 'filepilgan_c', 'pilgan_d', 'filepilgan_d', 'pilgan_e', 'filepilgan_e', 'id_kategori', 'kunci_jawaban', 'bobot', 'paket', 'nomor_soal'];
    protected $primarykey = 'id_soal';
    public $timestamps = false;
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori');
    }
    public function jawaban()
    {
        return $this->belongsTo(Jawaban::class, 'id_soal', 'id_soal');
    }
    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class, 'id_soal', 'id_soal');
    }
    public function kt_jadwal()
    {
        return $this->hasMany(Kategori::class, 'id_kategori', 'id_kategori');
    }
    public function jawabanDiisi($paket, $id_kategori, $nomor_soal, $tes)
    {
        // dd($tes);

        $jawaban = Jawaban::where('id_soal', $nomor_soal)->where('id_user', auth()->user()->id)->where('id_kategori', $id_kategori)
            ->where('paket', $paket)->where('tes_ke', $tes)->first();

        // $jawaban  = $this->jawaban;
        // dd($paket, $id_kategori, $nomor_soal);
        return $jawaban;
        // if ($jawaban) {
        //     $cekJawaban = $jawaban->where([
        //         'id_soal' => $nomor_soal,
        //         'id_user' => auth()->user()->id,
        //         'id_kategori' => $id_kategori,
        //         'paket' => $paket
        //     ])->first();
        //     if ($cekJawaban) {
        //         return true;
        //     }
        //     return false;
        // } else {
        //     return false;
        // }
    }
}
