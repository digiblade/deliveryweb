<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->string("product_code");
            $table->string("product_hsncode");
            $table->string("product_baseprice");
            $table->string("product_showprice");
            $table->string("product_offerprice");
            $table->string("product_offerlabel");
            $table->integer("product_currency");
            $table->integer("product_isoffer");
            $table->integer("product_isactive");
            $table->integer("product_isinstock");
            $table->integer("product_quantity");
            $table->integer("product_reorderpoint");
            $table->text("product_description");
            $table->string("product_image");
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
        Schema::dropIfExists('tbl_products');
    }
}
