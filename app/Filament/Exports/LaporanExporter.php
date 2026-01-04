<?php

namespace App\Filament\Exports;

use App\Models\Laporan;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class LaporanExporter extends Exporter
{
    protected static ?string $model = Laporan::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('id'),
            ExportColumn::make('Asrama'),
            ExportColumn::make('januari'),
            ExportColumn::make('februari'),
            ExportColumn::make('maret'),
            ExportColumn::make('april'),
            ExportColumn::make('mei'),
            ExportColumn::make('juni'),
            ExportColumn::make('juli'),
            ExportColumn::make('agustus'),
            ExportColumn::make('september'),
            ExportColumn::make('oktober'),
            ExportColumn::make('november'),
            ExportColumn::make('desember'),
            ExportColumn::make('created_at'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your laporan export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
