<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hasil extends Model
{
    use HasFactory;
    protected $table = 'tb_hasil';
    protected $fillable = ['id_user', 'id_kategori', 'tes_ke', 'hasil', 'paket', 'salah', 'sum_jawaban'];
    protected $primarykey = 'id_hasil';
    public $timestamps = false;

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori');
    }

    public function peserta()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
