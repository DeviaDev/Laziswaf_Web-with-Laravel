<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SitiAminahUpResource\Pages;
use App\Filament\Resources\SitiAminahUpResource\RelationManagers;
use App\Models\SitiAminahUp;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SitiAminahUpResource extends Resource
{
    protected static ?string $model = SitiAminahUp::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DateTimePicker::make('waktu_masuk')
                    ->label('Waktu Masuk')
                    ->required()
                    ->default(now()),

                Forms\Components\TextInput::make('jumlah')
                    ->label('Jumlah')
                    ->numeric()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('waktu_masuk')
                    ->label('Waktu Masuk')
                    ->dateTime('d-m-Y H:i:s')
                    ->sortable(),

                Tables\Columns\TextColumn::make('jumlah')
                    ->label('Jumlah')
                    ->numeric(),
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
            'index' => Pages\ListSitiAminahUps::route('/'),
            'create' => Pages\CreateSitiAminahUp::route('/create'),
            'edit' => Pages\EditSitiAminahUp::route('/{record}/edit'),
        ];
    }
}