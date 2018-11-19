<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('invoice_id');
            $table->integer('product_id');
            $table->string('product_name');
            $table->float('price',array(10,2));
            $table->float('cost',array(10,2));
            $table->integer('quantity');
            $table->float('total_price',array(10,2));
            $table->float('total_cost',array(10,2));
            $table->integer('store_id');
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->timestamps();
            $table->softDeletes();
            $table->index('id');
            $table->index('invoice_id');
            $table->index('product_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice_products');
    }
}
