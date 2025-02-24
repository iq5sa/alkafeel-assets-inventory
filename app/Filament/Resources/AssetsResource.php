<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AssetsResource\Pages;
use App\Models\Asset;
use App\Models\AssetType;
use App\Models\Department;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class AssetsResource extends Resource
{
    protected static ?string $model = Asset::class;

    protected static ?string $navigationIcon = 'heroicon-o-computer-desktop';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                TextInput::make('name')->label('Name')
                    ->placeholder("Asset name")->required(),

                //Asset Type
                Select::make(name: 'asset_type_id')
                    ->label('Asset Type')
                    ->options(AssetType::all()->pluck('name', 'id'))
                    ->searchable()->required(),

                Select::make(name: 'department_id')
                    ->label('Departments')
                    ->options(Department::all()->pluck('name', 'id'))
                    ->searchable()->required(),

                //connection type
                Select::make(name: 'connection_type')
                    ->options([
                        'Ethernet' => 'Ethernet',
                        'Wi-Fi' => 'Wi-Fi',
                        'Other' => 'Other',
                    ])->label('Connection Type'),

                //antivirus status
                Select::make(name: 'antivirus_status')->options([
                    'enabled_up_to_date' => 'Enabled Up to Date',
                    'enabled_outdated' => 'Enabled Outdated',
                    'disabled' => 'Disabled',
                    'not_installed' => 'Not Installed',
                    'error' => 'Error',
                ])->label('Antivirus Status'),



                //name
                //username
                TextInput::make('username')->label('UserName')->required(),

                //Domain
                TextInput::make('domain')->label('Domain'),



                //assigned user department


                //mac address
                TextInput::make('mac_address')->label('Mac address')->required(),
                //ip address
                TextInput::make('ip_address')->label('IP Address')->required(),
                //subnet mask
                TextInput::make('subnet_mask')->label('Subnet mask'),
                //network info
                TextInput::make('network_info')->label('Network Info'),
                //default gateway
                TextInput::make('default_gateway')->label('Default Gateway'),
                //dns servers
                TextInput::make('dns_servers')->label('DNS Servers'),
                //vlan info
                TextInput::make('vlan_info')->label('VLAN Info'),
                //port details
                TextInput::make('port_details')->label('Port Details'),

                //model
                TextInput::make('model')->label('Model'),
                //serial number
                TextInput::make('serial_number')->label('Serial Number'),
                //location
                TextInput::make('location')->label('Location'),
                //firmware version
                TextInput::make('firmware_version')->label('Firmware Version'),
                //software version
                TextInput::make('software_version')->label('Software Version'),
                //hardware version
                TextInput::make('hardware_version')->label('Hardware Version'),

                //purchase date
                DatePicker::make('purchase_date') ->native(false)->label('Purchase Date'),



            ]);


    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Name')->searchable(),
               TextColumn::make('username')->label('UserName')->searchable(),
               TextColumn::make('assetType.name')->exists('assetType')->label('Asset Type')->searchable(),


               TextColumn::make('department.name')->exists('department')->label('Department')->searchable(),


               TextColumn::make('connection_type')->label('Connection Type')->searchable(),
               TextColumn::make('ip_address')->label('IP Address')->searchable(),
               TextColumn::make('mac_address')->label('Mac Address')->searchable(),
               TextColumn::make('location')->label('Location')->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
        ];
    }
}
