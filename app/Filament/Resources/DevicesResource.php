<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DevicesResource\Pages;
use App\Filament\Resources\DevicesResource\RelationManagers;
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

class DevicesResource extends Resource
{
    protected static ?string $model = Device::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                
                CheckboxList::make('is_enabled')->options(
                    ['1' => 'Is Enabled',"0" => 'Is Online'
                ])->label('Is Enabled'),


                // Toggle::make('is_enabled')->default(1)->label('Is Enabled'),
                // Toggle::make('is_online')->default(1)->label('Is Online'),


                Select::make(name: 'device_type_id')
                ->label('Device Type')
                ->options(DeviceTypes::all()->pluck('type_name', 'id'))
                ->searchable()->required(),
                Select::make(name: 'assigned_user_department')
                ->label('Departments')
                ->options(Department::all()->pluck('name', 'id'))
                ->searchable()->required(),

                Select::make(name: 'connection_type')
                    ->options([
                        'Ethernet' => 'Ethernet',
                        'Wi-Fi' => 'Wi-Fi',
                        'Other' => 'Other',
                    ])->label('Connection Type'),

                     Select::make(name: 'user_id')
                    ->options(User::all()->pluck('name', 'id'))
                    ->label(label: 'Manufacturer (User) '),

                     Select::make(name: 'operational_status')
                    ->options(['active', 'inactive', 'decommissioned'])
                    ->label(label: 'Operational Status'),

                    Select::make(name: 'antivirus_status')->options([
                        'enabled_up_to_date' => 'Enabled Up to Date',
                        'enabled_outdated' => 'Enabled Outdated',
                        'disabled' => 'Disabled',
                        'not_installed' => 'Not Installed',
                        'error' => 'Error',
                    ])->label('Antivirus Status'),



                TextInput::make('name')->label('Descriptive name for the device')->required(),
                TextInput::make('mac_address')->label('Mac address')->required(),
                TextInput::make('ip_address')->label('IP Address')->required(),
                TextInput::make('subnet_mask')->label('Subnet mask'),
                TextInput::make('network_info')->label('Network Info'),
                TextInput::make('default_gateway')->label('Default Gateway'),
                TextInput::make('dns_servers')->label('DNS Servers'),
                

                TextInput::make('vlan_info')->label('VLAN Info'),
                TextInput::make('port_details')->label('Port Details'),
               

                TextInput::make('model')->label('Model'),
                TextInput::make('serial_number')->label('Serial Number'),
                TextInput::make('location')->label('Location'),
                TextInput::make('firmware_version')->label('Firmware Version'),
                TextInput::make('software_version')->label('Software Version'),
                TextInput::make('hardware_version')->label('Hardware Version'),
                DatePicker::make('purchase_date') ->native(false)->label('Purchase Date'),
                TextInput::make('health_metrics')->label('Health metrics'),
                TextInput::make('firewall_settings')->label('Firewall Settings'),
                TextInput::make('network_traffic_stats')->label('Network Traffic Stats'),
               
                TextInput::make('last_seen_at')->label('Last Seen At'),
                TextInput::make('last_boot_at')->label('Last Boot At'),
                TextInput::make('last_reboot_at')->label('Last Reboot At'),
                TextInput::make('last_sync_at')->label('Last Sync At'),
                TextInput::make('last_synced_at')->label('Last Synced At'),
                Select::make(name: 'created_by')

                
            ]);

    
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListDevices::route('/'),
            'create' => Pages\CreateDevices::route('/create'),
            'edit' => Pages\EditDevices::route('/{record}/edit'),
        ];
    }
}
