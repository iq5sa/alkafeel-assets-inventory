<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DevicesResource\Pages;
use App\Filament\Resources\DevicesResource\RelationManagers;
use App\Models\Asset;
use App\Models\Department;
use App\Models\Device;
use App\Models\DeviceTypes;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;
use App\Models\User;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Facades\Date;

class AssetsResource extends Resource
{
    protected static ?string $model = Asset::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                
                //name
                TextInput::make('name')->label('Name')->required(),
                //username
                TextInput::make('username')->label('UserName')->required(),

                //Domain
                TextInput::make('domain')->label('Domain'),
                //Device Type
                Select::make(name: 'device_type_id')
                ->label('Device Type')
                ->options(DeviceTypes::all()->pluck('type_name', 'id'))
                ->searchable()->required(),

                //assigned user department
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
                //health_metrics
                TextInput::make('health_metrics')->label('Health metrics'),
                //firewall_settings
                TextInput::make('firewall_settings')->label('Firewall Settings'),
                //network_traffic_stats
                TextInput::make('network_traffic_stats')->label('Network Traffic Stats'),
                //last_boot_at
                DatePicker::make('last_boot_at') ->native(false)->label('Last Boot At'),
                //last_seen_at
                DatePicker::make('last_seen_at') ->native(false)->label('Last Seen At'),
                //last_reboot_at
                DatePicker::make('last_reboot_at') ->native(false)->label('Last Reboot At'),
                //last_synced_at
                DatePicker::make('last_synced_at') ->native(false)->label('Last Synced At'),
                //created_by
                Select::make(name: 'created_by')

                
            ]);

    
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Name')->searchable(),
               TextColumn::make('username')->label('UserName')->searchable(),
               TextColumn::make('assetType.type_name')->exists('assetType')->label('Device Type')->searchable(),


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
