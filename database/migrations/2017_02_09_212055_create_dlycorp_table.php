<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDlycorpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dlycorp', function (Blueprint $table) {
            $table->increments('corp_id')->comment("物流公司ID");
            $table->string("type",6)->nullable()->comment("类型");
            $table->string("corp_code",200)->nullable()->comment("物流公司代码");
            $table->string("name",200)->nullable()->comment("物流公司");
            $table->enum("disabled",['true','false'])->nullable()->comment("是否失效");
            $table->unsignedSmallInteger("ordernum",4)->comment("排序");
            $table->string("website",200)->nullable()->comment("物流公司网址");
            $table->string("request_url",200)->nullable()->comment("查询接口网址");
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
        Schema::dropIfExists('dlycorp');
    }
}
