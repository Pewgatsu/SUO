<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMotherboardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('motherboards', function (Blueprint $table) {
            $table->foreignId('component_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->primary('component_id');
            $table->string('cpu_socket');
            $table->string('mobo_form_factor');
            $table->string('mobo_chipset');
            $table->tinyInteger('memory_slot');
            $table->string('memory_type');
            $table->integer('max_mem_support')->nullable();
            $table->tinyInteger('pcie_x16_slot')->nullable();
            $table->tinyInteger('pcie_x8_slot')->nullable();
            $table->tinyInteger('pcie_x4_slot')->nullable();
            $table->tinyInteger('pcie_x1_slot')->nullable();
            $table->tinyInteger('pci_slot')->nullable();
            $table->tinyInteger('m2_slot')->nullable();
            $table->tinyInteger('sata_6gb_slot')->nullable();
            $table->tinyInteger('sata_3gb_slot')->nullable();
            $table->string('multigraphics_support')->nullable();
            $table->boolean('ecc_support');
            $table->boolean('raid_support');
            $table->string('wireless_support')->nullable();
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
        Schema::dropIfExists('motherboards');
    }
}
