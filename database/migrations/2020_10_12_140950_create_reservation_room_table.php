<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReservationRoomTable extends Migration {

	public function up()
	{
		Schema::create('reservation_room', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('reservation_id')->unsigned();
			$table->integer('room_id')->unsigned();
			$table->integer('room_quantity');
		});
	}

	public function down()
	{
		Schema::drop('reservation_room');
	}
}