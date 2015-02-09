<?php
class NationalityTableSeeder extends Seeder {

    public function run()
    {
        DB::table('nationalities')->truncate();

        $nationalities = [
            'Argentina',
            'Brasileña',
            'Caribeña',
            'Chilena',
            'Colombiana',
            'Latina',
            'Paraguaya',
            'Uruguaya',
            'Venezolana'
        ];

        foreach($nationalities as $nationality):
            Nationality::create(['name' => $nationality]);
        endforeach;
    }

}