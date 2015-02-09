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
        	'password' => Hash::make('Passw0rd'),
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
            'password' => Hash::make('Passw0rd'),
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
            'password' => Hash::make('Passw0rd'),
            'validation' => '',
            'phone' => '',
            'profile' => 'Usuario',
            'status' => 'Activo'
        ]);

        // Agencia
        User::create([
            'name' => 'Agencia Hot',
            'username' => 'agencia',
            'email' => 'agencia@gmail.com',
            'password' => Hash::make('Passw0rd'),
            'validation' => '',
            'phone' => '56987144166',
            'profile' => 'Agencia',
            'status' => 'Activo'
        ]);
    }

}