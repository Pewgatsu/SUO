<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GraphicsCardsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $old_graphics = DB::connection('mysql2')->table('graphics_cards')->get();

        foreach ($old_graphics as $graphic) {
            DB::connection('mysql')->table('graphics_cards')->insert([
                'component_id' => $graphic->component_id,
                'gpu_chipset' => $graphic->gpu_chipset,
                'gpu_memory' => $graphic->gpu_memory,
                'gpu_memory_type' => $graphic->gpu_memory_type,
                'base_clock' => $graphic->base_clock,
                'boost_clock' => $graphic->boost_clock,
                'interface' => $graphic->interface,
                'tdp' => $graphic->tdp,
                'multigraphics_support' => $graphic->multigraphics_support,
                'frame_sync' => $graphic->frame_sync,
                'dvi_port' => $graphic->dvi_port,
                'hdmi_port' => $graphic->hdmi_port,
                'mini_hdmi_port' => $graphic->mini_hdmi_port,
                'displayport_port' => $graphic->displayport_port,
                'mini_displayport_port' => $graphic->mini_displayport_port,
                'e_slot_width' => $graphic->e_slot_width,
                'external_power' => $graphic->external_power,
                'cooling' => $graphic->cooling,
                'created_at' => $graphic->created_at,
                'updated_at' => $graphic->updated_at
            ]);
        }
    }
}
