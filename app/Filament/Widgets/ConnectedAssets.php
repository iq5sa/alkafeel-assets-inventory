<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class ConnectedAssets extends ChartWidget
{
    protected static ?string $heading = 'Connected Machines';
    protected static ?int $sort = 2;
    protected static ?string $maxHeight = "500px";
   protected int | string | array $columnSpan = "full";




    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Connected Assets',
                    'data' => [30, 50, 20, 40, 10],
                    'backgroundColor' => [
                        '#FF6384',
                        '#36A2EB',
                        '#FFCE56',
                        '#4BC0C0',
                        '#9966FF',
                    ],
                ],
            ],
            'labels' => ['Laptops', 'Desktops', 'Servers', 'Mobile Devices', 'IoT Devices'],
        ];
    }



    protected function getType(): string
    {
        return 'doughnut';
    }
}
