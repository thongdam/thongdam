<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderProductsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('orders_products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('total');
            $table->integer('products_id')->unsigned();
            $table->integer('order_id')->unsigned();
            $table->string('tax');
            $table->integer('qty');
            $table->foreign('products_id')->references('id')->on('products');
            $table->foreign('order_id')->references('id')->on('orders');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('orders_products');
    }

}
