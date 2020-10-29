<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRoomsTable extends Migration {

	public function up()
	{
		Schema::create('rooms', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('title');
			$table->string('content');
			$table->string('max_in_room');
			$table->string('options');
			$table->integer('today_price');
			$table->string('front_image');
			$table->string('images');
			$table->integer('hotel_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('rooms');
	}
}