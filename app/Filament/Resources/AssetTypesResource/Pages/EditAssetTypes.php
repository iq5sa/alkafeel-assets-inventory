<?php

namespace App\Filament\Resources\AssetTypesResource\Pages;

use App\Filament\Resources\AssetTypesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAssetTypes extends EditRecord
{
    protected static string $resource = AssetTypesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
