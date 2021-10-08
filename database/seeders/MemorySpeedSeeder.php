<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MemorySpeedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $old_speeds = DB::connection('mysql2')->table('memory_speeds')->get();

        foreach ($old_speeds as $speed) {
            DB::connection('mysql')->table('memory_speeds')->insert([
                'id' => $speed->id,
                'name' => $speed->name,
                'created_at' => $speed->created_at,
                'updated_at' => $speed->updated_at
            ]);
        }
    }
}
