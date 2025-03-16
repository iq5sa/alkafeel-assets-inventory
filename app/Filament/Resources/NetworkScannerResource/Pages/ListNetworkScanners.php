<?php

namespace App\Filament\Resources\NetworkScannerResource\Pages;

use App\Filament\Resources\NetworkScannerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListNetworkScanners extends ListRecords
{
    protected static string $resource = NetworkScannerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
