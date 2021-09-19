<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCPUCoolersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cpu_coolers', function (Blueprint $table) {
            $table->foreignId('component_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->primary('component_id');
            $table->string('fan_speed')->nullable();
            $table->string('noise_level')->nullable();
            $table->string('water_cooled_support')->nullable();
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
        Schema::dropIfExists('cpu_coolers');
    }
}
