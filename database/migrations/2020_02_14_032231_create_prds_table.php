<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sku')->unique();
            $table->string('name');
            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id')->references('id')->on('brands')->onUpdate('cascade');
            $table->unsignedBigInteger('attr_family_id');
            $table->foreign('attr_family_id')->references('id')->on('attr_families')->onUpdate('cascade');
            $table->double('regular_price')->nullable();
            $table->double('sale_price')->nullable();
            $table->text('short_desc')->nullable();
            $table->text('long_desc')->nullable();
            $table->string('thumb')->nullable();
            $table->string('slug')->unique();
            $table->integer('view')->default(0);
            $table->integer('sale')->default(0);
            $table->integer('current_price')->nullable();
            $table->integer('is_show')->default(1);
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
        Schema::dropIfExists('prds');
    }
}
