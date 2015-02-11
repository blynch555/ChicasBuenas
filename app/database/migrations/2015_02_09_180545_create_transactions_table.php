<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('transactions', function($table)
		{
		    $table->increments('id');
		    $table->timestamps();
		    $table->string('type');
		    $table->integer('transactionable_id');
		    $table->string('transactionable_type');
		    $table->datetime('request_date');
		    $table->datetime('purchase_date');
		    $table->string('description');
		    $table->integer('credits');
		    $table->integer('amount');
		    $table->string('email');
		    $table->string('flow_number');
		    $table->string('status');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('transactions');
	}

}
