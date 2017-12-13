<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductShoppingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_shopping', function (Blueprint $table) {
            $table->integer('product_id')->unsigned();
            $table->integer('shopping_id')->unsigned();

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');;
            $table->foreign('shopping_id')->references('id')->on('shoppings')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_shopping');
    }
}
