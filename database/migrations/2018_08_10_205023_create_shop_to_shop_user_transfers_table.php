<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopToShopUserTransfersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_to_shop_user_transfers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->string('user_name');
            $table->integer('old_shop_id');
            $table->string('old_shop_name');
            $table->integer('new_shop_id');
            $table->string('new_shop_name');
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
        Schema::dropIfExists('shop_to_shop_user_transfers');
    }
}
