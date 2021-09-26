<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComputerCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('computer_cases', function (Blueprint $table) {
            $table->foreignId('component_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->primary('component_id');
            $table->string('case_type');
            $table->string('power_supply')->nullable();
            $table->boolean('power_supply_shroud');
            $table->string('side_panel_window')->nullable();
            $table->boolean('water_cooled_support')->nullable();
            $table->decimal('cooler_clearance')->nullable();
            $table->decimal('graphics_clearance')->nullable();
            $table->decimal('psu_clearance')->nullable();
            $table->tinyInteger('full_height_e_slot')->nullable();
            $table->tinyInteger('half_height_e_slot')->nullable();
            $table->tinyInteger('external_525_bay')->nullable();
            $table->tinyInteger('external_350_bay')->nullable();
            $table->tinyInteger('internal_350_bay')->nullable();
            $table->tinyInteger('internal_250_bay')->nullable();
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
        Schema::dropIfExists('computer_cases');
    }
}
