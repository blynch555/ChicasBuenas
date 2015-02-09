<?php
class EscortTableSeeder extends Seeder {

    public function run()
    {
        DB::table('escorts')->truncate();

        Escort::create([
            'user_id' => 2,
        	'name' => 'Paulina',
            'birthday' => '1988-12-12',
            'category' => 'VIP',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tellus nunc, semper eget ultricies ac, pulvinar eget turpis. Duis varius vestibulum sapien, id dapibus turpis sodales ac. Ut ultrices ligula elit, vel sodales nisi tincidunt non. In hac habitasse platea dictumst. Ut fringilla mauris eget leo fermentum sagittis. Etiam et urna nec mi tristique semper. Phasellus vulputate, lorem sit amet blandit mollis, magna lectus dictum nibh, et facilisis mi mi sit amet turpis. Praesent non bibendum lectus.',
            'phone' => '87144166',
            'city_id' => 1,
            'district_id' => 23,
            'hourly' => 'Lunes a viernes',
            'hourly_time_begin' => '18:00',
            'hourly_time_end' => '00:00',
            'heigth' => 1.67,
            'weight' => 57,
            'busts' => 90,
            'waist' => 60,
            'hip' => 90,
            'waxing_id' => 1,
            'at_apartment' => 'Si',
            'at_hotel' => 'Si',
            'at_home' => 'Si',
            'at_travel' => 'No',
            'service_type_id' => 3,
            'price' => 75000,
            'promotion' => 'Si',
            'promotion_price' => 50000,
            'promotion_time' => '1 hora',
            'nationality_id' => 4,
            'featured' => 'Si',
            'status' => 'Certificada'
        ]);

        for($i=1; $i<=32; $i++):
            EscortService::create(['escort_id' => 1, 'service_id' => $i]);
        endfor;

        EscortAppearance::create(['escort_id' => 1, 'appearance_id' => 1]);
        EscortAppearance::create(['escort_id' => 1, 'appearance_id' => 2]);
        EscortAppearance::create(['escort_id' => 1, 'appearance_id' => 4]);
        EscortAppearance::create(['escort_id' => 1, 'appearance_id' => 8]);
    }

}