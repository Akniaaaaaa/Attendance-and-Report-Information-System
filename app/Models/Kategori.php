<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $table = 'tb_kategori';
    protected $fillable = ['nama_kategori', 'petunjuk', 'durasi'];
    protected $primarykey = 'id_kategori';
    public $timestamps = false;
    public function soal()
    {
        return $this->hasMany(Kategori::class, 'id_kategori', 'id_kategori');
    }
    public function jadwal()
    {
        return $this->hasMany(Kategori::class, 'id_kategori', 'id_kategori');
    }
}
