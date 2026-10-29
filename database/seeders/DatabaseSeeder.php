<?php


namespace Database\Seeders;

use App\Models\Category;
use App\Models\Equipment;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Internet of Things', 'code' => 'IOT'],
            ['name' => 'Server dan Cloud', 'code' => 'SC'],
            ['name' => 'Multimedia & Drone', 'code' => 'MD'],
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate(['code' => $category['code']], $category);
        }

        $iot = Category::where('code', 'IOT')->firstOrFail();
        $sc = Category::where('code', 'SC')->firstOrFail();
        $md = Category::where('code', 'MD')->firstOrFail();

        $assets = [
            ['category_id' => $iot->id, 'asset_code' => 'EQ-IOT-005', 'name' => 'Raspberry Pi 4 Model B (8GB RAM) Starter Kit', 'brand' => 'Raspberry Pi', 'specifications' => 'Quad-core Cortex-A72 @ 1.5GHz, 8GB LPDDR4, MicroSD 64GB Class 10, casing aluminium, adaptor dan power supply Type-C.', 'condition' => 'baik', 'status' => 'tersedia', 'daily_rental_fee' => 15000],
            ['category_id' => $mm->id, 'asset_code' => 'EQ-DRN-001', 'name' => 'DJI Mavic Air 2 Fly More Combo', 'brand' => 'DJI', 'specifications' => 'Drone kamera 4K, baterai cadangan dan tas penyimpanan.', 'condition' => 'baik', 'status' => 'tersedia', 'daily_rental_fee' => 50000],
            ['category_id' => $mm->id, 'asset_code' => 'EQ-DRN-003', 'name' => 'FPV Racing Drone BetaFPV Cetus Pro', 'brand' => 'BetaFPV', 'specifications' => 'FPV drone untuk latihan dan simulasi penerbangan.', 'condition' => 'baik', 'status' => 'tersedia', 'daily_rental_fee' => 25000],
            ['category_id' => $sc->id, 'asset_code' => 'EQ-SRV-001', 'name' => 'Server Rack Mini', 'brand' => 'Dell', 'specifications' => 'Server lab untuk praktikum dan eksperimen cloud.', 'condition' => 'baik', 'status' => 'tersedia', 'daily_rental_fee' => 75000],
        ];

        foreach ($assets as $asset) {
            Equipment::firstOrCreate(['asset_code' => $asset['asset_code']], $asset);
        }
    }
}
