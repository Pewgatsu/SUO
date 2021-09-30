<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('account_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('banner')->nullable();
            $table->string('name');
            $table->longText('address');
            $table->longText('location')->nullable();
            $table->string('description')->nullable();
            $table->bigInteger('featured_motherboards')->nullable();
            $table->bigInteger('featured_cpus')->nullable();
            $table->bigInteger('featured_cpu_coolers')->nullable();
            $table->bigInteger('featured_graphics_cards')->nullable();
            $table->bigInteger('featured_rams')->nullable();
            $table->bigInteger('featured_storages')->nullable();
            $table->bigInteger('featured_psus')->nullable();
            $table->bigInteger('featured_computer_cases')->nullable();

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
        Schema::dropIfExists('stores');
    }
}
