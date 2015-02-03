<?php
class CityTableSeeder extends Seeder {

    public function run()
    {
        DB::table('cities')->truncate();

        $cities = [
            'Región Metropolitana',
            'Arica',
            'Tarapacá',
            'Antofagasta',
            'Atacama',
            'Coquimbo',
            'Valparaíso',
            'Lib. Gral. Bernardo OHiggins',
            'Maule',
            'Biobio',
            'Araucanía',
            'Los Ríos',
            'Los Lagos',
            'Aysén',
            'Magallanes'
        ];

        foreach($cities as $city):
            City::create(['name' => $city, 'slug' => Str::slug($city)]);
        endforeach;
    }

}