<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAftersalesReturnProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('dbschema.databases.aftersales_return_products_tables'), function (Blueprint $table) {
            $table->increments('return_id');
            $table->bigInteger('order_id')->nullable()->comment('订单号');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(config('dbschema.databases.aftersales_return_products_tables'));
    }
}
