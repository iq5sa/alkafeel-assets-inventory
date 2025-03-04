<?php

namespace App\Filament\Resources\AssetSoftwareResource\Pages;

use App\Filament\Resources\AssetSoftwareResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAssetSoftware extends ListRecords
{
    protected static string $resource = AssetSoftwareResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
