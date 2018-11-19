<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRetailersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retailers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('retailer_id');
            $table->integer('phone');
            $table->integer('email');
            $table->integer('present_address');
            $table->integer('permanent_address');
            $table->integer('national_id_no');
            $table->integer('passport_id_no');
            $table->integer('branch_id');
            $table->integer('store_id');
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('retailers');
    }
}
