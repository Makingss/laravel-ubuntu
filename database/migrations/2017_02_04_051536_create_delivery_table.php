<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeliveryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery', function (Blueprint $table) {
            $table->increments('delivery_id')->comment("配送流水号");
            $table->string("order_id",100)->nullable()->comment("订单编号");
            $table->string("delivery_bn",32)->comment("配送流水号");
            $table->unsignedMediumInteger('member_id',8)->nullable()->comment("订单会员ID");
            $table->decimal("money",20,3)->comment("配送费用");
            $table->enum('is_protect',['true','false'])->comment("是否保价");
            $table->unsignedMediumInteger('delivery',8)->nullable()->comment("配送方式");
            $table->string('logi_id',50)->nullable()->comment("物流公司ID");
            $table->string('logi_name',100)->nullable()->comment("物流公司名称");
            $table->string('logi_no','false')->comment("物流单号");
            $table->string('ship_name',50)->nullable()->comment("收货人姓名");
            $table->string('ship_area',50)->nullable()->comment("收货人地区");
            $table->text('ship_addr')->nullable()->comment("收货人地址");
            $table->string('ship_zip',20)->nullable()->comment("收货人邮编");
            $table->string('ship_tel',50)->nullable()->comment("收货人姓名");
            $table->string('ship_mobile',50)->nullable()->comment("收货人手机");
            $table->string('ship_email',50)->nullable()->comment("收货人Email");
            $table->unsignedInteger('t_begin',10)->nullable()->comment("单据生成时间");
            $table->unsignedInteger('t_send',10)->nullable()->comment("单据结束时间");
            $table->unsignedInteger('t_confirm',10)->nullable()->comment("单据确认时间");
            $table->string('op_name',50)->nullable()->comment("操作者");
            $table->enum('status',['succ','failed','cancel','lost','progress','timeout'])->comment("状态 succ:成功到达;failed:发货失败;cancel:已取消;lost:货物丢失;progress:运送中;timeout:超时;ready:准备发货;");
            $table->longText('memo')->comment("备注");
            $table->enum('disabled',['true','false'])->comment("是否失效");
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
        Schema::dropIfExists('delivery');
    }
}
