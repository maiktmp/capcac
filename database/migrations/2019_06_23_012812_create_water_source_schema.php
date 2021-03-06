<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWaterSourceSchema extends Migration
{
    public function up()
    {
        Schema::create('transaction_type', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });

        Schema::create('state', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->decimal('discount', 13, 2);
        });

        Schema::create('water_source_type', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->decimal('price', 13, 2);
        });

        Schema::create('water_source', function (Blueprint $table) {
            $table->increments('id');
            $table->date('registration_date');
            $table->string('number');
            $table->timestamps();
            $table->unsignedInteger('fk_id_state');
            $table->unsignedInteger('fk_id_client');
            $table->unsignedInteger('fk_id_water_source_type');

            $table->foreign('fk_id_state')
                ->references('id')
                ->on('state');

            $table->foreign('fk_id_client')
                ->references('id')
                ->on('client');

            $table->foreign('fk_id_water_source_type')
                ->references('id')
                ->on('water_source_type');
        });

        Schema::create('voucher', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->decimal('amount', 13, 2);
            $table->string('description')->nullable();
            $table->string('voucher_url')->nullable();
            $table->string('file_url')->nullable();
            $table->timestamps();
            $table->unsignedInteger('fk_id_transaction_type');

            $table->foreign('fk_id_transaction_type')
                ->references('id')
                ->on('transaction_type');
        });

        Schema::create('penalty', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->string('description')->nullable();
            $table->decimal('amount', 13, 2);
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedInteger('fk_id_water_source');
            $table->unsignedInteger('fk_id_voucher')->nullable();

            $table->foreign('fk_id_voucher')
                ->references('id')
                ->on('voucher');

            $table->foreign('fk_id_water_source')
                ->references('id')
                ->on('water_source');
        });

        Schema::create('payment', function (Blueprint $table) {
            $table->increments('id');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('file_url')->nullable();
            $table->decimal('price', 13, 2);
            $table->timestamps();

            $table->unsignedInteger('fk_id_water_source');
            $table->unsignedInteger('fk_id_voucher');

            $table->foreign('fk_id_water_source')
                ->references('id')
                ->on('water_source');

            $table->foreign('fk_id_voucher')
                ->references('id')
                ->on('voucher');

        });

        Schema::create('penalty_payment', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->unsignedInteger('fk_id_voucher');
            $table->unsignedInteger('fk_id_water_source');

            $table->foreign('fk_id_voucher')
                ->references('id')
                ->on('voucher');

            $table->foreign('fk_id_water_source')
                ->references('id')
                ->on('water_source');
        });


    }

    public function down()
    {
        Schema::dropIfExists('penalty_payment');
        Schema::dropIfExists('payment');
        Schema::dropIfExists('penalty');
        Schema::dropIfExists('voucher');
        Schema::dropIfExists('water_source');
        Schema::dropIfExists('water_source_type');
        Schema::dropIfExists('state');
        Schema::dropIfExists('transaction_type');
    }
}
