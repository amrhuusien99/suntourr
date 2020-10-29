<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSettingsTable extends Migration {

	public function up()
	{
		Schema::create('settings', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('phone');
			$table->string('whats_app');
			$table->string('facebook');
			$table->string('gmail');
			$table->string('insta');
			$table->string('commission');
			$table->string('bank_name');
			$table->string('about_us');
			$table->string('app_link');
		});
	}

	public function down()
	{
		Schema::drop('settings');
	}
}