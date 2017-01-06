<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *products table
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->increments('product_id')->unsigned()->comment('货品ID');
            $table->string('jooge_product_id')->unique()->comment('货品ID');
            $table->string('name')->comment('货品名称');
            $table->integer('goods_id')->unsigned()->comment('商品ID');
            $table->foreign('goods_id')->references('goods_id')->on('goods')->comment('goods 外键约束');
            $table->string('barcode')->unique()->comment('条形码');
            $table->string('title')->comment('标题');
            $table->string('bn',32)->unique()->comment('货号');
            $table->decimal('cost_price')->unsigned()->default(0)->comment('成本价');
            $table->decimal('mkt_price')->unsigned()->default(0)->comment('市场价');
            $table->decimal('price')->unsigned()->default(0)->comment('销售价');
            $table->decimal('member_price')->unsigned()->default(0)->comment('会员价');
            $table->decimal('activity_price')->unsigned()->default(0)->comment('活动价');
            $table->integer('store')->default(0)->comment('库存');
            $table->string('store_place')->nullable()->comment('库位');
            $table->decimal('weight')->nullable()->comment('重量');
            $table->decimal('g_weight')->nullable()->comment('净重');
            $table->integer('unit_id')->unique()->comment('单位');
            $table->integer('freez')->default(0)->comment('冻结库存');
            $table->text('brief')->comment('商品简介');
            $table->enum('goods_type', [
                'normal',
                'bind',
                'gift'
            ])->comment('销售类型');
            $table->string('spec_info')->comment('产品描述');
            $table->json('spec_desc')->comment('产品规格');
            $table->boolean('is_default')->default(false)->commnet('is_default');
            $table->string('qrcode_image_id')->nullable()->comment('二维码图片');
            $table->dateTime('uptime')->comment('产品录入时间');
            $table->boolean('disabled')->default(false)->comment('是否失效');
            $table->boolean('marketable')->default(true)->comment('上架');
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
        Schema::dropIfExists('products');
    }
}
