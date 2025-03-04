<?php

namespace Database\Seeders;

use App\Models\Asset;
use App\Models\AssetType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AssetTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        $list = ["Router", "Repeater","Smartphone","Tablets", "Smart Home"];

        for ($i = 0 ;$i < count($list);$i++) {
            DB::table("asset_types")->insert([
                "name" => $list[$i],
                "created_at" => now(),
            ]);
        }


    }
}
