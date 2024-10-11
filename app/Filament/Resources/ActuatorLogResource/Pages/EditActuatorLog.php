<?php

namespace App\Filament\Resources\ActuatorLogResource\Pages;

use App\Filament\Resources\ActuatorLogResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditActuatorLog extends EditRecord
{
    protected static string $resource = ActuatorLogResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
