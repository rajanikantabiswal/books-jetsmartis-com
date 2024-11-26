<?php

namespace Database\Seeders;

use database;
use App\Models\Country;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countries = [
            ['country_code' => '+1', 'country_name' => 'United States', 'country_display_name' => 'USA'],
            ['country_code' => '+1', 'country_name' => 'Canada', 'country_display_name' => 'Canada'],
            ['country_code' => '+44', 'country_name' => 'United Kingdom', 'country_display_name' => 'UK'],
            ['country_code' => '+61', 'country_name' => 'Australia', 'country_display_name' => 'Australia'],
            ['country_code' => '+91', 'country_name' => 'India', 'country_display_name' => 'India'],
            ['country_code' => '+49', 'country_name' => 'Germany', 'country_display_name' => 'Germany'],
            ['country_code' => '+33', 'country_name' => 'France', 'country_display_name' => 'France'],
            ['country_code' => '+81', 'country_name' => 'Japan', 'country_display_name' => 'Japan'],
            ['country_code' => '+86', 'country_name' => 'China', 'country_display_name' => 'China'],
            ['country_code' => '+39', 'country_name' => 'Italy', 'country_display_name' => 'Italy'],
            ['country_code' => '+55', 'country_name' => 'Brazil', 'country_display_name' => 'Brazil'],
            ['country_code' => '+27', 'country_name' => 'South Africa', 'country_display_name' => 'South Africa'],
           
        ];

       
        Country::insert($countries);
    }
}
