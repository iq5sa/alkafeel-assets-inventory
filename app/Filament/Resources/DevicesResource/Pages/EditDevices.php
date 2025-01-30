<?php

namespace App\Filament\Resources\DevicesResource\Pages;

use App\Filament\Resources\DevicesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDevices extends EditRecord
{
    protected static string $resource = DevicesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
