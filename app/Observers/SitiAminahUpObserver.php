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
        $tanggal = Carbon::parse($data->waktu_masuk);
        $bulan = $tanggal->month; // 1=Januari, 2=Februari, dst
        $tahun = $tanggal->year;
        
        // Mapping bulan ke nama kolom
        $kolomBulan = [
            1 => 'januari',
            2 => 'februari',
            3 => 'maret',
            4 => 'april',
            5 => 'mei',
            6 => 'juni',
            7 => 'juli',
            8 => 'agustus',
            9 => 'september',
            10 => 'oktober',
            11 => 'november',
            12 => 'desember',
        ];
        
        $namaKolom = $kolomBulan[$bulan];
        
        // Cari atau buat laporan
        $laporan = Laporan::firstOrCreate(['Asrama' => 'Siti Aminah']);
        
        // Hitung total bulan ini
        $totalBulanIni = SitiAminahUp::whereMonth('waktu_masuk', $bulan)
            ->whereYear('waktu_masuk', $tahun)
            ->sum('jumlah');
        
        // Update kolom bulan
        $laporan->$namaKolom = $totalBulanIni;
        $laporan->save();
    }
}