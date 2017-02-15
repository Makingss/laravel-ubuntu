<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeliveryItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_items', function (Blueprint $table) {
            $table->increments('item_id')->comment("序号");
            $table->unsignedBigInteger("delivery_id",20)->comment("发货单号");
            $table->unsignedMediumInteger("order_item_id",8)->nullable()->comment("发货明细订单号");
            $table->enum("item_type",['goods','gift','pkg','adjunct'])->comment("商品类型 goods:商品;gift:赠品;pkg:捆绑商品;adjunct:配件商品;");
            $table->unsignedBigInteger("product_id",20)->comment("货品ID");
            $table->string("product_bn",30)->nullable()->comment("货品号");
            $table->string("product_name",200)->nullable()->comment("货品名称");
            $table->float("number")->comment("发货数量");
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
        Schema::dropIfExists('delivery_items');
    }
}
