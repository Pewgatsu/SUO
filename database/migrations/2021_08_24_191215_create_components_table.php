<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;

class CreateComponentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('components', function (Blueprint $table) {

            if(config('app.env') !== 'local'){
                \Illuminate\Support\Facades\DB::statement('SET SESSION sql_require_primary_key=0');
            }
            $table->id();
            $table->string('image_path')->nullable();
            $table->string('name');
            $table->string('type');
            $table->string('manufacturer')->nullable();
            $table->string('series')->nullable();
            $table->string('model')->nullable();
            $table->string('color')->nullable();
            $table->decimal('length')->nullable();
            $table->decimal('width')->nullable();
            $table->decimal('height')->nullable();
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
        Schema::dropIfExists('components');
    }
}
