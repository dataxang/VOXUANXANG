<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Weeklysalary extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('weeklysalary',function($table){
			$table->increments('id');
			$table->foreign('user_id')->references('employeetype_id')->on('user');
			$table->integer('basic_salary');
			$table->integer('worked_hour');
			$table->integer('gross_sale');
			$table->float('commission_rate');
			$table->integer('gross_salary');
			$table->integer('net_salary');
			$table->string('comment');
			$table->datetime('created_date');
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
