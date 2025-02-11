<?php

namespace App\Filament\Resources\SystemInfoResource\Pages;

use App\Filament\Resources\SystemInfoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSystemInfo extends EditRecord
{
    protected static string $resource = SystemInfoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
