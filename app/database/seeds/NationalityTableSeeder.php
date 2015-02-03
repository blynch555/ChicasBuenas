<?php
class NationalityTableSeeder extends Seeder {

    public function run()
    {
        DB::table('nationalities')->truncate();

        $nationalities = [
            'Argentina',
            'Brasileña',
            'Caribeñas',
            'Chilenas',
            'Colombianas',
            'Latinas',
            'Paraguaya',
            'Uruguaya',
            'Venezolana'
        ];

        foreach($nationalities as $nationality):
            Nationality::create(['name' => $nationality]);
        endforeach;
    }

}