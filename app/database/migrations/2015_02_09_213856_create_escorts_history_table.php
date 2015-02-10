<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEscortsHistoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('escorts_history', function($table)
		{
		    $table->increments('id');
		    $table->timestamps();
		    $table->integer('escort_id');
		    $table->integer('transaction_id');
		    $table->integer('credit_id');
		    $table->string('description');
		    $table->integer('credits_total');
		    $table->integer('credits_silver');
		    $table->integer('credits_gold');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('escorts_history');
	}

}
