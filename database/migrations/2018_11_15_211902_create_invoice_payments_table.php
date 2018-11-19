<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_payments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('invoice_id');
            $table->integer('customer_id');
            $table->string('customer_name');
            $table->integer('tender_id');
            $table->string('tender_name');
            $table->float('invoice_amount',array(10,2));
            $table->float('paid_amount',array(10,2));
            $table->float('change_amount',array(10,2));
            $table->integer('store_id');
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->timestamps();
            $table->softDeletes();
            $table->index('id');
            $table->index('invoice_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice_payments');
    }
}
