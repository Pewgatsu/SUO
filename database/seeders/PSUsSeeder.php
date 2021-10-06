<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PSUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $old_psus = DB::connection('mysql2')->table('psus')->get();

        foreach ($old_psus as $psu) {
            DB::connection('mysql')->table('psus')->insert([
                'component_id' => $psu->component_id,
                'psu_form_factor' => $psu->psu_form_factor,
                'wattage' => $psu->wattage,
                'efficiency_rating' => $psu->efficiency_rating,
                'modular' => $psu->modular,
                'atx_connector' => $psu->atx_connector,
                'eps_connector' => $psu->eps_connector,
                'sata_connector' => $psu->sata_connector,
                'pcie_8pin_connector' => $psu->pcie_8pin_connector,
                'pcie_6+2pin_connector' => $psu->{'pcie_6+2pin_connector'},
                'pcie_6pin_connector' => $psu->pcie_6pin_connector,
                'created_at' => $psu->created_at,
                'updated_at' => $psu->updated_at
            ]);
        }
    }
}
