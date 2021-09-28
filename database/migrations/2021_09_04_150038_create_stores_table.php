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
            $table->string('banner');
            $table->string('name');
            $table->longText('address');
            $table->longText('location');
            $table->string('description');
            $table->bigInteger('featured_motherboards');
            $table->bigInteger('featured_cpus');
            $table->bigInteger('featured_cpu_coolers');
            $table->bigInteger('featured_graphics_cards');
            $table->bigInteger('featured_rams');
            $table->bigInteger('featured_storages');
            $table->bigInteger('featured_psus');
            $table->bigInteger('featured_computer_cases');

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
