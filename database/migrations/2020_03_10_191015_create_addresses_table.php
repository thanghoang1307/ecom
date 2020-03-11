<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('customers')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('is_primary')->default(0);
            $table->string('receiver');
            $table->string('phone');
            $table->string('address');
            $table->string('matp',5);
            $table->foreign('matp')->references('matp')->on('cities')->onUpdate('cascade');
            $table->string('maqh',5);
            $table->foreign('maqh')->references('maqh')->on('districts')->onUpdate('cascade');
            $table->string('maphuong',5);
            $table->foreign('maphuong')->references('maphuong')->on('wards')->onUpdate('cascade');
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
        Schema::dropIfExists('addresses');
    }
}
