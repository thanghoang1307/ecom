<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttrGrMappingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attr_gr_mappings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('attr_gr_id');
            $table->foreign('attr_gr_id')->references('id')->on('attr_grs')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('attr_id');
            $table->foreign('attr_id')->references('id')->on('attrs')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attr_gr_mappings');
    }
}
