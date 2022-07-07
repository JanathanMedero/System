<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('service_id');
            $table->foreign('service_id')->references('id')->on('service_orders');

            $table->string('equip');
            $table->string('brand');
            $table->string('serie')->nullable();
            $table->string('accesories')->nullable();
            $table->string('features');
            $table->string('failure');
            $table->string('observations')->nullable();
            $table->string('solicited_service');

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
        Schema::dropIfExists('services');
    }
}
