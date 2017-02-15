<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEctoolsRefundsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ectools_refunds', function(Blueprint $table)
		{
			$table->string('refund_id', 20)->default('')->primary()->comment('退款单号');
			$table->decimal('money', 20)->default(0.00);
			$table->decimal('cur_money', 20)->default(0.00)->comment('支付金额');
			$table->string('member_id', 100)->nullable()->comment('会员用户名');
			$table->string('account', 50)->nullable()->comment('收款账号');
			$table->string('bank', 50)->nullable()->comment('收款银行');
			$table->string('pay_account', 50)->nullable()->comment('支付账户');
			$table->string('currency', 10)->nullable()->comment('货币');
			$table->decimal('paycost', 20)->nullable()->comment('支付网关费用');
			$table->enum('pay_type', array('online','offline','deposit'))->default('online')->comment('支付类型');
			$table->enum('status', array('succ','failed','cancel','error','invalid','progress','timeout','ready'))->default('ready')->comment('支付状态');
			$table->string('pay_name', 100)->nullable();
			$table->string('pay_ver', 50)->nullable()->comment('支付版本号');
			$table->integer('op_id')->unsigned()->nullable()->comment('操作员');
			$table->string('refund_bn', 32)->nullable()->default('')->comment('退款唯一单号');
			$table->string('pay_app_id', 100)->default('0')->comment('支付方式');
			$table->integer('t_begin')->unsigned()->nullable()->comment('支付开始时间');
			$table->integer('t_payed')->unsigned()->nullable()->comment('支付完成时间');
			$table->integer('t_confirm')->unsigned()->nullable()->comment('支付确认时间');
			$table->text('memo')->nullable()->comment('备注');
			$table->enum('disabled', array('true','false'))->nullable()->default('false')->index('ind_disabled');
			$table->string('trade_no', 30)->nullable()->comment('退款单交易编号');
			$table->string('return_id', 50)->nullable()->comment('售后服务单ID');
			$table->string('op_useraccount', 50)->nullable()->comment('退货通知审核人编码');
			$table->string('op_username', 50)->nullable()->comment('退货通知审核人姓名');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ectools_refunds');
	}

}
