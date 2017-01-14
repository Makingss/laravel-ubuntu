<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpecValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('dbschema.databases.spec_values_tables'), function (Blueprint $table) {
            $table->increments('spec_value_id')->unsigned()->comment('规格值ID');
            $table->integer('spec_id')->unsigned()->comment('规格ID');
            $table->string('spec_value',255)->comment('规格值');
            $table->string('alias',255)->nullable()->comment('规格别名');
            $table->string('spec_image',32)->nullable()->comment('图片规格');
            $table->integer('p_order')->unsigned()->comment('排序');
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
        Schema::dropIfExists(config('dbschema.databases.spec_values_tables'));
    }
}
