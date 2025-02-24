<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RemoteAssetsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        DB::table('remote_assets')->insert([
            'connectedUser' => 'admin',
            'oSName' => fake()->randomElement(["Windows","Linux", "Unix"]),
            'oSVersion' => '10.0.19045',
            'architecture' => 'x64',
            'windowsLicense' => 'Retail',
            'windowsKey' => Str::random(25),
            'domain' => fake()->domainName,
            'networkData' => json_encode(['IP' => fake()->ipv4, 'MAC' => fake()->macAddress]),
            'swap' => '8 GB',
            'memory' => '16 GB',
            'uuid' => Str::uuid(),
            'userAgent' => fake()->userAgent,
            'lastInventory' => Carbon::now(),
            'cPUData' => json_encode(['Model' => 'Intel Core i7', 'Cores' => 8]),
            'diskData' => json_encode(['Size' => '512 GB', 'Type' => 'SSD']),
            'bIOSVersion' => '1.0.2',
            'bIOSManufacturer' => 'Dell',
            'created_at' => Carbon::now(),
        ]);
    }
}
