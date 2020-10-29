<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOffersTable extends Migration {

	public function up()
	{
		Schema::create('offers', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('front_image');
			$table->string('images');
			$table->string('title');
			$table->string('content');
			$table->string('from');
			$table->string('to');
			$table->integer('hotel_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('offers');
	}
}