<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDirectoryContactTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('directory_contacts', function($table)
		{
		    $table->increments('id');
		    $table->timestamps();
		    $table->string('name');
		    $table->string('phone');
		    $table->string('contacted')->default('No');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('directory_contacts');
	}

}
