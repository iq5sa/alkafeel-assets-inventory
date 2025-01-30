<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DeviceTypesResource\Pages;
use App\Filament\Resources\DeviceTypesResource\RelationManagers;
use App\Models\DeviceTypes;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DeviceTypesResource extends Resource
{
    protected static ?string $model = DeviceTypes::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';


    public static function form(Form $form): Form
    {
        return $form
            ->schema(
                [
                Forms\Components\TextInput::make('type_name'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                
                TextColumn::make('type_name')
                    ->searchable()
                    ->sortable()
                    ->label('Device Type'),
                    
                    TextColumn::make('created_at')
                    ->searchable()
                    ->sortable()
                    ->label('Created At'),
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
            'index' => Pages\ListDeviceTypes::route('/'),
            'create' => Pages\CreateDeviceTypes::route('/create'),
            'edit' => Pages\EditDeviceTypes::route('/{record}/edit'),
        ];
    }
}
