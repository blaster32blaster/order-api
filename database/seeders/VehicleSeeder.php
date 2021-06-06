<?php

namespace Database\Seeders;

use Faker\Factory;
use Faker\Generator;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        for ($i = 0; $i < 5; $i ++) {
            $this->createVehicle($faker);
        }
    }

     /**
     * create  a vehicle
     *
     * @param Generator $faker
     * @return void
     */
    private function createVehicle(Generator $faker) : void
    {
        $dt = $faker->dateTimeBetween($startDate = '-30 years', $endDate = 'now');
        $date = $dt->format("Y");

        $make = config('cars.makes')[mt_rand(0, count(config('cars.makes')) -1 )];
        $model = config('cars.models')[mt_rand(0, count(config('cars.models')) -1 )];

        DB::table('vehicles')->insert([
            'year' => $date,
            'make' => $make,
            'model' => $model,
            'vin' => $faker->numberBetween($min = 999, $max = 99999)
        ]);
    }
}
