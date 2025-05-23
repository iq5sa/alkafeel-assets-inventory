<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NetworkScannerResource\Pages;
use App\Filament\Resources\NetworkScannerResource\RelationManagers;
use App\Jobs\ScanNetworkJob;
use App\Models\NetworkScanner;
use Filament\Actions\ActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Infolists\Components\TextEntry;
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
    public static function canReorder(): bool
    {
        return parent::canReorder(); // TODO: Change the autogenerated stub
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('ip_address')
                ->required()
                ->label('IP Address')
                ->label('Ip Address'),

            Forms\Components\Select::make('status')->options([
                'pending' => 'pending',
                'scanning' => 'scanning',
                'completed' => 'completed',
                'failed' => 'failed'
            ])->disabled(),

            Forms\Components\Textarea::make('result')
            ->label('Result')->rows(15)->disabled(),

        Forms\Components\TextInput::make("scan_type")->label('Scan Type')->disabled()


        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc') // Order by latest created first

            ->columns([
                Tables\Columns\TextColumn::make('ip_address')->sortable(),
                Tables\Columns\IconColumn::make('status')
                    ->icon(fn (string $state): string => match ($state) {
                        'pending' => 'heroicon-o-clock',    // Clock icon for pending
                        'scanning'=> 'heroicon-o-arrow-path' , // Refresh icon for scanning
                        'completed'=>'heroicon-o-check-circle', // Check circle for completed
                        'failed' => 'heroicon-o-x-circle',  // X circle for failed
                    })

                    ->color(fn (string $state): string => match ($state){
                        'pending' => 'warning',
                        'scanning' => 'info',
                        'completed' => 'success',
                        'failed' => 'danger',
                        default => 'scanning',

                    })
                    ->label('Status')
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')->label('Created')->since()->sortable(),
                Tables\Columns\TextColumn::make('updated_at')->label('Updated')->since()->sortable(),
                Tables\Columns\TextColumn::make("scan_type")->label('Scan Type')


            ])
            ->filters([
                //
            ])
            ->actions([

                Tables\Actions\ActionGroup::make([
                    Action::make('Scan')
                        ->requiresConfirmation()
                        ->form([
                            Forms\Components\Select::make('scan_type')
                                ->label('Scan Type')
                                ->options([
                                    'quick' => 'Quick Scan',
                                    'full' => 'Full Scan',
                                    'os' => 'OS Detection',
                                    'ports' => 'Port Scan',
                                ])
                                ->default('quick')
                                ->required(),

                            Forms\Components\TextInput::make('custom_ports')
                                ->label('Custom Ports (comma-separated)')
                                ->placeholder('22,80,443')
                                ->helperText('Leave empty to scan all ports.')
                                ->nullable(),

                        ])
                        ->action(function (NetworkScanner $record, array $data) {
                            // Dispatch scan job with selected options
                            Bus::dispatch(new ScanNetworkJob($record, $data));
                        }),
                    ViewAction::make('View')->label('View result'),
                    Tables\Actions\DeleteAction::make()

                ]),






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
            'view' => Pages\ViewNetworkScanner::route('/{record}/view'),

        ];
    }
}
