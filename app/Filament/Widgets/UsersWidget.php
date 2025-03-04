<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class UsersWidget extends BaseWidget
{


    protected static ?int $sort = 3;
    protected static ?string $heading = "Recent Users";
    protected int | string | array $columnSpan = "full";

    public function table(Table $table): Table
    {
        return $table
            ->query(
                User::all()->toQuery()
            )
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
            ]);
    }
}
