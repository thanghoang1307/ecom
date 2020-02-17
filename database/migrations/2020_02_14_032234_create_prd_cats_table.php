<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrdCatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prd_cats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('prd_id');
            $table->foreign('prd_id')->references('id')->on('prds')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('cat_id');
            $table->foreign('cat_id')->references('id')->on('cats')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('prd_cats');
    }
}
