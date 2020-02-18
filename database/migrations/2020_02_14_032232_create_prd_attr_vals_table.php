<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrdAttrValsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prd_attr_vals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('prd_id');
            $table->foreign('prd_id')->references('id')->on('prds')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('attr_id');
            $table->foreign('attr_id')->references('id')->on('attrs')->onUpdate('cascade')->onDelete('cascade');
            $table->string('text_val')->nullable();
            $table->boolean('boolean_val')->nullable();
            $table->datetime('datetime_val')->nullable();
            $table->integer('int_val')->nullable();
            $table->float('float_val')->nullable();
            $table->date('date_val')->nullable();
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
        Schema::dropIfExists('prd_attr_vals');
    }
}
