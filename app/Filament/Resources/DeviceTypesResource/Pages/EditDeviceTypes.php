<?php

namespace App\Filament\Resources\DeviceTypesResource\Pages;

use App\Filament\Resources\DeviceTypesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDeviceTypes extends EditRecord
{
    protected static string $resource = DeviceTypesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
