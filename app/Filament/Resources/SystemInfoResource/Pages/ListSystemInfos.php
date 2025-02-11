<?php

namespace App\Filament\Resources\SystemInfoResource\Pages;

use App\Filament\Resources\SystemInfoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSystemInfos extends ListRecords
{
    protected static string $resource = SystemInfoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
