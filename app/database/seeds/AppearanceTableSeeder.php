<?php
class AppearanceTableSeeder extends Seeder {

    public function run()
    {
        DB::table('appearances')->truncate();

        $appearances = [
            'Tetonas',
            'Culonas',
            'Rellenita',
            'Altas',
            'Bajitas',
            'Rubias',
            'Pelirrojas',
            'Morenas',
            'Negras'
        ];

        foreach($appearances as $appearance):
            Appearance::create(['name' => $appearance]);
        endforeach;
    }

}