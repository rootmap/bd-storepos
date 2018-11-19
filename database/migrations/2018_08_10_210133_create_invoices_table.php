<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('invoice_id');
            $table->integer('customer_id');
            $table->integer('customer_name');
            $table->integer('tender_id');
            $table->integer('tender_name');
            $table->string('gift_voucher_title');
            $table->string('gift_voucher_code');
            $table->float('gift_voucher_amount');
            $table->float('tax_rate');
            $table->float('total_tax');
            $table->float('total_amount');
            $table->float('total_cost');
            $table->float('total_profit');
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
        Schema::dropIfExists('invoices');
    }
}
