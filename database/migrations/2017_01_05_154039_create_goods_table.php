<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('goods_id')->primary()->unsigned()->comment('商品id');
            $table->string('jooge_goods_id', 200)->comment('商品id');
            $table->string('bn', 200)->unique()->comment('商品编号');
            $table->string('name', 255)->default('')->comment('商品名称');
            $table->integer('type_id')->unsigned()->comment('类型');
            $table->integer('cat_id')->unsigned()->default(0)->comment('分类');
            $table->integer('brand_id')->comment('品牌');
            $table->boolean('marketable')->comment('上下架');
            $table->integer('store')->unsigned()->default(0)->comment('库存');
            $table->integer('fav')->unsigned()->default(0)->comment('收藏量');
            $table->integer('notify_num')->unsigned()->default(0)->comment('缺货登记量');
            $table->dateTime('uptime')->comment('上架时间');
            $table->dateTime('downtime')->comment('下架时间');
            $table->integer('p_order')->default(30)->comment('排序');
            $table->integer('p_vstore')->default(30)->comment('店铺排序');
            $table->integer('d_order')->default(30)->comment('动态排序');
            $table->integer('d_vstore')->default(30)->comment('店铺动态排序');
            $table->integer('score')->comment('积分');
            $table->decimal('cost_price')->unsigned()->default(0)->comment('成本价');
            $table->decimal('mkt_price')->unsigned()->comment('市场价');
            $table->decimal('price')->unsigned()->default(0)->comment('销售价');
            $table->decimal('member_price')->unsigned()->default(0)->comment('会员价');
            $table->decimal('activity_price')->unsigned()->default(0)->comment('活动价');
            $table->decimal('weight')->comment('重量');
            $table->decimal('g_weight')->comment('净重');
            $table->integer('unit_id')->unique()->comment('单位');
            $table->text('brief')->comment('商品简介');
            $table->enum('goods_type', [
                'normal',
                'bind',
                'gift'
            ])->comment('销售类型');
            $table->string('image_default_id', 32)->comment('默认图片');
            $table->boolean('udfimg')->default(false)->comment('是否用户自定义图');
            $table->string('thumbnail_pic', 32)->comment('缩略图');
            $table->string('small_pic', 32)->comment('小图');
            $table->string('big_pic', 32)->comment('大图');
            $table->integer('pic_id')->default(0)->comment('图片组');
            $table->text('intro')->comment('祥细介绍');
            $table->string('store_place')->comment('库位');
            $table->integer('min_buy')->comment('起定量');
            $table->decimal('package_scale')->comment('打包比例');
            $table->string('package_unit', 20)->comment('打包单位');
            $table->boolean('package_use')->comment('是否开启打包');
            $table->integer('store_prompt')->comment('库存提示规则');
            $table->boolean('nostore_sell')->default(false)->comment('是否开启无库存销售');
            $table->json('goods_setting')->comment('商品设置');
            $table->json('spec_desc')->comment('货品规格');
            $table->json('params')->comment('商品规则');
            $table->integer('visit_count')->comment('被访问次数');
            $table->integer('comments_count')->comment('评论次数');
            $table->integer('view_w_count')->comment('周浏览次数');
            $table->integer('view_count')->comment('浏览次数');
            $table->json('count_stat')->comment('统计数据');
            $table->integer('buy_count')->comment('购买次数');
            $table->integer('buy_w_count')->comment('周购买次数');
            $table->string('barcode')->default(0)->comment('条形码');
            $table->boolean('is_line')->default(false)->comment('是否为线上商品');//增加销售平台的逻辑
            $table->integer('fx_1_price')->default(0)->comment('一级佣金');
            $table->integer('fx_2_price')->default(0)->comment('二级佣金');
            $table->integer('fx_3_price')->default(0)->comment('三级佣金');
            $table->string('goods_status')->comment('商品状态');
            $table->string('modify_status')->comment('变改标识');
            $table->dateTime('price_modify')->comment('售价变更时间');
            $table->string('good_form')->comment('商品来源');
            $table->integer('buy_limit')->comment('商品限购数量');
            $table->string('taxrate')->comment('税金');
            $table->integer('tip_id')->default(0)->comment('发货仓');
            $table->json('pmt_tag')->comment('标签');
            $table->integer('pmt_id')->default(0)->comment('促销方案');
            $table->decimal('goods_profit_ratio')->default(0)->comment('返佣比例');
            $table->boolean('is_pkg')->default(true)->comment('是否搭配商品');
            $table->json('pkg_info')->comment('搭配商品系列化信息');
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
        Schema::dropIfExists('goods');
    }
}
