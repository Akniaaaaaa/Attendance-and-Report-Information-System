<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rapor extends Model
{
    protected $table = 'tb_result';
    protected $fillable = ['id_anak', 'id_user', 'id_subject', 'score', 'catatan'];
    protected $primarykey = 'id';
    public $timestamps = false;
    protected $guarded = [];
    use HasFactory;
    public function subject()
    {
        return $this->belongsTo(Subject::class, 'id_subject');
    }
    public function kids()
    {
        return $this->belongsTo(Kids::class, 'id_anak', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'id');
    }
}
