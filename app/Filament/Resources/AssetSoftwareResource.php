<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AssetSoftwareResource\Pages;
use App\Filament\Resources\AssetSoftwareResource\RelationManagers;
use App\Models\Asset;
use App\Models\AssetSoftware;
use App\Models\Software;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AssetSoftwareResource extends Resource
{
    protected static ?string $model = AssetSoftware::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('asset_id')
                    ->options(Asset::all()->pluck('name','id'))
                    ->label("Asset")
                ->native(false),


                Forms\Components\Select::make('software_id')
                    ->options(Software::all()->pluck('name','id'))
                    ->label("Software")
                    ->native(false)
                ->multiple(true),


                Forms\Components\Select::make("Status")->options(['Allowed', 'blocked' => 'blocked'])->label("Status"),
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
            'index' => Pages\ListAssetSoftware::route('/'),
            'create' => Pages\CreateAssetSoftware::route('/create'),
            'edit' => Pages\EditAssetSoftware::route('/{record}/edit'),
        ];
    }
}
