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
    protected static ?string $navigationGroup = 'Machines & Computers';



    public static function form(Form $form): Form
    {
        return $form
            ->schema([

<<<<<<< HEAD
                TextInput::make('name')->label('Name')->placeholder("Asset name")->required(),
=======
                TextInput::make('name')->label('Name')
                    ->placeholder("Asset name")->required(),

                //Asset Type
                Select::make(name: 'asset_type_id')
                    ->label('Asset Type')
                    ->options(AssetType::all()->pluck('name', 'id'))
                    ->searchable()->required(),

>>>>>>> f116ae9aa2355c584d705e65956f80c1e10e8c84
                Select::make(name: 'department_id')
                    ->label('Departments')
                    ->options(Department::all()->pluck('name', 'id'))
                    ->searchable()->required(),
<<<<<<< HEAD



                Select::make(name: 'type.name')
                    ->label('Asset Type')
                    ->options(AssetType::all()->pluck('name', 'id'))
                    ->searchable()->required(),
=======
>>>>>>> f116ae9aa2355c584d705e65956f80c1e10e8c84

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
<<<<<<< HEAD
                //username
                TextInput::make('username')->label('User Name')->required(),
                //Domain
                TextInput::make('domain')->label('Domain'),
=======



                //name
                //username
                TextInput::make('username')->label('UserName')->required(),

                //Domain
                TextInput::make('domain')->label('Domain'),



                //assigned user department


>>>>>>> f116ae9aa2355c584d705e65956f80c1e10e8c84
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
<<<<<<< HEAD
=======

>>>>>>> f116ae9aa2355c584d705e65956f80c1e10e8c84

                // OS & User Info Table Columns
                TextInput::make('connectedUser')->label("Connected User"),
                TextInput::make('oSName')->label("OS Name"),
                TextInput::make('oSVersion')->label("OS Version"),
                TextInput::make('architecture')->label("Architecture"),
                TextInput::make('windowsLicense')->label("Windows License"),
                TextInput::make('windowsKey')->label("Windows Key"),
                TextInput::make('networkData')->label("Network Data"),
                TextInput::make('swap')->label("Swap"),
                TextInput::make('memory')->label("Memory"),
                TextInput::make('uuid')->label("UUID"),
                TextInput::make('userAgent')->label("User Agent"),
                DatePicker::make('lastInventory')->native(false)->label('Last Inventory'),
                TextInput::make('cPUData')->label("CPU Data"),
                TextInput::make('diskData')->label("Disk Data"),
                TextInput::make('bIOSVersion')->label("BIOS Version"),
                TextInput::make('bIOSManufacturer')->label("BIOS Manufacturer"),

            ]);


    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Name')->searchable(),
               TextColumn::make('username')->label('UserName')->searchable(),
<<<<<<< HEAD
               TextColumn::make('type.name')->label('Asset Type')->searchable(),
=======
               TextColumn::make('assetType.name')->exists('assetType')->label('Asset Type')->searchable(),
>>>>>>> f116ae9aa2355c584d705e65956f80c1e10e8c84


               TextColumn::make('department.name')->exists('department')->label('Department')->searchable(),


               TextColumn::make('connection_type')->label('Connection Type')->searchable(),
               TextColumn::make('ip_address')->label('IP Address')->searchable(),
               TextColumn::make('mac_address')->label('Mac Address')->searchable(),
               TextColumn::make('location')->label('Location')->searchable(),
            ])
            ->filters([
                //

                Tables\Filters\Filter::make("type"),
                Tables\Filters\Filter::make("department"),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}
