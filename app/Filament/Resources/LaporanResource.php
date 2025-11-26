<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Laporan;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ColumnGroup;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\LaporanResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\LaporanResource\RelationManagers;

class LaporanResource extends Resource
{
    protected static ?string $model = Laporan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                ->label('No')
                ->sortable(),

            TextColumn::make('Asrama')
                ->label('Asrama')
                ->searchable(),
            
            ColumnGroup::make('BULAN', [
    TextColumn::make('shafar')->label('Shafar'),
    TextColumn::make('rabiul_awal')->label("Rabi'ul Awwal"),
    TextColumn::make('rabiul_akhir')->label("Rabi'ul Akhir"),
    TextColumn::make('jumadil_awal')->label('Jumadil Awwal'),
    TextColumn::make('jumadil_akhir')->label('Jumadil Akhir'),
    TextColumn::make('rajab')->label('Rajab'),
    TextColumn::make('syaban')->label("Sya'ban"),
    TextColumn::make('ramadhan')->label('Ramadhan'),
    TextColumn::make('syawwal')->label('Syawwal'),
    TextColumn::make('dzulqodah')->label("Dzulqo'dah"),
])
            
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLaporans::route('/'),
            'create' => Pages\CreateLaporan::route('/create'),
            'edit' => Pages\EditLaporan::route('/{record}/edit'),
        ];
    }
}
