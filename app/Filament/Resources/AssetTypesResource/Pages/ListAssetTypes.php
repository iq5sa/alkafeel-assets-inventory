<?php

namespace App\Filament\Resources\AssetTypesResource\Pages;

use App\Filament\Resources\AssetTypesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAssetTypes extends ListRecords
{
    protected static string $resource = AssetTypesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
