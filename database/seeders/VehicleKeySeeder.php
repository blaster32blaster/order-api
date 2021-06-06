<?php

namespace Database\Seeders;

use App\Models\Key;
use App\Models\Vehicle;
use Illuminate\Database\Seeder;

class VehicleKeySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vehicles = Vehicle::all();
        $keys = Key::all();

        for ($iter = 0; $iter < $vehicles->count(); $iter++) {
            $this->attachKeyToVehicle(
                $vehicles->get($iter),
                $keys->get($iter)
            );
        }
    }

    /**
     * attach a key to a vehicle
     *
     * @param Vehicle $vehicle
     * @param Key $key
     * @return void
     */
    private function attachKeyToVehicle(Vehicle $vehicle, Key $key) : void
    {
        $vehicle->key()->sync($key->id);
    }
}
