<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRAMSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rams', function (Blueprint $table) {
            $table->foreignId('component_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->primary('component_id');
            $table->string('memory_type');
            $table->integer('memory_speed');
            $table->integer('memory_capacity');
            $table->string('memory_form_factor');
            $table->string('modules')->nullable();
            $table->decimal('memory_voltage')->nullable();
            $table->string('memory_timings')->nullable();
            $table->boolean('ecc');
            $table->boolean('registered');
            $table->boolean('heat_spreader');
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
        Schema::dropIfExists('r_a_m_s');
    }
}
