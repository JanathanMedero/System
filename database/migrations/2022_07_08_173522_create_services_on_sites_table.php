<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesOnSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services_on_sites', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('order_service_id')->nullable();
            $table->foreign('order_service_id')->references('id')->on('service_order_sites')->onDelete('cascade');

            $table->string('name');
            $table->string('slug');
            $table->integer('quantity');
            $table->integer('net_price');
            $table->text('description')->nullable();

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
        Schema::dropIfExists('services_on_sites');
    }
}
