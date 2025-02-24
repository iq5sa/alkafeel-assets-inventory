<?php

namespace App\Filament\Resources\RemoteAssetsResource\Pages;

use App\Filament\Resources\AssetTypesResource;
use App\Filament\Resources\RemoteAssetsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRemoteAsset extends EditRecord
{
    protected static string $resource = RemoteAssetsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
