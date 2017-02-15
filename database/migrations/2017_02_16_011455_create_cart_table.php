<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCartTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cart', function(Blueprint $table)
		{
			$table->bigInteger('cart_id', true)->unsigned()->comment('序号');
			$table->string('member_ident', 50)->comment('会员ident');
			$table->text('params')->comment('购物车对象参数');
//			$table->primary(['cart_id','member_ident']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cart');
	}

}
