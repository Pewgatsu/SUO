<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MoboMemorySpeedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $old_memspeeds = DB::connection('mysql2')->table('mobo_memory_speeds')->get();

        foreach ($old_memspeeds as $memspeed) {
            DB::connection('mysql')->table('mobo_memory_speeds')->insert([
                'component_id' => $memspeed->component_id,
                'memory_speed_id' => $memspeed->memory_speed_id,
                'created_at' => $memspeed->created_at,
                'updated_at' => $memspeed->updated_at
            ]);
        }
    }
}
