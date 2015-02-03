<?php
class ServiceTypeTableSeeder extends Seeder {

    public function run()
    {
        DB::table('service_types')->truncate();

        ServiceType::create(['name' => 'Normales']);
        ServiceType::create(['name' => 'Normales y adicionales']);
        ServiceType::create(['name' => 'Normales y completos (adicional)']);
        ServiceType::create(['name' => 'Completos (colita incluida)']);
        ServiceType::create(['name' => 'Masajes sensitivos']);
        ServiceType::create(['name' => 'Masajes eróticos']);
    }

}