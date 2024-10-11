<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LivestockTransactionResource\Pages;
use App\Filament\Resources\LivestockTransactionResource\RelationManagers;
use App\Models\LivestockTransaction;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LivestockTransactionResource extends Resource
{
    protected static ?string $model = LivestockTransaction::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    // Menambahkan navigation group
    protected static ?string $navigationGroup = 'Livestock';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('livestock_id')
                    ->relationship('livestock', 'name')
                    ->required(),
                Forms\Components\Select::make('type')
                    ->options([
                        'birth' => 'Birth',
                        'death' => 'Death',
                        'sold' => 'Sold',
                        'purchase' => 'Purchase'
                    ])
                    ->required(),
                Forms\Components\TextInput::make('quantity')
                    ->required()
                    ->numeric(),
                Forms\Components\DateTimePicker::make('date')->required(),
                Forms\Components\Textarea::make('description'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('livestock.name')->label('Livestock'),
                Tables\Columns\TextColumn::make('type'),
                Tables\Columns\TextColumn::make('quantity'),
                Tables\Columns\TextColumn::make('date')->date(),
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
            'index' => Pages\ListLivestockTransactions::route('/'),
            'create' => Pages\CreateLivestockTransaction::route('/create'),
            'edit' => Pages\EditLivestockTransaction::route('/{record}/edit'),
        ];
    }
}
