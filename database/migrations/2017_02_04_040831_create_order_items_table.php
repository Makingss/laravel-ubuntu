<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->increments('item_id',8)->comment("订单明细ID");
            $table->unsignedBigInteger('order_id')->commont("订单ID");
            $table->unsignedMediumInteger("obj_id")->commont("订单明细对应的商品对象ID, 对应到sdb_b2c_order_objects表");
            $table->unsignedMediumInteger("product_id")->commont("货品ID");
            $table->unsignedBigInteger("goods_id")->commont("商品ID");
            $table->unsignedMediumInteger("type_id")->nullable()->commont("商品类型ID");
            $table->string("bn",40)->nullable()->commont("明细商品的品牌名");
            $table->string("name",200)->nullable()->commont("明细商品的名称");
            $table->decimal("cost",20,3)->nullable()->commont("明细商品的成本");
            $table->decimal("price",20,3)->commont("明细商品的销售价(购入价)");
            $table->decimal("g_price",20,3)->commont("明细商品的会员价原价");
            $table->decimal("amount",20,3)->nullable()->commont("明细商品总额");
            $table->unsignedMediumInteger("score")->nullable()->commont("明细商品积分");
            $table->unsignedMediumInteger("weight")->nullable()->commont("明细商品重量");
            $table->float("nums")->commont("明细商品购买数量");
            $table->float("sendnum")->commont("明细商品发货数量");
            $table->longText("addon")->nullable()->commont("明细商品的规格属性");
            $table->enum("item_type",['product','pkg','gift','adjunct'])->commont("明细商品类型 product:商品;pkg:捆绑商品;gift:赠品商品;adjunct:配件商品;");
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
        Schema::dropIfExists('order_items');
    }
}
