<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDlytypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dlytype', function (Blueprint $table) {
            $table->increments('dt_id')->commnet("配送ID");
            $table->string("dt_name",50)->nullable()->comment("配送方式");
            $table->enum("has_cod",['true','false'])->commnet("货到付款");
            $table->unsignedMediumInteger("firstunit",8)->comment("首重");
            $table->unsignedMediumInteger("continueunit",8)->commnet("续重");
            $table->enum("is_threshold",['0','1'])->nullable()->commnet("临界值 0:不启用;1:启用");
            $table->longText("threshold")->nullable()->comment("临界值配置参数");
            $table->enum("protect",['true','false'])->comment("物流保价");
            $table->float("protect_rate",6,3)->nullable()->comment("保价费率");
            $table->float("minprice",10,2)->comment("保价费最低值");
            $table->enum("setting",['0','1'])->nullable()->commnet("地区费用类型 0:指定配送地区和费用;1:统一设置;");
            $table->enum("def_area_fee",['true','false'])->nullable()->commnet("按地区设置配送费用时,是否启用默认配送费用");
            $table->float("firstprice",10,2)->nullable()->comment("首重费用");
            $table->float("continueprice",10,2)->nullable()->comment("续重费用");
            $table->float("dt_discount",10,2)->nullable()->comment("折扣值");
            $table->longText("dt_expressions",10,2)->nullable()->comment("配送费用计算表达式");
            $table->enum("dt_useexp",['true','false'])->nullable()->comment("是否使用公式");
            $table->unsignedMediumInteger("corp_id",8)->nullable()->comment("物流公司ID");
            $table->enum("dt_status",[0,1])->nullable()->comment("是否开启 0:关闭;1:启用;");
            $table->longText("detail")->nullable()->comment("详细描述");
            $table->longText("area_fee_conf",8)->nullable()->comment("指定地区配置的一系列参数");
            $table->smallInteger("ordernum",4)->nullable()->comment("排序");
            $table->enum("disabled",['true','false'])->nullable()->comment("是否失效");
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
        Schema::dropIfExists('dlytype');
    }
}
