<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComponentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $old_components = DB::connection('mysql2')->table('components')->get();

        foreach ($old_components as $component) {
            DB::connection('mysql')->table('components')->insert([
                'id'     => $component->id,
                'image_path'    => $component->image_path,
                'name' => $component->name,
                'type'   => $component->type,
                'manufacturer'   => $component->manufacturer,
                'series'   => $component->series,
                'model'   => $component->model,
                'color'   => $component->color,
                'length'   => $component->length,
                'width'   => $component->width,
                'height'   => $component->height,
                'created_at'   => $component->created_at,
                'updated_at'   => $component->updated_at
     ]);
}
    }
}
