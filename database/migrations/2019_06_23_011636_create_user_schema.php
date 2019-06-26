<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserSchema extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rol', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });

        Schema::create('user', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username');
            $table->string('password');
            $table->string('name');
            $table->string('last_name');
            $table->unsignedInteger('fk_id_rol');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('fk_id_rol')
                ->references('id')
                ->on('rol');
        });

        Schema::create('request', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('attended')->default(false);
            $table->string('description', 1000);
            $table->string('last_name');
            $table->unsignedInteger('fk_id_user');
            $table->timestamps();

            $table->foreign('fk_id_user')
                ->references('id')
                ->on('user');
        });

        Schema::create('follow_request', function (Blueprint $table) {
            $table->increments('id');
            $table->string('comment', 1000);
            $table->unsignedInteger('fk_id_request');
            $table->timestamps();

            $table->foreign('fk_id_request')
                ->references('id')
                ->on('request');
        });

        Schema::create('client', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cellphone');
            $table->string('email');
            $table->string('street');
            $table->integer('ext_num');
            $table->integer('int_num')->nullable();
            $table->string('colony');
            $table->string('town');
            $table->string('zip_address');
            $table->unsignedInteger('fk_id_user');
            $table->timestamps();

            $table->foreign('fk_id_user')
                ->references('id')
                ->on('user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client');
        Schema::dropIfExists('follow_request');
        Schema::dropIfExists('request');
        Schema::dropIfExists('user');
        Schema::dropIfExists('rol');
    }
}
