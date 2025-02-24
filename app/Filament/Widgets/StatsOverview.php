<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Support\Colors\Color;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Machines', 4)
                ->icon('heroicon-o-computer-desktop')
                ->chart([100, 2, 59, 3, 15, 4, 88])
            ->color(Color::Green),
            Stat::make('Windows', 12)->icon('heroicon-o-window')
                ->chart([7, 22, 10, 3, 50, 14, 17])->color(Color::Blue),
            Stat::make('Unix', 11)->icon('heroicon-o-tv')
                ->chart([100, 12, 10, 3, 15, 24, 66])->color(Color::Orange),
            Stat::make('Android', 10)->icon('heroicon-o-device-phone-mobile')
                ->chart([7, 2, 22,13, 15, 4, 17])->color(Color::Amber),
            Stat::make('Others', 220)->icon('heroicon-o-squares-2x2')
                ->chart([7, 2, 22, 3, 66, 4, 17]),
            Stat::make('Operating Systems', 5)
                ->chart([7, 2, 99, 3, 15, 4, 17])->color(Color::Cyan),
            Stat::make('Software', 112)->icon('heroicon-o-code-bracket')
                ->chart([72, 32, 10, 3, 55, 4, 17])->color(Color::Red),

            Stat::make('Routers', 22)->icon('heroicon-o-wifi')
                ->chart([72, 32, 10, 3, 55, 4, 17])->color(Color::Slate),
            Stat::make('Smartphones', 77)->icon('heroicon-o-device-phone-mobile')
                ->chart([72, 32, 10, 3, 55, 4, 17])->color(Color::Purple),

        ];
    }
}
