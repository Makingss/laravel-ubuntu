<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaintingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paintings', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->comment('ID')->change();
            $table->integer('painter_id')->comment('painter_id')->change();
            $table->string('title')->comment('标题')->change();
            $table->text('body')->comment('内容')->change();
            $table->timestamp('completed_at')->comment('发布时间')->change();
            #$table->timestamp('created_at');
            #$table->timestamp('updated_at');
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
        Schema::dropIfExists('paintings');
    }
}
