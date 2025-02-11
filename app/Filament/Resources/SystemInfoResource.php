<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SystemInfoResource\Pages;
use App\Filament\Resources\SystemInfoResource\RelationManagers;
use App\Models\SystemInfo;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SystemInfoResource extends Resource
{
    protected static ?string $model = SystemInfo::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function canCreate(): bool
    {
        return false;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                TextInput::make('ConnectedUser')
                    ->label('Connected User'),

                TextInput::make('OSName')
                    ->label('OS Name'),

                TextInput::make('OSVersion')
                    ->label('OS version'),

                TextInput::make('Architecture')
                    ->label('Architecture'),

                TextInput::make('Domain')
                    ->label('Domain'),

                TextInput::make('BIOSManufacturer')
                    ->label('BIOS Manufacturer'),

                TextInput::make('WindowsLicense'),

                TextInput::make('WindowsKey'),



                TextInput::make('NetworkData'),

                TextInput::make('Swap'),

                TextInput::make('Memory'),

                TextInput::make('UUID')->label('UUID'),

                TextInput::make('UserAgent'),

                TextInput::make('LastInventory'),

                TextInput::make('CPUData')->label('CPU Data'),

                TextInput::make('DiskData'),

                TextInput::make('BIOSVersion')->label('BIOS Version'),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('ConnectedUser')
                    ->searchable(),

                TextColumn::make('OSName')
                    ->searchable()->label('OS Name'),

                TextColumn::make('OSVersion')
                    ->searchable()->label('OS Version'),

                TextColumn::make('Architecture')
                    ->searchable(),
                TextColumn::make('Domain')
                    ->searchable(),

                TextColumn::make('BIOSManufacturer')
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
            'index' => Pages\ListSystemInfos::route('/'),
            'create' => Pages\CreateSystemInfo::route('/create'),
            'edit' => Pages\EditSystemInfo::route('/{record}/edit'),
        ];
    }
}
