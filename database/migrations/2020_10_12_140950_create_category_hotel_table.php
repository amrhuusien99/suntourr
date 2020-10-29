<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCategoryHotelTable extends Migration {

	public function up()
	{
		Schema::create('category_hotel', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('hotel_id')->unsigned();
			$table->integer('category_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('category_hotel');
	}
}