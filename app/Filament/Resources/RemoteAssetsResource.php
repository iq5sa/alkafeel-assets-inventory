<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RemoteAssetsResource\Pages;
use App\Models\RemoteAsset;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class RemoteAssetsResource extends Resource
{
    protected static ?string $model = RemoteAsset::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function canCreate(): bool
    {
        return false;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                TextInput::make('connectedUser')
                    ->label('Connected User'),

                TextInput::make('oSName')
                    ->label('OS Name'),

                TextInput::make('oSVersion')
                    ->label('OS version'),

                TextInput::make('architecture')
                    ->label('Architecture'),

                TextInput::make('domain')
                    ->label('Domain'),

                TextInput::make('bIOSManufacturer')
                    ->label('BIOS Manufacturer'),

                TextInput::make('windowsLicense'),

                TextInput::make('windowsKey'),



                TextInput::make('networkData'),

                TextInput::make('swap'),

                TextInput::make('memory'),

                TextInput::make('uuid')->label('UUID'),

                TextInput::make('userAgent'),

                TextInput::make('lastInventory'),

                TextInput::make('cPUData')->label('CPU Data'),

                TextInput::make('diskData'),

                TextInput::make('bIOSVersion')->label('BIOS Version'),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('connectedUser')
                    ->searchable(),

                TextColumn::make('oSName')
                    ->searchable()->label('OS Name'),

                TextColumn::make('oSVersion')
                    ->searchable()->label('OS Version'),

                TextColumn::make('architecture')
                    ->searchable(),
                TextColumn::make('domain')
                    ->searchable(),

                TextColumn::make('bIOSManufacturer')
                    ->searchable()->label("Manufacturer"),

                // TextColumn::make('WindowsLicense')
                //     ->searchable(),

                // TextColumn::make('WindowsKey')
                //     ->searchable(),


                // TextColumn::make('NetworkData')
                //     ->searchable(),

                // TextColumn::make('Swap')
                //     ->searchable(),

                // TextColumn::make('Memory')
                //     ->searchable(),

                // TextColumn::make('UUID')
                //     ->searchable(),

                // TextColumn::make('UserAgent')
                //     ->searchable(),

                // TextColumn::make('LastInventory')
                //     ->searchable(),

                // TextColumn::make('CPUData')
                //     ->searchable(),

                // TextColumn::make('DiskData')
                //     ->searchable(),

                // TextColumn::make('BIOSVersion')
                //     ->searchable(),



            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListRemoteAsset::route('/'),
            'create' => Pages\CreateRemoteAsset::route('/create'),
            'edit' => Pages\EditRemoteAsset::route('/{record}/edit'),
        ];
    }
}
