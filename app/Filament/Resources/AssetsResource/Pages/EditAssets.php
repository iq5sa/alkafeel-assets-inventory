<?php

namespace App\Filament\Resources\AssetsResource\Pages;

use App\Filament\Resources\AssetsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAssets extends EditRecord
{
    protected static string $resource = AssetsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    public function getBreadcrumb(): string
    {
        return parent::getBreadcrumb(); // TODO: Change the autogenerated stub
    }
}
