<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;

class UserDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * (2, 'Robert nugent', 'robert.nugent74@gmail.com', NULL, '$2y$10$kcwOQdhaI8orA79.Iba3e.V/QzKQgGIrDcmEsUDlU9joSjCWZSNlW', NULL, 'JvxrPxFzAmxUD2LntQ315SXbbp7u9x1ZgiTWMNMHEQ0Ewjb4P9jCKuMWAGkJ', '2023-05-11 14:18:50', '2023-05-11 14:18:50');

     */
    public function run()
    {
        
        User::create([
            'id' => 1,
            'name' => 'Robert nugent',
            'email' => 'robert.nugent74@gmail.com',
            'email_verified_at' => NULL,
            'password' => '$2y$10$kcwOQdhaI8orA79.Iba3e.V/QzKQgGIrDcmEsUDlU9joSjCWZSNlW',
            'remember_token' => NULL,
            'created_at' => '2023-05-11 14:18:50',
            'updated_at' => '2023-05-11 14:18:50'
        ]);

        User::create([
            'id' => 2,
            'name' => 'Bob Ross',
            'email' => 'bobross@gmail.com',
            'email_verified_at' => NULL,
            'password' => '$2y$10$GbF/hM3FRW0A3djbwAuKNekXYcsqm21lzDY7SRiNzZi1gAONslixq',
            'remember_token' => NULL,
            'created_at' => '2023-05-12 14:18:50',
            'updated_at' => '2023-05-12 14:18:50'
        ]);

        User::create([
            'id' => 3,
            'name' => 'Uncle Ben',
            'email' => 'uncleben@gmail.com',
            'email_verified_at' => NULL,
            'password' => '$2y$10$XYZpLMaijhgE9QVbj88/BuiEs1J6ZF4Kupj3zSl3VjDlBhigezVyO',
            'remember_token' => NULL,
            'created_at' => '2023-05-13 14:18:50',
            'updated_at' => '2023-05-13 14:18:50'
        ]);

    }
}
