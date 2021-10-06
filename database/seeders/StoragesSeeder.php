<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StoragesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $old_storages = DB::connection('mysql2')->table('storage')->get();

        foreach ($old_storages as $storage) {
            DB::connection('mysql')->table('storages')->insert([
                'component_id' => $storage->component_id,
                'storage_type' => $storage->storage_type,
                'storage_capacity' => $storage->storage_capacity,
                'interface' => $storage->interface,
                'storage_form_factor' => $storage->storage_form_factor,
                'storage_cache' => $storage->storage_cache,
                'nvme' => $storage->nvme,
                'created_at' => $storage->created_at,
                'updated_at' => $storage->updated_at
            ]);
        }
    }
}
