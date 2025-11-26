<?php

namespace App\Filament\Resources\SitiAminahUpResource\Pages;

use App\Filament\Resources\SitiAminahUpResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSitiAminahUp extends EditRecord
{
    protected static string $resource = SitiAminahUpResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
