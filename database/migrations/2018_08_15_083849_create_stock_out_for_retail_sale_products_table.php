<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockOutForRetailSaleProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_out_for_retail_sale_products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('retailer_id');
            $table->string('retailer_name');
            $table->integer('lot_no');
            $table->string('barcode');
            $table->integer('product_id');
            $table->integer('product_name');
            $table->quantity('quantity');
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
        Schema::dropIfExists('stock_out_for_retail_sale_products');
    }
}
