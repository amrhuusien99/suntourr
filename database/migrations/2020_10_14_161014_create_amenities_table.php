<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAmenitiesTable extends Migration {

	public function up()
	{
		Schema::create('amenities', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->integer('hotel_id')->unsigned();
			$table->integer('section_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('amenities');
	}
}