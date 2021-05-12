<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->integer('category_parent_id');
            $table->integer('brand_id');
            $table->string('name');
            $table->text('desciption');
            $table->integer('price_core');
            $table->integer('price_sell');
            $table->string('image');
            $table->integer('quantity');
            $table->integer('quantity_sold');
            $table->integer('status');
            $table->dateTime('expired');
            $table->integer('product_hot');
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
        Schema::dropIfExists('products');
    }
}
