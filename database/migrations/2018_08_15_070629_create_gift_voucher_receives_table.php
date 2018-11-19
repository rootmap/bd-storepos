<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGiftVoucherReceivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gift_voucher_receives', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('from_shop_id');
            $table->integer('to_shop_id');
            $table->string('gift_voucher_id');
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
        Schema::dropIfExists('gift_voucher_receives');
    }
}
