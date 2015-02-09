<?php
class ServiceTableSeeder extends Seeder {

    public function run()
    {
        DB::table('services')->truncate();

        Service::create(['name' => 'Amiga Para Cuadros']);
        Service::create(['name' => 'Amiga Show Lésbico']);
        Service::create(['name' => 'Atención A Parejas']);
        Service::create(['name' => 'Atención A Regiones']);
        Service::create(['name' => 'Atención Lésbica']);
        Service::create(['name' => 'Bailarina Amateur']);
        Service::create(['name' => 'Bailarina Profesional']);
        Service::create(['name' => 'Besos']);
        Service::create(['name' => 'Beso Negro']);
        Service::create(['name' => 'Cambio De Rol']);
        Service::create(['name' => 'Despedidas De Soltero']);
        Service::create(['name' => 'Discapacitado']);
        Service::create(['name' => 'Dominación']);
        Service::create(['name' => 'Dos Hombres']);
        Service::create(['name' => 'Dos Hombres Full']);
        Service::create(['name' => 'Eventos Y Cenas']);
        Service::create(['name' => 'Fantasías De Disfraces']);
        Service::create(['name' => 'Fiestas Privadas']);
        Service::create(['name' => 'Garganta Profunda']);
        Service::create(['name' => 'Girls That Speak English']);
        Service::create(['name' => 'Juguetes Eróticos']);
        Service::create(['name' => 'Lluvia Dorada']);
        Service::create(['name' => 'Masaje Amateur']);
        Service::create(['name' => 'Masaje Profesional']);
        Service::create(['name' => 'Masaje Prostático']);
        Service::create(['name' => 'Masaje Sensitivo']);
        Service::create(['name' => 'Rusa']);
        Service::create(['name' => 'Sexo Anal']);
        Service::create(['name' => 'Sexo Grupal']);
        Service::create(['name' => 'Sexo Masoquista']);
        Service::create(['name' => 'Sexo Oral Con Condón']);
        Service::create(['name' => 'Sexo Oral Americana']);
        
    }

}