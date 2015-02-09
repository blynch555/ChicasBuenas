<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEscortsPhotosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('escorts_photos', function($table)
		{
		    $table->increments('id');
		    $table->timestamps();
		    $table->integer('escort_id');
		    $table->string('filename');
		    $table->string('in_aws')->default('No');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('escorts_photos');
	}

}
