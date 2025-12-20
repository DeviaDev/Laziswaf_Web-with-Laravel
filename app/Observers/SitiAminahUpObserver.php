<?php

namespace App\Observers;

use App\Models\SitiAminahUp;
use App\Models\Laporan;
use Carbon\Carbon;

class SitiAminahUpObserver
{
    public function created(SitiAminahUp $data)
    {
        $this->updateLaporan($data);
    }

    public function updated(SitiAminahUp $data)
    {
        $this->updateLaporan($data);
    }

    public function deleted(SitiAminahUp $data)
    {
        $this->updateLaporan($data);
    }

    private function updateLaporan($data)
    {
        // Pakai waktu_masuk, bukan created_at
        $tanggal = Carbon::parse($data->waktu_masuk);
        $bulan = $tanggal->month;
        $tahun = $tanggal->year;
        
        $kolomBulan = [
            1 => 'shafar',
            2 => 'rabiul_awal',
            3 => 'rabiul_akhir',
            4 => 'jumadil_awal',
            5 => 'jumadil_akhir',
            6 => 'rajab',
            7 => 'syaban',
            8 => 'ramadhan',
            9 => 'syawwal',
            10 => 'dzulqodah',
            11 => 'dzulqodah',
            12 => 'dzulqodah',
        ];
        
        $namaKolom = $kolomBulan[$bulan];
        
        $laporan = Laporan::firstOrCreate(
            ['Asrama' => 'Siti Aminah']
        );
        
        // Pakai waktu_masuk, bukan created_at
        $totalBulanIni = SitiAminahUp::whereMonth('waktu_masuk', $bulan)
            ->whereYear('waktu_masuk', $tahun)
            ->sum('jumlah');
        
        $laporan->$namaKolom = $totalBulanIni;
        $laporan->save();
    }
}