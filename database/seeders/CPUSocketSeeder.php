<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CPUSocketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $old_sockets = DB::connection('mysql2')->table('cpu_sockets')->get();

        foreach ($old_sockets as $socket) {
            DB::connection('mysql')->table('cpu_sockets')->insert([
                'id' => $socket->id,
                'name' => $socket->name,
                'created_at' => $socket->created_at,
                'updated_at' => $socket->updated_at
            ]);
        }
    }
}
