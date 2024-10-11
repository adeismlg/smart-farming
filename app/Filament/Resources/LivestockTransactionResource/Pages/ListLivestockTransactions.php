<?php

namespace App\Filament\Resources\LivestockTransactionResource\Pages;

use App\Filament\Resources\LivestockTransactionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLivestockTransactions extends ListRecords
{
    protected static string $resource = LivestockTransactionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
