<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('password');
            $table->string('email');
            $table->string('account_type');
            $table->string('profile_path')->nullable();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('birthdate')->nullable();
            $table->string('gender')->nullable();
            $table->string('contact')->nullable();
            $table->string('address')->nullable();
            $table->boolean('is_verified')->nullable();
            $table->boolean('is_active')->nullable();
            $table->boolean('is_admin')->nullable();
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
        Schema::dropIfExists('accounts');
    }
}
