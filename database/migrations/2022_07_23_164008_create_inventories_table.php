<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');

            $table->string('brand');
            $table->text('description');
            $table->string('image')->nullable();
            $table->double('public_price', 8,2);
            $table->integer('dealer_price');
            $table->integer('stock_matriz');
            $table->integer('stock_virrey');
            $table->integer('stock_total');
            $table->double('investment', 8,2);
            $table->double('gain_public', 8,2);
            $table->double('dealer_profit', 8,2);
            $table->string('key_sat');
            $table->string('description_sat');

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
        Schema::dropIfExists('inventories');
    }
}
