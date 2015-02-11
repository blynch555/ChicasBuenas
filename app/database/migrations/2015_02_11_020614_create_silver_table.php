<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSilverTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('silvers', function($table)
		{
		    $table->increments('id');
		    $table->timestamps();
		    $table->integer('transaction_id');
		    $table->datetime('purchase_date');
		    $table->string('purchase_email');

		    $table->string('title');
		    $table->string('details', 1000);
			$table->string('filename');
			$table->string('in_aws')->default('No');
			$table->string('phone');

			$table->string('hash');
		    
		    $table->string('status')->default('Pendiente');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('silvers');
	}

}
