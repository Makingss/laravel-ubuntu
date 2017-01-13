<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsKeywordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('dbschema.databases.goods_keywords_tables'), function (Blueprint $table) {
            $table->increments('id');
            $table->integer('goods_id')->primary('goods_id')->unsigned()->comment('商品ID');
            $table->string('keyword', 50)->primary('keyword')->comment('搜索关键字');
            $table->string('refer', 255)->nullable()->comment('来源');
            $table->enum('res_type', ['goods', 'article'])->default('goods')->comment('搜索结果类型');
            $table->integer('last_modify')->unsigned()->nullable()->comment('更新时间');
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
        Schema::dropIfExists(config('dbschema.databases.goods_keywords_tables'));
    }
}
