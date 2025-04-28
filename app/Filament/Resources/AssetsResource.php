<?php

namespace App\Filament\Resources;

use App\Filament\Imports\AssetImporter;
use App\Filament\Resources\AssetsResource\Pages;
use App\Models\Asset;
use App\Models\AssetType;
use App\Models\Department;
use App\Models\Software;
use Filament\Actions\ImportAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Log;

class AssetsResource extends Resource
{
    protected static ?string $model = Asset::class;

    protected static ?string $navigationIcon = 'heroicon-o-computer-desktop';
    protected static ?string $navigationGroup = 'Machines & Computers';






    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Device Information')
                    ->schema([

                        Grid::make(3)->schema([
                            TextInput::make('name')->label('Device Name'),
                            TextInput::make('model')->label('Model'),
                            TextInput::make('serial_number')->label('Serial Number'),
                            TextInput::make('firmware_version')->label('Firmware Version'),
                            TextInput::make('software_version')->label('Software Version'),
                            TextInput::make('hardware_version')->label('Hardware Version'),
                            TextInput::make('device_owner')->label('Device Owner'),
                            TextInput::make('sensitivity')->label('Sensitivity'),
                            TextInput::make('sensitivity')->label('Importance'),
                        ])


                    ]),

                Section::make('Network Details')
                    ->schema([
                        Grid::make(3) // Set the grid to have 2 columns
                            ->schema(components: [
                                TextInput::make('ip_address')->label('IP Address'),
                                TextInput::make('public_ip')->label('Public IP'),
                                TextInput::make('mac_address')->label('Mac address'),
                                TextInput::make('domain')->label('Domain'),
                                TextInput::make('username')->label('Username'),
                                // TextInput::make('logged_in_users')->label('LoggedIn users'),
                            ]),
                    ]),

                Section::make('System Information')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('os_name')->label('OS Name'),
                            TextInput::make('os_version')->label('OS Version'),
                            TextInput::make('architecture')->label('Architecture'),
                            TextInput::make('cpu_data')->label('CPU Details'),
                            TextInput::make('memory')->label('Total RAM'),
                            TextInput::make('swap')->label('Swap Memory'),
                            TextInput::make('bios_version')->label('BIOS Version'),
                            TextInput::make('bios_manufacturer')->label('BIOS Manufacturer'),
                        ])
                    ]),

                Section::make('Performance Metrics')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('cpu_load')->label('CPU Load (%)'),
                            TextInput::make('ram_usage')->label('RAM Usage'),
                            TextInput::make('disk_read_speed')->label('Disk Read Speed (Bytes)'),
                            TextInput::make('uptime')->label('Uptime (seconds)'),
                            TextInput::make('battery_health')->label('Battery Health (%)'),
                        ])
                    ]),

                Section::make('Installed Apps')
                    ->schema([

                      Repeater::make("installed_apps")->label("All installed applications")->simple(
                        TextInput::make('name')->label('Name'),
                      ),

                    ]),




            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Name')->searchable(),
                TextColumn::make('connection_type')->label('Interface')->searchable(),
                TextColumn::make('mac_address')
                    ->label('Mac Address'),

                TextColumn::make('ip_address')->label('IP Address')->searchable(),

                TextColumn::make('public_ip')->label('Public IP')->searchable(),

            ])
            ->filters([
                Tables\Filters\SelectFilter::make('connection_type')
                    ->options([
                        'wi-fi' => 'Wi-Fi',
                        'ethernet' => 'Ethernet',
                    ])
            ])->searchable()->defaultSort('name', 'asc')
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make('View')->icon('heroicon-o-eye'),
            ])
            ->headerActions([
                Tables\Actions\ImportAction::make("Import action")->importer(AssetImporter::class),
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
            'index' => Pages\ListAssets::route('/'),
            'create' => Pages\CreateAssets::route('/create'),
            'edit' => Pages\EditAssets::route('/{record}/edit'),
            'view' => Pages\ViewAsset::route('/{record}/view'),

        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }




}
