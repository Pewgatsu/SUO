<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComputerCasesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $old_cases = DB::connection('mysql2')->table('computer_cases')->get();

        foreach ($old_cases as $case) {
            DB::connection('mysql')->table('computer_cases')->insert([
                'component_id' => $case->component_id,
                'case_type' => $case->case_type,
                'power_supply' => $case->power_supply,
                'power_supply_shroud' => $case->power_supply_shroud,
                'side_panel_window' => $case->side_panel_window,
                'water_cooled_support' => $case->water_cooled_support,
                'cooler_clearance' => $case->cooler_clearance,
                'graphics_clearance' => $case->graphics_clearance,
                'psu_clearance' => $case->psu_clearance,
                'full_height_e_slot' => $case->full_height_e_slot,
                'half_height_e_slot' => $case->half_height_e_slot,
                'external_525_bay' => $case->external_525_bay,
                'external_350_bay' => $case->external_350_bay,
                'internal_350_bay' => $case->internal_350_bay,
                'internal_250_bay' => $case->internal_250_bay,
                'created_at' => $case->updated_at,
                'updated_at' => $case->updated_at
            ]);
        }
    }
}
