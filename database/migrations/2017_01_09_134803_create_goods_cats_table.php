<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsCatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('dbschema.databases.goods_cats_tables'), function (Blueprint $table) {
            Schema::create(config('dbschema.databases.goods_cats_tables'), function (Blueprint $table) {
                $table->increments('cat_id')->unsigned()->comment('分类ID');
                $table->integer('parent_id')->unsigned()->comment('上级分类');
                $table->integer('type_id')->comment('类型序号');
                $table->string('name',50)->unique()->comment('分类名称');
                $table->boolean('is_leaf')->default(false)->comment('是否子节点');
                $table->json('gallery_setting')->nullable()->comment('商品分类设置');
                $table->boolean('disabled')->default(false)->comment('是否隐藏');
                $table->integer('p_order')->default(0)->comment('排序');
                $table->integer('goods_count')->default(0)->comment('商品数');
                $table->string('cat_path',200)->nullable()->comment('分类路径(从根至本结点的路径,逗号分隔,首部有逗号)');
                $table->timestamp();
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(config('dbschema.databases.goods_cats_tables'));
    }
}
