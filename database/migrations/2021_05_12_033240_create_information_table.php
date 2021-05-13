<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('information', function (Blueprint $table) {
            //Nên nghĩ xem có field nào không cần required không ?
            $table->id();
            $table->string('shop_name');
            $table->string('company_name');
            $table->string('shop_image');
            $table->text('description');
            $table->integer('phone');
            $table->string('email');
            $table->integer('hotline');
            $table->string('address');
            $table->string('facebook');
            $table->string('youtube');
            $table->string('twitter');
            $table->string('employee');
            $table->string('employee_image');
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
        Schema::dropIfExists('information');
    }
}
