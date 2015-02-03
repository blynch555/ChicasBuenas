<?php
class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->truncate();

        // Administrador
        User::create([
        	'name' => 'Administrador',
            'username' => 'admin',
        	'email' => 'kattatzu@gmail.com',
        	'password' => Hash::make('tengo2hbB'),
        	'validation' => '',
        	'phone' => '56912345678',
            'profile' => 'Administrador',
        	'status' => 'Activo'
        ]);

        // Escort
        User::create([
            'name' => 'Paulina',
            'username' => 'paulina',
            'email' => 'escort@gmail.com',
            'password' => Hash::make('tengo2hbB'),
            'validation' => '',
            'phone' => '56987144166',
            'profile' => 'Escort',
            'status' => 'Activo'
        ]);

        // Usuario
        User::create([
            'name' => 'Andres',
            'username' => 'andres',
            'email' => 'andres@gmail.com',
            'password' => Hash::make('tengo2hbB'),
            'validation' => '',
            'phone' => '',
            'profile' => 'Usuario',
            'status' => 'Activo'
        ]);
    }

}