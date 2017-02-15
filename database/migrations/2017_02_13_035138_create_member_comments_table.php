<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_comments', function (Blueprint $table) {
            $table->increments('comment_id')->unsigned()->comment("评论id");
            $table->mediumInteger("for_comment_id",8)->nullable()->comment("对m的回复");
            $table->unsignedBigInteger("type_id",20)->nullable()->comment("名称");
            $table->unsignedMediumInteger("product_id",8)->nullable()->comment("货品ID");
            $table->unsignedBigInteger("order_id",20)->nullable()->comment("订单编号");
            $table->enum("object_type",['ask','discuss','buy','message','msg','order'])->comment("类型");
            $table->mediumInteger("author_id",8)->nullable()->comment("作者ID");
            $table->string("author",100)->nullable()->comment("发表人");
            $table->string("contact",255)->nullable()->comment("联系方式");
            $table->enum("mem_read_status",['false','true'])->nullable()->comment("会员阅读标识");
            $table->enum("adm_read_status",['false','true'])->nullable()->comment("管理阅读标识");
            $table->unsignedInteger("time",10)->nullable()->comment("时间");
            $table->unsignedInteger("lastreply",10)->nullable()->comment("最后回复时间");
            $table->string("reply_name",100)->nullable()->comment("最后回复人");
            $table->enum("inbox",['true','false'])->nullable()->comment("收件箱");
            $table->enum("track",['true','false'])->nullable()->comment("发件箱");
            $table->enum("has_sent",['true','false'])->nullable()->comment("是否发送");
            $table->mediumInteger("to_id",8)->comment("目标会员序号ID");
            $table->string("to_uname",100)->comment("目标会员姓名");
            $table->string("title",255)->comment("标题");
            $table->longText("comment")->nullable()->comment("内容");
            $table->string("ip",15)->nullable()->comment("ip地址");
            $table->enum("display",['true','false'])->nullable()->comment("前台是否显示");
            $table->string("gask_type",50)->nullable()->comment("前台是否显示");
            $table->longText("addon")->nullable()->comment("序列化");
            $table->tinyInteger("p_index")->nullable()->comment("弃用");
            $table->enum("disable",['false','true'])->nullable()->comment("是否失效");
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
        Schema::dropIfExists('member_comments');
    }
}
