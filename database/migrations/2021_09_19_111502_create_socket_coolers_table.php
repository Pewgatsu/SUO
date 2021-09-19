<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocketCoolersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('socket_coolers', function (Blueprint $table) {
            $table->foreignId('component_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('cpu_socket_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->primary(['component_id','cpu_socket_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('socket_coolers');
    }
}
