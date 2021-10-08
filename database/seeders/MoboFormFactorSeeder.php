<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MoboFormFactorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $old_factors = DB::connection('mysql2')->table('mobo_form_factors')->get();

        foreach ($old_factors as $factor) {
            DB::connection('mysql')->table('mobo_form_factors')->insert([
                'id' => $factor->id,
                'name' => $factor->name,
                'created_at' => $factor->created_at,
                'updated_at' => $factor->updated_at
            ]);
        }
    }
}
