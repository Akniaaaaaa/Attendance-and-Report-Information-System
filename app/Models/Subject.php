<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $table = 'tb_subject';
    protected $fillable = ['subject', 'min_score'];
    protected $primarykey = 'id';
    public $timestamps = false;
    protected $guarded = [];
    public function rapor()
    {
        return $this->hasMany(Rapor::class);
    }
}
