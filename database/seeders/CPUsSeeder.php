<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CPUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $old_cpus = DB::connection('mysql2')->table('cpus')->get();

        foreach ($old_cpus as $cpu) {
            DB::connection('mysql')->table('cpus')->insert([
                'component_id'     => $cpu->component_id,
                'cpu_socket'    => $cpu->cpu_socket,
                'microarchitecture' => $cpu->microarchitecture,
                'core_count'   => $cpu->core_count,
                'thread_count'   => $cpu->thread_count,
                'base_clock'   => $cpu->base_clock,
                'boost_clock'   => $cpu->boost_clock,
                'max_mem_support'   => $cpu->max_mem_support,
                'tdp'   => $cpu->tdp,
                'smt_support'   => $cpu->smt_support,
                'ecc_support'   => $cpu->ecc_support,
                'integrated_graphics'   => $cpu->integrated_graphics,
                'created_at'   => $cpu->created_at,
                'updated_at'   => $cpu->updated_at
            ]);
    }
}
}
