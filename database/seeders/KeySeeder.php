<?php

namespace Database\Seeders;

use Faker\Factory;
use Faker\Generator;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class KeySeeder extends Seeder
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
            $this->createKey($faker);
        }
    }

     /**
     * create  a key
     *
     * @param Generator $faker
     * @return void
     */
    private function createKey(Generator $faker) : void
    {
        DB::table('keys')->insert([
            'name' => Str::random(10),
            'description' => $faker->sentence(5),
            'price' => $faker->numberBetween($min = 1500, $max = 6000),
        ]);
    }
}
