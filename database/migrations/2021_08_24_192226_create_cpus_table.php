<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCPUSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cpus', function (Blueprint $table) {
            $table->foreignId('component_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->primary('component_id');
            $table->string('cpu_socket');
            $table->string('microarchitecture');
            $table->tinyInteger('core_count');
            $table->tinyInteger('thread_count');
            $table->decimal('base_clock');
            $table->decimal('boost_clock')->nullable();
            $table->integer('max_mem_support')->nullable();
            $table->smallInteger('tdp');
            $table->boolean('smt_support');
            $table->boolean('ecc_support');
            $table->string('integrated_graphics')->nullable();
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
        Schema::dropIfExists('c_p_u_s');
    }
}
