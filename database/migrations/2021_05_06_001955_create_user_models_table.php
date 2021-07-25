<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('tbl_users',function(BluePrint $table){
        //     $table->id('user_id');
        //     $table->string('user_name')->nullable();
        //     $table->string('user_email')->unique();
        //     $table->string('user_password');
        //     $table->integer('user_type')->nullable();
        //     $table->string("user_firmname")->nullable();
        //     $table->string("user_mobile")->nullable();
        //     $table->string("user_gstNo")->nullable();
        //     $table->text("user_officeaddress")->nullable();
        //     $table->text("user_godownaddress")->nullable();
        //     $table->text("user_description")->nullable();
        //     $table->integer('user_parentid')->nullable();
        //     $table->rememberToken();
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_users');
    }
}
