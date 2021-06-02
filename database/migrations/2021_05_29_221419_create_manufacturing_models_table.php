<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManufacturingModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_manufacturing', function (Blueprint $table) {
            $table->id('manufacturing_id');
            $table->string('manufacturing_code');
            $table->string('manufacturing_baseprice');
            $table->string('manufacturing_stokistprice');
            $table->string('manufacturing_distibutorprice');
            $table->string('manufacturing_retailerprice');
            $table->integer('manufacturing_productid');
            $table->integer('manufacturing_skuid');

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
        Schema::dropIfExists('tbl_manufacturing');
    }
}
