<?php
class WaxingTableSeeder extends Seeder {

    public function run()
    {
        DB::table('waxings')->truncate();

        Waxing::create(['name' => 'Completa']);
        Waxing::create(['name' => 'Rebaje Corto']);
        Waxing::create(['name' => 'Natural']);

    }

}