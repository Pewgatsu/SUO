<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RAMsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $old_rams = DB::connection('mysql2')->table('rams')->get();

        foreach ($old_rams as $ram) {
            DB::connection('mysql')->table('rams')->insert([
                'component_id' => $ram->component_id,
                'memory_type' => $ram->memory_type,
                'memory_speed' => $ram->memory_speed,
                'memory_capacity' => $ram->memory_capacity,
                'memory_form_factor' => $ram->memory_form_factor,
                'modules' => $ram->modules,
                'memory_voltage' => $ram->memory_voltage,
                'memory_timings' => $ram->memory_timings,
                'ecc' => $ram->ecc,
                'registered' => $ram->registered,
                'heat_spreader' => $ram->heat_spreader,
                'created_at' => $ram->created_at,
                'updated_at' => $ram->updated_at
            ]);
        }
    }
}
