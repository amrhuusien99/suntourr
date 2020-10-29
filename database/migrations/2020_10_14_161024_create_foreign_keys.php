<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('hotels', function(Blueprint $table) {
			$table->foreign('governorate_id')->references('id')->on('governorates')
						->onDelete('no action')
						->onUpdate('no action');
		});
		Schema::table('hotels', function(Blueprint $table) {
			$table->foreign('category_id')->references('id')->on('categories')
						->onDelete('no action')
						->onUpdate('no action');
		});
		Schema::table('clients', function(Blueprint $table) {
			$table->foreign('governorate_id')->references('id')->on('governorates')
						->onDelete('no action')
						->onUpdate('no action');
		});
		Schema::table('governorates', function(Blueprint $table) {
			$table->foreign('country_id')->references('id')->on('countries')
						->onDelete('no action')
						->onUpdate('no action');
		});
		Schema::table('carts', function(Blueprint $table) {
			$table->foreign('client_id')->references('id')->on('clients')
						->onDelete('no action')
						->onUpdate('no action');
		});
		Schema::table('carts', function(Blueprint $table) {
			$table->foreign('room_id')->references('id')->on('rooms')
						->onDelete('no action')
						->onUpdate('no action');
		});
		Schema::table('rooms', function(Blueprint $table) {
			$table->foreign('hotel_id')->references('id')->on('hotels')
						->onDelete('no action')
						->onUpdate('no action');
		});
		Schema::table('reservations', function(Blueprint $table) {
			$table->foreign('client_id')->references('id')->on('clients')
						->onDelete('no action')
						->onUpdate('no action');
		});
		Schema::table('reservations', function(Blueprint $table) {
			$table->foreign('hotel_id')->references('id')->on('hotels')
						->onDelete('no action')
						->onUpdate('no action');
		});
		Schema::table('reservations', function(Blueprint $table) {
			$table->foreign('payment_id')->references('id')->on('payment_methods')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('reservation_room', function(Blueprint $table) {
			$table->foreign('reservation_id')->references('id')->on('reservations')
						->onDelete('no action')
						->onUpdate('no action');
		});
		Schema::table('reservation_room', function(Blueprint $table) {
			$table->foreign('room_id')->references('id')->on('rooms')
						->onDelete('no action')
						->onUpdate('no action');
		});
		Schema::table('category_hotel', function(Blueprint $table) {
			$table->foreign('hotel_id')->references('id')->on('hotels')
						->onDelete('no action')
						->onUpdate('no action');
		});
		Schema::table('category_hotel', function(Blueprint $table) {
			$table->foreign('category_id')->references('id')->on('categories')
						->onDelete('no action')
						->onUpdate('no action');
		});
		Schema::table('comments', function(Blueprint $table) {
			$table->foreign('client_id')->references('id')->on('clients')
						->onDelete('no action')
						->onUpdate('no action');
		});
		Schema::table('comments', function(Blueprint $table) {
			$table->foreign('hotel_id')->references('id')->on('hotels')
						->onDelete('no action')
						->onUpdate('no action');
		});
		Schema::table('offers', function(Blueprint $table) {
			$table->foreign('hotel_id')->references('id')->on('hotels')
						->onDelete('no action')
						->onUpdate('no action');
		});
		Schema::table('amenities', function(Blueprint $table) {
			$table->foreign('hotel_id')->references('id')->on('hotels')
						->onDelete('no action')
						->onUpdate('no action');
		});
		Schema::table('amenities', function(Blueprint $table) {
			$table->foreign('sections_id')->references('id')->on('sections_amenities')
						->onDelete('no action')
						->onUpdate('no action');
		});
	}

	public function down()
	{
		Schema::table('hotels', function(Blueprint $table) {
			$table->dropForeign('hotels_governorate_id_foreign');
		});
		Schema::table('hotels', function(Blueprint $table) {
			$table->dropForeign('hotels_category_id_foreign');
		});
		Schema::table('clients', function(Blueprint $table) {
			$table->dropForeign('clients_governorate_id_foreign');
		});
		Schema::table('governorates', function(Blueprint $table) {
			$table->dropForeign('governorates_country_id_foreign');
		});
		Schema::table('carts', function(Blueprint $table) {
			$table->dropForeign('carts_client_id_foreign');
		});
		Schema::table('carts', function(Blueprint $table) {
			$table->dropForeign('carts_room_id_foreign');
		});
		Schema::table('rooms', function(Blueprint $table) {
			$table->dropForeign('rooms_hotel_id_foreign');
		});
		Schema::table('reservations', function(Blueprint $table) {
			$table->dropForeign('reservations_client_id_foreign');
		});
		Schema::table('reservations', function(Blueprint $table) {
			$table->dropForeign('reservations_hotel_id_foreign');
		});
		Schema::table('reservations', function(Blueprint $table) {
			$table->dropForeign('reservations_payment_id_foreign');
		});
		Schema::table('reservation_room', function(Blueprint $table) {
			$table->dropForeign('reservation_room_restaurant_id_foreign');
		});
		Schema::table('reservation_room', function(Blueprint $table) {
			$table->dropForeign('reservation_room_room_id_foreign');
		});
		Schema::table('category_hotel', function(Blueprint $table) {
			$table->dropForeign('category_hotel_hotel_id_foreign');
		});
		Schema::table('category_hotel', function(Blueprint $table) {
			$table->dropForeign('category_hotel_category_id_foreign');
		});
		Schema::table('comments', function(Blueprint $table) {
			$table->dropForeign('comments_client_id_foreign');
		});
		Schema::table('comments', function(Blueprint $table) {
			$table->dropForeign('comments_hotel_id_foreign');
		});
		Schema::table('offers', function(Blueprint $table) {
			$table->dropForeign('offers_hotel_id_foreign');
		});
		Schema::table('amenities', function(Blueprint $table) {
			$table->dropForeign('amenities_hotel_id_foreign');
		});
		Schema::table('amenities', function(Blueprint $table) {
			$table->dropForeign('amenities_sections_id_foreign');
		});
	}
}