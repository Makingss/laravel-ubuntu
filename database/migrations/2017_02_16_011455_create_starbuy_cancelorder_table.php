<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStarbuyCancelorderTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('starbuy_cancelorder', function(Blueprint $table)
		{
			$table->bigInteger('order_id')->unsigned()->nullable();
			$table->integer('canceltime')->unsigned()->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('starbuy_cancelorder');
	}

}
