<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEscortsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('escorts', function($table)
		{
		    $table->increments('id');
		    $table->timestamps();
		    $table->integer('user_id');

		    $table->string('name');
		    $table->date('birthday');
		    $table->string('category');
		    $table->text('description');
		    $table->string('phone');
		    $table->integer('district_id');
		    $table->string('hourly');
		    $table->float('heigth');
		    $table->integer('weight');
		    $table->integer('busts');
		    $table->integer('waist');
		    $table->integer('hip');
		    $table->integer('waxing_id');
		    $table->string('at_apartment', 2);
		    $table->string('at_hotel', 2);
		    $table->string('at_home', 2);
		    $table->string('at_travel', 2);
		    $table->integer('service_type_id');
		    $table->float('price');
		    $table->string('promotion', 2);
		    $table->float('promotion_price');
		    $table->string('promotion_time');
		    $table->integer('nationality_id');
		    $table->string('status')->default('Pendiente Certificación');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('escorts');
	}

}
