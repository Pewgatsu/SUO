<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MotherboardsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $old_motherboards = DB::connection('mysql2')->table('motherboard')->get();

        foreach ($old_motherboards as $motherboard) {
            DB::connection('mysql')->table('motherboards')->insert([
                'component_id' => $motherboard->component_id,
                'cpu_socket' => $motherboard->cpu_socket,
                'mobo_form_factor' => $motherboard->mobo_form_factor,
                'mobo_chipset' => $motherboard->mobo_chipset,
                'memory_slot' => $motherboard->memory_slot,
                'memory_type' => $motherboard->memory_type,
                'max_mem_support' => $motherboard->max_mem_support,
                'max_speed_support' => $motherboard->max_speed_support,
                'pcie_x16_slot' => $motherboard->pcie_x16_slot,
                'pcie_x8_slot' => $motherboard->pcie_x8_slot,
                'pcie_x4_slot' => $motherboard->pcie_x4_slot,
                'pcie_x1_slot' => $motherboard->pcie_x1_slot,
                'pci_slot' => $motherboard->pci_slot,
                'm2_slot' => $motherboard->m2_slot,
                'sata_6gb_slot' => $motherboard->sata_6gb_slot,
                'sata_3gb_slot' => $motherboard->sata_3gb_slot,
                'multigraphics_support' => $motherboard->multigraphics_support,
                'ecc_support' => $motherboard->ecc_support,
                'raid_support' => $motherboard->raid_support,
                'wireless_support' => $motherboard->wireless_support,
                'created_at' => $motherboard->created_at,
                'updated_at' => $motherboard->updated_at
            ]);
        }
    }
}
