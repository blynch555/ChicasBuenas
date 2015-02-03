<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table)
		{
		    $table->increments('id');
		    $table->timestamps();
		    $table->rememberToken();

		    $table->string('name');
		    $table->string('username');
		    $table->string('email');
		    $table->string('password', 60);
		    $table->string('validation', 60)->nullable();
		    $table->string('phone')->nullable();
		    $table->string('profile')->default('Usuario');
		    $table->string('status')->default('Validación');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('users');
	}

}
