<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rapor2 extends Model
{
    use HasFactory;
    protected $table = 'tb_result2';
    protected $fillable = ['id_anak', 'date', 'topic', 'activities', 'goal', 'evaluation', 'id_user'];
    protected $primarykey = 'id';
    public $timestamps = false;
    protected $guarded = [];
    use HasFactory;
    public function kids()
    {
        return $this->belongsTo(Kids::class, 'id_anak');
    }
}
