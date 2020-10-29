<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReservationsTable extends Migration {

	public function up()
	{
		Schema::create('reservations', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('notes')->nullable();
			$table->enum('state', array('pending', 'accepted', 'rejected', 'cancel', 'complete'))->default('pending');
			$table->string('cost')->nullable();
			$table->string('days_quantity');
			$table->integer('room_quantity');
			$table->integer('commission')->nullable();
			$table->integer('total_cost')->nullable();
			$table->integer('net')->nullable();
			$table->integer('client_id')->unsigned();
			$table->integer('hotel_id')->unsigned();
			$table->integer('payment_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('reservations');
	}
}