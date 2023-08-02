<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kids extends Model
{
    use HasFactory;
    protected $table = 'tb_anak';
    protected $fillable = ['name', 'age', 'ac_year', 'address', 'level', 'wali_murid'];
    protected $primarykey = 'id_soal';
    public $timestamps = false;
    public function absen()
    {
        return $this->hasMany(Absen::class, 'id', 'id_anak');
    }
}
