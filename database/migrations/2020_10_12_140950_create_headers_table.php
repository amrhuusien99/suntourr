<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHeaderTable extends Migration {

	public function up()
	{
		Schema::create('headers', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('background');
			$table->string('hotel');
			$table->string('country');
			$table->string('average_price');
		});
	}

	public function down()
	{
		Schema::drop('headers');
	}
}