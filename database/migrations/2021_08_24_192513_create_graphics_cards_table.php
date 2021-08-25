<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGraphicsCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('graphics_cards', function (Blueprint $table) {
            $table->foreignId('component_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->primary('component_id');
            $table->string('gpu_chipset');
            $table->decimal('gpu_memory');
            $table->string('gpu_memory_type');
            $table->decimal('base_clock');
            $table->decimal('boost_clock')->nullable();
            $table->string('interface');
            $table->smallInteger('tdp');
            $table->string('multigraphics_support')->nullable();
            $table->string('frame_sync')->nullable();
            $table->tinyInteger('dvi_port')->nullable();
            $table->tinyInteger('hdmi_port')->nullable();
            $table->tinyInteger('mini_hdmi_port')->nullable();
            $table->tinyInteger('displayport_port')->nullable();
            $table->tinyInteger('mini_displayport_port')->nullable();
            $table->tinyInteger('e_slot_width')->nullable();
            $table->string('external_power')->nullable();
            $table->string('cooling')->nullable();
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
        Schema::dropIfExists('graphics_cards');
    }
}
