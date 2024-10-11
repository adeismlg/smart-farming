<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ActuatorResource\Pages;
use App\Filament\Resources\ActuatorResource\RelationManagers;
use App\Models\Actuator;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ActuatorResource extends Resource
{
    protected static ?string $model = Actuator::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    // Menambahkan navigation group
    protected static ?string $navigationGroup = 'Sensor & Actuator';

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
                Forms\Components\Textarea::make('description'),
                Forms\Components\Toggle::make('status')->label('Status (On/Off)'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('type'),
                Tables\Columns\TextColumn::make('farm.name')->label('Farm'),
                Tables\Columns\IconColumn::make('status')
                    ->label('Status')
                    ->boolean(), // Menampilkan status dengan ikon check/x
                Tables\Columns\TextColumn::make('description')->limit(50),
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
            'index' => Pages\ListActuators::route('/'),
            'create' => Pages\CreateActuator::route('/create'),
            'edit' => Pages\EditActuator::route('/{record}/edit'),
        ];
    }
}
