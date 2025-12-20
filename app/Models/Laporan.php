<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $fillable = [
        'Asrama',
        'shafar',
        'rabiul_awal',
        'rabiul_akhir',
        'jumadil_awal',
        'jumadil_akhir',
        'rajab',
        'syaban',
        'ramadhan',
        'syawwal',
        'dzulqodah',
    ];

    public function sitiAminahUps()
    {
        return $this->hasMany(SitiAminahUp::class);
    }
}