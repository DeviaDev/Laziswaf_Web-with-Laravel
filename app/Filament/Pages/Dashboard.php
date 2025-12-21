<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;
use App\Filament\Widgets\PemasukanChart;

class Dashboard extends BaseDashboard
{
    protected static ?string $navigationLabel = 'Dashboard';

    // Menghilangkan judul halaman agar benar-benar bersih
    public function getHeading(): string
    {
        return '';
    }

    // Menentukan jumlah kolom widget (1 agar grafik lebar)
    public function getColumns(): int | string | array
    {
        return 1;
    }

    public function getWidgets(): array
    {
        return [
            PemasukanChart::class,
        ];
    }
}