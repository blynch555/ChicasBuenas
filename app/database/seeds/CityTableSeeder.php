<?php
class CityTableSeeder extends Seeder {

    public function run()
    {
        DB::table('cities')->truncate();

        $cities = [
            'Santiago',
            'Arica',
            'Tarapacá',
            'Antofagasta',
            'Atacama',
            'Coquimbo',
            'Valparaíso',
            'L.G. Bernardo OHiggins',
            'Maule',
            'Biobio',
            'Araucanía',
            'Los Ríos',
            'Los Lagos',
            'Aysén',
            'Magallanes'
        ];

        $i=1;
        foreach($cities as $city):
            City::create([
                'name' => $city,
                'slug' => Str::slug($city),
                'position' => $i
            ]);
        endforeach;
    }

}