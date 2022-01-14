<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;
    protected $table = 'tb_jadwal';
    protected $fillable = ['tanggal_tes', 'jam_mulai', 'jam_selesai', 'status_ujian', 'paket', 'id_kategori', 'tes_ke', 'id_peserta'];
    protected $primarykey = 'id_jadwal';
    public $timestamps = false;
    public function soal()
    {
        return $this->hasMany(Soal::class, 'id_soal', 'id_soal');
    }
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori');
    }
    public function peserta()
    {
        return $this->belongsTo(User::class, 'id_peserta');
    }
}
