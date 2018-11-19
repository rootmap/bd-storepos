<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company_name');
            $table->string('city')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->text('terms_title')->nullable();
            $table->text('terms_text')->nullable();
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
        Schema::dropIfExists('invoice_settings');
    }
}
