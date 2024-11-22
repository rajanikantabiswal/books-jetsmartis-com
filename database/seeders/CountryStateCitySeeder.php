<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CountryStateCitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Insert countries with country_code as the calling code
        $countries = [
            ['country_code' => '91', 'country_name' => 'India', 'country_display_name' => 'IN', 'country_flag' => 'india-flag.png'],
            ['country_code' => '1', 'country_name' => 'United States', 'country_display_name' => 'US', 'country_flag' => 'us-flag.png'],
            ['country_code' => '1', 'country_name' => 'Canada', 'country_display_name' => 'CA', 'country_flag' => 'canada-flag.png'],
        ];

        foreach ($countries as $country) {
            $countryId = DB::table('countries')->insertGetId($country); // Insert country and get the inserted ID

            // Insert states for each country
            $states = [];
            if ($country['country_name'] == 'India') {
                $states = [
                    ['country_id' => $countryId, 'state_name' => 'Maharashtra', 'state_code' => 'MH'],
                    ['country_id' => $countryId, 'state_name' => 'Delhi', 'state_code' => 'DL'],
                ];
            } elseif ($country['country_name'] == 'United States') {
                $states = [
                    ['country_id' => $countryId, 'state_name' => 'California', 'state_code' => 'CA'],
                    ['country_id' => $countryId, 'state_name' => 'New York', 'state_code' => 'NY'],
                ];
            } elseif ($country['country_name'] == 'Canada') {
                $states = [
                    ['country_id' => $countryId, 'state_name' => 'Ontario', 'state_code' => 'ON'],
                    ['country_id' => $countryId, 'state_name' => 'Quebec', 'state_code' => 'QC'],
                ];
            }

            foreach ($states as $state) {
                $stateId = DB::table('states')->insertGetId($state); // Insert state and get the inserted ID

                // Insert cities for each state
                $cities = [];
                if ($state['state_name'] == 'Maharashtra') {
                    $cities = [
                        ['state_id' => $stateId, 'city_name' => 'Mumbai'],
                        ['state_id' => $stateId, 'city_name' => 'Pune'],
                    ];
                } elseif ($state['state_name'] == 'Delhi') {
                    $cities = [
                        ['state_id' => $stateId, 'city_name' => 'New Delhi'],
                        ['state_id' => $stateId, 'city_name' => 'Old Delhi'],
                    ];
                } elseif ($state['state_name'] == 'California') {
                    $cities = [
                        ['state_id' => $stateId, 'city_name' => 'Los Angeles'],
                        ['state_id' => $stateId, 'city_name' => 'San Francisco'],
                    ];
                } elseif ($state['state_name'] == 'New York') {
                    $cities = [
                        ['state_id' => $stateId, 'city_name' => 'New York City'],
                        ['state_id' => $stateId, 'city_name' => 'Buffalo'],
                    ];
                } elseif ($state['state_name'] == 'Ontario') {
                    $cities = [
                        ['state_id' => $stateId, 'city_name' => 'Toronto'],
                        ['state_id' => $stateId, 'city_name' => 'Ottawa'],
                    ];
                } elseif ($state['state_name'] == 'Quebec') {
                    $cities = [
                        ['state_id' => $stateId, 'city_name' => 'Montreal'],
                        ['state_id' => $stateId, 'city_name' => 'Quebec City'],
                    ];
                }

                foreach ($cities as $city) {
                    DB::table('cities')->insert($city); // Insert city
                }
            }
        }
    }
}
