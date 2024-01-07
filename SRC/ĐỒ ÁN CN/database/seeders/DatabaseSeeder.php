<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        try {
            $response = Http::withHeaders([
                'token' => '24d5b95c-7cde-11ed-be76-3233f989b8f3'
            ])->get('https://online-gateway.ghn.vn/shiip/public-api/master-data/district', [
                'province_id' => 214,
            ]);
            $districts = json_decode($response->body(), true);
            DB::beginTransaction();
            foreach ($districts['data'] as $district) {
                DB::table('districts')->insert([
                    'id' => $district['DistrictID'],
                    'name' => $district['DistrictName'] ?? $district['NameExtension'][0] ?? null,
                    'province_id' => $district['ProvinceID']
                ]);

                $response = Http::withHeaders([
                    'token' => '24d5b95c-7cde-11ed-be76-3233f989b8f3'
                ])->get('https://online-gateway.ghn.vn/shiip/public-api/master-data/ward', [
                    'district_id' => $district['DistrictID'],
                ]);

                $wards = json_decode($response->body(), true);
                foreach ($wards['data'] as $ward) {
                    DB::table('wards')->insert([
                        'id' => $ward['WardCode'],
                        'name' => $ward['WardName'] ?? $ward['NameExtension'][0] ?? null,
                        'district_id' => $ward['DistrictID']
                    ]);
                }
            }
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();
        }
    }
}
