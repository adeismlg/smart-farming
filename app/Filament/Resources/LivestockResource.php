<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LivestockResource\Pages;
use App\Filament\Resources\LivestockResource\RelationManagers;
use App\Models\Livestock;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LivestockResource extends Resource
{
    protected static ?string $model = Livestock::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    // Menambahkan navigation group
    protected static ?string $navigationGroup = 'Livestock';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('farm_id')
                    ->relationship('farm', 'name')
                    ->required(),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('type')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('initial_count')
                    ->required()
                    ->numeric(),
                Forms\Components\Textarea::make('attributes'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('type'),
                Tables\Columns\TextColumn::make('farm.name')->label('Farm'),
                Tables\Columns\TextColumn::make('initial_count'),
                Tables\Columns\TextColumn::make('current_count')
                    ->getStateUsing(function (Livestock $record) {
                        return $record->current_count;
                    }),
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
            'index' => Pages\ListLivestocks::route('/'),
            'create' => Pages\CreateLivestock::route('/create'),
            'edit' => Pages\EditLivestock::route('/{record}/edit'),
        ];
    }
}
