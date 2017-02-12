<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberAdvanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_advance', function (Blueprint $table) {
            $table->increments("log_id")->unsigned()->commnet("日志id");
            $table->unsignedMediumInteger("member_id",8)->comment("用户id");
            $table->decimal("money",20,3)->comment("出入金额");
            $table->string("message",255)->nullable()->comment("管理备注");
            $table->unsignedInteger("mtime",10)->comment("交易时间");
            $table->string("payment_id",20)->nullable()->comment("支付单号");
            $table->unsignedBigInteger("order_id",20)->nullable()->comment("订单号");
            $table->string("paymethod",100)->nullable()->comment("支付方式");
            $table->string("memo",100)->nullable()->comment("业务摘要");
            $table->string("memo",100)->nullable()->comment("业务摘要");
            $table->decimal("import_money",20,3)->comment("存入金额");
            $table->decimal("explode_money",20,3)->comment("支出金额");
            $table->decimal("member_advance",20,3)->comment("当前余额");
            $table->decimal("shop_advance",20,3)->comment("商店余额");
            $table->enum("disabled",['true','false'])->comment("是否失效");
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
        Schema::dropIfExists('member_advance');
    }
}
