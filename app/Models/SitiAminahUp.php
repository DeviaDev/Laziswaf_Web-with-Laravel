<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SitiAminahUp extends Model
{
    use HasFactory;

    protected $fillable = [
        'waktu_masuk',
        'jumlah',
        'laporan_id',
    ];

    protected $casts = [
        'waktu_masuk' => 'datetime',
    ];

    public function laporan()
    {
        return $this->belongsTo(Laporan::class);
    }
}