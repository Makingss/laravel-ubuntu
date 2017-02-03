<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('order_id','20');
            $table->decimal('total_amount', 20, 3)->comment('订单总金额');
            $table->decimal('final_amount', 20, 3)->comment('订单支付总金额');
            $table->enum('pay_status', ['1','2','3','4','5'])->comment('付款状态 0:未支付;1:已支付;2:已付款至到担保方;3:部分付款;4:部分退款;5:全额退款');
            $table->enum('received_status', ['0','1'])->comment('收货状态 0:未收货;1:已收货');
            $table->string('payment',100)->comment('支付方式');
            $table->unsignedInteger('last_modified', 10)->nullable()->comment('订单最后一次操作时间');
            $table->unsignedInteger('createtime','10')->nullable()->comment("下单时间");
            $table->unsignedMediumInteger('shipping_id','8')->nullable()->comment("配送方式编号");
            $table->string('shipping','100')->nullable()->comment("配送方式名称");
            $table->unsignedMediumInteger('member_id','8')->comment("会员编号id");
            $table->enum('status',['active','dead','finish'])->comment("订单状态 active:活动订单;dead:已作废;finish:已完成;");
            $table->string('ship_area','255')->nullable()->comment("收货地区");
            $table->string('ship_name','50')->nullable()->comment("收货人");
            $table->decimal('weight',20,3)->nullable()->comment("订单总重量");
            $table->enum('confirm',['Y','N'])->comment("确认状态");
            $table->enum('promotion_type',['normal','prepare'])->comment("销售类型 normal:普通订单;prepare:预售订单");
            $table->longText('tostr')->nullable()->comment("订单文字描述");
            $table->unsignedMediumInteger('itemnum','8')->nullable()->comment("订单子数量");
            $table->string('ip','15')->nullable()->comment("IP地址");
            $table->string('ship_addr','15')->nullable()->comment("收货人邮编");
            $table->string('ship_zip','20')->nullable()->comment("收货人邮编");
            $table->string('ship_tel','20')->nullable()->comment("收货电话");
            $table->string('ship_email','200')->nullable()->comment("收货人email");
            $table->string('ship_time','50')->nullable()->comment("配送时间");
            $table->decimal('cost_item',20,3)->comment("订单商品总价格");
            $table->enum('is_tax',['true','false'])->comment("是否需要开发票");
            $table->enum('tax_type',['false','personal','company'])->comment("发票类型 false:不需发票;personal:个人发票;company:公司发票;");
            $table->string('tax_content','255')->nullable()->comment("发票内容");
            $table->decimal('cost_tax',20,3)->comment("订票税率");
            $table->string('tax_company',255)->nullable()->comment("发票抬头");
            $table->enum('is_protect',['true','false'])->comment("是否还有保价费");
            $table->decimal('cost_protect',20,3)->comment("保价费");
            $table->decimal('cost_payment',20,3)->nullable()->comment("支付费用");
            $table->string('currency',8)->nullable()->comment("订单支付货币");
            $table->decimal('cur_rate',10,4)->nullable()->comment("订单支付货币汇率");
            $table->decimal('score_u',20,3)->comment("订单使用积分");
            $table->decimal('score_g',20,3)->comment("订单获得积分");
            $table->decimal('discount',20,3)->comment("订单减免");
            $table->decimal('pmt_goods',20,3)->nullable()->comment("商品促销优惠");
            $table->decimal('pmt_order',20,3)->nullable()->comment("订单促销优惠");
            $table->decimal('payed',20,3)->nullable()->comment("订单支付金额");
            $table->longText('memo')->nullable()->comment("订单附言");
            $table->enum('disabled',['true','false'])->nullable()->comment("是否失效");
            $table->enum('displayonsite',['true','false'])->nullable()->comment("displayonsite");
            $table->string('mark_type',2)->comment("订单备注图标");
            $table->longText('mark_text')->nullable()->comment("订单备注");
            $table->decimal('cost_freight',20,3)->comment("配送费用");
            $table->string('extend',255)->nullable()->comment("订单扩展");
            $table->string('order_refer',20)->comment("订单来源");
            $table->longText('addon',20,3)->nullable()->comment("订单附属信息(序列化)");
            $table->enum('source',['pc','wap','weixin'])->nullable()->comment("平台来源 pc:标准平台;wap:手机触屏;weixin:微信商城;");
            $table->enum('is_oversold',['false','true'])->nullable()->comment("是否超卖");
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
        Schema::dropIfExists('orders');
    }
}
