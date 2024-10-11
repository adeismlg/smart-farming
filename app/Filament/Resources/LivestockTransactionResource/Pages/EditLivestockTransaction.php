<?php

namespace App\Filament\Resources\LivestockTransactionResource\Pages;

use App\Filament\Resources\LivestockTransactionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLivestockTransaction extends EditRecord
{
    protected static string $resource = LivestockTransactionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
