<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SensorReadingResource\Pages;
use App\Filament\Resources\SensorReadingResource\RelationManagers;
use App\Models\SensorReading;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SensorReadingResource extends Resource
{
    protected static ?string $model = SensorReading::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    // Menambahkan navigation group
    protected static ?string $navigationGroup = 'Sensor & Actuator';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('sensor_id')
                    ->relationship('sensor', 'name')
                    ->required(),
                Forms\Components\TextInput::make('value')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('unit')
                    ->required()
                    ->maxLength(50),
                Forms\Components\DateTimePicker::make('recorded_at')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('sensor.name')->label('Sensor'),
                Tables\Columns\TextColumn::make('value')->label('Value'),
                Tables\Columns\TextColumn::make('unit')->label('Unit'),
                Tables\Columns\TextColumn::make('recorded_at')->label('Recorded At')->dateTime(),
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
            'index' => Pages\ListSensorReadings::route('/'),
            'create' => Pages\CreateSensorReading::route('/create'),
            'edit' => Pages\EditSensorReading::route('/{record}/edit'),
        ];
    }
}
