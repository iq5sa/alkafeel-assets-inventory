<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NetworkScannerResource\Pages;
use App\Filament\Resources\NetworkScannerResource\RelationManagers;
use App\Jobs\ScanNetworkJob;
use App\Models\NetworkScanner;
use Filament\Tables\Actions\Action;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Bus;

class NetworkScannerResource extends Resource
{
    protected static ?string $model = NetworkScanner::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('ip_address')
                ->required()
                ->label('IP Address'),
            Forms\Components\Select::make('status')
                ->options([
                    'pending' => 'Pending',
                    'scanning' => 'Scanning',
                    'completed' => 'Completed',
                    'failed' => 'Failed',
                ])
                ->disabled()
                ->label('Status'),
            Forms\Components\Textarea::make('result')
                ->disabled()
                ->label('Scan Result'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('ip_address')->sortable(),
                Tables\Columns\TextColumn::make('status')->sortable(),
                Tables\Columns\TextColumn::make('result'),
                Tables\Columns\TextColumn::make('created_at')->label('Created')->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Action::make('Scan')
                ->requiresConfirmation()
                ->action(function (NetworkScanner $record) {
                    Bus::dispatch(new ScanNetworkJob($record));
                })
                ->label('Start Scan')
                ->icon('heroicon-o-play')
                ->color('success'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListNetworkScanners::route('/'),
            'create' => Pages\CreateNetworkScanner::route('/create'),
            'edit' => Pages\EditNetworkScanner::route('/{record}/edit'),
        ];
    }
}
