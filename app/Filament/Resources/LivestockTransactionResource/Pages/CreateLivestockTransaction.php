<?php

namespace App\Filament\Resources\LivestockTransactionResource\Pages;

use App\Filament\Resources\LivestockTransactionResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateLivestockTransaction extends CreateRecord
{
    protected static string $resource = LivestockTransactionResource::class;
}
