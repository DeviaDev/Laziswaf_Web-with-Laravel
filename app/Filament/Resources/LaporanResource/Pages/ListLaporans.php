<?php

namespace App\Filament\Resources\LaporanResource\Pages;

use App\Filament\Resources\LaporanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions\Action;
use App\Models\Laporan;

class ListLaporans extends ListRecords
{
    protected static string $resource = LaporanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('export')
                ->label('Export')
                ->icon('heroicon-o-arrow-down-tray')
                ->action(function () {

                    return response()->streamDownload(function () {

                        // HEADER CSV
                        echo implode(',', [
                            'Asrama',
                            'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun',
                            'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des',
                            'Total'
                        ]) . PHP_EOL;

                        Laporan::query()
                            ->select(
                                'asrama',
                                'januari',
                                'februari',
                                'maret',
                                'april',
                                'mei',
                                'juni',
                                'juli',
                                'agustus',
                                'september',
                                'oktober',
                                'november',
                                'desember'
                            )
                            ->each(function ($row) {

                                $bulan = [
                                    (int) $row->januari,
                                    (int) $row->februari,
                                    (int) $row->maret,
                                    (int) $row->april,
                                    (int) $row->mei,
                                    (int) $row->juni,
                                    (int) $row->juli,
                                    (int) $row->agustus,
                                    (int) $row->september,
                                    (int) $row->oktober,
                                    (int) $row->november,
                                    (int) $row->desember,
                                ];

                                $total = array_sum($bulan);

                                echo implode(',', array_merge(
                                    ['"' . str_replace('"', '""', $row->asrama) . '"'],
                                    $bulan,
                                    [$total]
                                )) . PHP_EOL;
                            });

                    }, 'laporan-bulanan.csv');
                }),
        ];
    }
}
