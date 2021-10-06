<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CPUCoolersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $old_coolers = DB::connection('mysql2')->table('cpu_coolers')->get();

        foreach ($old_coolers as $cooler) {
            DB::connection('mysql')->table('cpu_coolers')->insert([
                'component_id' => $cooler->component_id,
                'fan_speed' => $cooler->fan_speed,
                'noise_level' => $cooler->noise_level,
                'water_cooled_support' => $cooler->water_cooled_support,
                'created_at' => $cooler->created_at,
                'updated_at' => $cooler->updated_at
            ]);
        }
    }
}
