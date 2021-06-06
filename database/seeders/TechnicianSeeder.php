<?php

namespace Database\Seeders;

use Faker\Factory;
use Faker\Generator;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TechnicianSeeder extends Seeder
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
            $this->createTechnician($faker);
        }
    }

    /**
     * create  a technician
     *
     * @param Generator $faker
     * @return void
     */
    private function createTechnician(Generator $faker) : void
    {
        DB::table('technicians')->insert([
            'first_name' => $faker->firstName(),
            'last_name' => $faker->lastName(),
            'truck_number' => $faker->numberBetween($min = 0, $max = 100)
        ]);
    }
}
