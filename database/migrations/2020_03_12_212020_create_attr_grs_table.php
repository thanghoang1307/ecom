<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttrGrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attr_grs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('position');
            $table->integer('is_user_defined')->default(1);
            $table->unsignedBigInteger('attr_family_id');
            $table->foreign('attr_family_id')->references('id')->on('attr_families')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attr_grs');
    }
}
