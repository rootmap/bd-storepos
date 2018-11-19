<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockReturnToCSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_return_to_c_s', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('from_shop_id');
            $table->integer('to_stop_id');
            $table->integer('barcode');
            $table->integer('product_id');
            $table->string('product_name');
            $table->integer('quantity');
            $table->integer('store_id');
            $table->integer('branch_id');
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
        Schema::dropIfExists('stock_return_to_c_s');
    }
}
