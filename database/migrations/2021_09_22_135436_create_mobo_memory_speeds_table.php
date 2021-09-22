<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMOBOMemorySpeedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mobo_memory_speeds', function (Blueprint $table) {
            $table->foreignId('component_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('memory_speed_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->primary(['component_id','memory_speed_id']);
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
        Schema::dropIfExists('mobo_memory_speeds');
    }
}
