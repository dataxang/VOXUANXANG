<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblUser extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		//
		Schema::drop('User');
		Schema::create('User',function($table){
			$table->increments('user_id');
			$table->foreign('employeetype_id')->references('employeetype_id')->on('employeetype');
			$table->string('username');
			$table->string('password');
			$table->string('lastname');
			$table->string('firstname');
			$table->boolean('IsAccountant');
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
		//
	}

}
