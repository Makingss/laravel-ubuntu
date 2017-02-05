<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsKeywordablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('dbschema.databases.goods_keywordables_tables'), function (Blueprint $table) {
            $table->increments('id');
            $table->integer('goods_keywordable_id')->unsigned()->comment('关键字ID');
            $table->string('goods_keywordable_type')->comment('关系');
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
        Schema::create(config('dbschema.databases.goods_keywordables_tables'), function (Blueprint $table) {
            //
        });
    }
}
