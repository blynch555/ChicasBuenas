<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		// Params
		$this->call('NationalityTableSeeder');
		$this->call('CityTableSeeder');
		$this->call('DistrictTableSeeder');
		$this->call('WaxingTableSeeder');
		$this->call('ServiceTypeTableSeeder');
		$this->call('ServiceTableSeeder');
		$this->call('AppearanceTableSeeder');

		// Entities
		$this->call('UserTableSeeder');
		$this->call('EscortTableSeeder');
		$this->call('DirectoryContactTableSeeder');
	}

}
