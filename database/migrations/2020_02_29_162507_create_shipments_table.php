<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShipmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('address');
            $table->string('matp',5);
            $table->foreign('matp')->references('matp')->on('cities')->onUpdate('cascade');
            $table->string('maqh',5);
            $table->foreign('maqh')->references('maqh')->on('districts')->onUpdate('cascade');
            $table->string('maphuong',5);
            $table->foreign('maphuong')->references('maphuong')->on('wards')->onUpdate('cascade');
            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')->references('id')->on('orders')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('shipments');
    }
}
