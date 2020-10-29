<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHotelsTable extends Migration {

	public function up()
	{
		Schema::create('hotels', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->string('email')->unique();
			$table->string('phone')->unique();
			$table->string('password');
			$table->enum('state', array('open', 'close'))->default('close');
			$table->enum('section', array('normal', 'inPage', 'header'))->default('normal');
			$table->enum('section', array('popular', 'unpopular'))->default('unpopular');
			$table->string('photo');
			$table->string('temperature');
			$table->string('whats_app')->unique()->nullable();
			$table->string('average_price');
			$table->decimal('longitude', 10,8);
			$table->decimal('latitude', 10,8);
			$table->integer('is_activate')->default('0');
			$table->integer('pin_code')->nullable();
			$table->integer('governorate_id')->unsigned();
			$table->integer('category_id')->unsigned();
			$table->integer('api_token')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('hotels');
	}
}