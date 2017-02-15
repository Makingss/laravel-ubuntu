<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMemberCartdeletedTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('member_cartdeleted', function(Blueprint $table)
		{
			$table->bigInteger('member_id')->unsigned()->default(0)->primary()->comment('会员id');
			$table->text('json', 65535)->comment('临时删除购物车');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('member_cartdeleted');
	}

}
