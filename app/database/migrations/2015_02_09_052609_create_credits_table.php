<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreditsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('escorts_credits', function($table)
		{
		    $table->increments('id');
		    $table->timestamps();
		    $table->integer('escort_id');
		    $table->datetime('purchase_date');
		    $table->string('type');
		    $table->integer('amount');
		    $table->datetime('duedate');
		    $table->integer('balance');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('escorts_credits');
	}

}
