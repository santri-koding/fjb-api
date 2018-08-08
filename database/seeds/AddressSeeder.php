<?php

use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (app()->environment() != 'production') {
            factory(\App\Models\Province::class, 3)->create()->each(function($province) {
                $province->cities()->saveMany(factory(\App\Models\City::class, 10)->make())->each(function($city) {
                    $city->districts()->saveMany(factory(\App\Models\District::class, 5)->make());
                });
            });
        }
    }
}
