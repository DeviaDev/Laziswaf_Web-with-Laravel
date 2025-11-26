<?php

namespace App\Filament\Resources\SitiAminahUpResource\Pages;

use App\Filament\Resources\SitiAminahUpResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSitiAminahUps extends ListRecords
{
    protected static string $resource = SitiAminahUpResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
