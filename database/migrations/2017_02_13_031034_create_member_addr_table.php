<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberAddrTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_addr', function (Blueprint $table) {
            $table->increments('addr_id')->comment("会员地址ID");
            $table->unsignedMediumInteger("member_id",8)->comment("会员ID");
            $table->string("name",50)->nullable()->comment("会员地址名称");
            $table->string("lastname",50)->nullable()->comment("姓名");
            $table->string("firstname",50)->nullable()->comment("姓名");
            $table->string("area",255)->nullable()->comment("地区");
            $table->string("addr",255)->nullable()->comment("地址");
            $table->string("zip",20)->nullable()->comment("邮编");
            $table->string("tel",50)->nullable()->comment("电话");
            $table->string("mobile",50)->nullable()->comment("手机");
            $table->string("day",255)->nullable()->comment("上门日期");
            $table->string("time",255)->nullable()->comment("上门时间");
            $table->tinyInteger("def_addr",1)->nullable()->comment("默认地址");
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
        Schema::dropIfExists('member_addr');
    }
}
