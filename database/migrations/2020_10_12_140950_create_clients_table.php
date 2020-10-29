<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientsTable extends Migration {

	public function up()
	{
		Schema::create('clients', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->string('email')->unique();
			$table->string('phone')->unique();
			$table->string('photo');
			$table->string('password');
			$table->string('api_token')->nullable();
			$table->integer('pin_code')->nullable();
			$table->integer('governorate_id')->unsigned();
			$table->integer('is_activate')->default('0');
		});
	}

	public function down()
	{
		Schema::drop('clients');
	}
}