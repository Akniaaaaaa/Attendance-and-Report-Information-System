<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    use HasFactory;
    protected $table = 'tb_jawaban';
    protected $fillable = ['id_soal', 'id_kategori', 'jawaban', 'id_user', 'paket', 'tes_ke'];
    protected $primarykey = 'id_kategori';
    public $timestamps = false;
    public function soal()
    {
        return $this->hasMany(Jawaban::class, 'id_soal', 'id_soal');
    }
}
