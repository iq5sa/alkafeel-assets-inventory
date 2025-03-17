<?php

namespace App\Filament\Resources\NetworkScannerResource\Pages;

use App\Filament\Resources\NetworkScannerResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditNetworkScanner extends EditRecord
{
    protected static string $resource = NetworkScannerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
