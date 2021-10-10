<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComponentDistancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('component_distances', function (Blueprint $table) {
            $table->foreignId('component_id_1')->constrained('components')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('component_id_2')->constrained('components')->onUpdate('cascade')->onDelete('cascade');
            $table->primary(['component_id_1','component_id_2']);
            $table->decimal('distance',12,6);
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
        Schema::dropIfExists('component_distances');
    }
}
