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
            $table->text('description');
            $table->integer('orginal_price');
            $table->integer('sell_price');
            $table->string('image');
            $table->integer('quantity');
            $table->integer('quantity_sold')->default(0);
            $table->integer('status')->comment('selling, stop sell');
            $table->dateTime('expired_date');
            $table->integer('is_hot')->default(1)->comment('hot product, normal');
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
