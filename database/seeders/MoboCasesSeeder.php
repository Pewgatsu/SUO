<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MoboCasesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $old_cases = DB::connection('mysql2')->table('mobo_cases')->get();

        foreach ($old_cases as $case) {
            DB::connection('mysql')->table('mobo_cases')->insert([
                'component_id' => $case->component_id,
                'mobo_form_factor_id' => $case->mobo_form_factor_id,
                'created_at' => $case->created_at,
                'updated_at' => $case->updated_at
            ]);
        }
    }
}
