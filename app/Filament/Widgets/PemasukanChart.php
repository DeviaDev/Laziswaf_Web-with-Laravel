<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class PemasukanChart extends ChartWidget
{
    // 1. Agar grafik memenuhi lebar layar (TIDAK pakai static)
    protected int | string | array $columnSpan = 'full';

    protected static ?string $heading = 'Pemasukan Per Bulan';

    // 2. Mengatur tinggi grafik agar lebih besar
    protected static ?string $maxHeight = '400px';

    protected function getData(): array
    {
        $data = DB::table('laporans')
            ->selectRaw('
                SUM(januari) as jan, SUM(februari) as feb, SUM(maret) as mar,
                SUM(april) as apr, SUM(mei) as mei, SUM(juni) as jun,
                SUM(juli) as jul, SUM(agustus) as agu, SUM(september) as sep,
                SUM(oktober) as okt, SUM(november) as nov, SUM(desember) as des
            ')
            ->first();

        return [
            'datasets' => [
                [
                    'label' => 'Total Pemasukan (Rp)',
                    'data' => [
                        $data->jan ?? 0, $data->feb ?? 0, $data->mar ?? 0,
                        $data->apr ?? 0, $data->mei ?? 0, $data->jun ?? 0,
                        $data->jul ?? 0, $data->agu ?? 0, $data->sep ?? 0,
                        $data->okt ?? 0, $data->nov ?? 0, $data->des ?? 0,
                    ],
                    'tension' => 0.3,
                    'borderColor' => '#fbbf24',
                    'backgroundColor' => 'rgba(251, 191, 36, 0.1)',
                    'fill' => true,
                ],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }

    // 3. Menampilkan kembali angka di Sumbu Y
    protected function getOptions(): array
    {
        return [
            'maintainAspectRatio' => false,
            'scales' => [
                'y' => [
                    'display' => true, // Memastikan sumbu Y muncul
                    'beginAtZero' => true,
                    'ticks' => [
                        'display' => true, // Memastikan angka muncul
                        'color' => '#9ca3af', // Warna abu-abu agar terlihat di tema gelap
                    ],
                ],
            ],
        ];
    }
}