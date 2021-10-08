<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SocketCoolersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $old_socketcoolers = DB::connection('mysql2')->table('socket_coolers')->get();

        foreach ($old_socketcoolers as $socketcooler) {
            DB::connection('mysql')->table('socket_coolers')->insert([
                'component_id' => $socketcooler->component_id,
                'cpu_socket_id' => $socketcooler->cpu_socket_id,
                'created_at' => $socketcooler->created_at,
                'updated_at' => $socketcooler->updated_at
            ]);
        }
    }
}
