<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePSUSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('psus', function (Blueprint $table) {
            $table->foreignId('component_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->primary('component_id');
            $table->string('psu_form_factor');
            $table->integer('wattage');
            $table->string('efficiency_rating');
            $table->string('modular');
            $table->tinyInteger('atx_connector')->nullable();
            $table->tinyInteger('eps_connector')->nullable();
            $table->tinyInteger('sata_connector')->nullable();
            $table->tinyInteger('molex_4pin_connector')->nullable();
            $table->tinyInteger('pcie_8pin_connector')->nullable();
            $table->tinyInteger('pcie_6+2pin_connector')->nullable();
            $table->tinyInteger('pcie_6pin_connector')->nullable();
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
        Schema::dropIfExists('p_s_u_s');
    }
}
