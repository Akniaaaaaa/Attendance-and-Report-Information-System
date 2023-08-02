<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Absen extends Model
{
    use HasFactory;
    protected $table = 'tb_absen';
    protected $fillable = ['id_anak', 'tgl_absen', 'nm_subject', 'nm_tutor', 'pelajaran', 'keterangan', 'level', 'jam_mulai', 'jam_selesai'];
    protected $primarykey = 'id';
    public $timestamps = false;
    public function data_kids()
    {
        return $this->belongsTo(Kids::class, 'id', 'id_anak');
    }
    public function getDateAttribute()
    {
        return Carbon::parse($this->attributes['tgl_absen'])
            ->translatedFormat('l,d F Y');
    }
}
