<?php

use Falcon\Models\Account\Country;
use Illuminate\Database\Seeder;

class CountryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = json_decode(file_get_contents(storage_path('seeds/country.json')));

        foreach ($countries as $country) {
            if (isset($country->latitude) && isset($country->longitude)) {
                Country::create([
                    'name' => $country->name,
                    'a2' => $country->a2,
                    'a3' => $country->a3,
                    'currency' => $country->currency,
                    'calling_code' => $country->calling_code,
                    'capital' => $country->capital,
                    'latitude' => $country->longitude,
                    'longitude' => $country->latitude,
                ]);
            } else {
                Country::create([
                    'name' => $country->name,
                    'a2' => $country->a2,
                    'a3' => $country->a3,
                    'currency' => $country->currency,
                    'calling_code' => $country->calling_code,
                    'capital' => $country->capital,
                ]);
            }
        }
    }
}
