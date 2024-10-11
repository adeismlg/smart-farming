<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ActuatorLogResource\Pages;
use App\Filament\Resources\ActuatorLogResource\RelationManagers;
use App\Models\ActuatorLog;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ActuatorLogResource extends Resource
{
    protected static ?string $model = ActuatorLog::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    // Menambahkan navigation group
    protected static ?string $navigationGroup = 'Sensor & Actuator';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('actuator_id')
                    ->relationship('actuator', 'name')
                    ->required(),
                Forms\Components\Select::make('action')
                    ->options([
                        'on' => 'On',
                        'off' => 'Off'
                    ])
                    ->required(),
                Forms\Components\DateTimePicker::make('action_time')->required(),
                Forms\Components\Textarea::make('description'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('actuator.name')->label('Actuator'),
                Tables\Columns\TextColumn::make('action')->label('Action'),
                Tables\Columns\TextColumn::make('action_time')->label('Action Time')->dateTime(),
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
            'index' => Pages\ListActuatorLogs::route('/'),
            'create' => Pages\CreateActuatorLog::route('/create'),
            'edit' => Pages\EditActuatorLog::route('/{record}/edit'),
        ];
    }
}
