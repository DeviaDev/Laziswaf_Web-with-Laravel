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
                    TextColumn::make('januari')->label('Jan'),
                    TextColumn::make('februari')->label('Feb'),
                    TextColumn::make('maret')->label('Mar'),
                    TextColumn::make('april')->label('Apr'),
                    TextColumn::make('mei')->label('Mei'),
                    TextColumn::make('juni')->label('Jun'),
                    TextColumn::make('juli')->label('Jul'),
                    TextColumn::make('agustus')->label('Agu'),
                    TextColumn::make('september')->label('Sep'),
                    TextColumn::make('oktober')->label('Okt'),
                    TextColumn::make('november')->label('Nov'),
                    TextColumn::make('desember')->label('Des'),
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