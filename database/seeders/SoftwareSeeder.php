<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SoftwareSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        DB::table('softwares')->insert([
            [
                'name' => 'Microsoft Office',
                'version' => '2019',
                'publisher' => 'Microsoft',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Adobe Photoshop',
                'version' => '2021',
                'publisher' => 'Adobe',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Visual Studio Code',
                'version' => '1.60.0',
                'publisher' => 'Microsoft',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Google Chrome',
                'version' => '89.0.4389.82',
                'publisher' => 'Google LLC',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mozilla Firefox',
                'version' => '86.0',
                'publisher' => 'Mozilla Foundation',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Slack',
                'version' => '4.14.0',
                'publisher' => 'Slack Technologies',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Zoom',
                'version' => '5.5.2',
                'publisher' => 'Zoom Video Communications',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'AutoCAD',
                'version' => '2022',
                'publisher' => 'Autodesk',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Notepad++',
                'version' => '7.9.5',
                'publisher' => 'Don Ho',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '7-Zip',
                'version' => '19.00',
                'publisher' => 'Igor Pavlov',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'VLC Media Player',
                'version' => '3.0.11.1',
                'publisher' => 'VideoLAN',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Git',
                'version' => '2.31.1',
                'publisher' => 'Software Freedom Conservancy',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Docker',
                'version' => '20.10.5',
                'publisher' => 'Docker Inc.',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
