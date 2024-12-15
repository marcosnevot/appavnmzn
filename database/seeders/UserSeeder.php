<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Crear el usuario nacho y asignarle el rol 'admin'
        $nacho = User::create([
            'name' => 'nacho',
            'email' => 'nacho@nevotsolano.es',
            'password' => Hash::make('nacho'),
        ]);
        $nacho->assignRole('admin');

        // Crear el usuario isabel y asignarle el rol 'employee'
        $isabel = User::create([
            'name' => 'isabel',
            'email' => 'isabel@avn.com',
            'password' => Hash::make('isabel'),
        ]);
        $isabel->assignRole('employee');

        // Crear el usuario lourdes y asignarle el rol 'employee'
        $lourdes = User::create([
            'name' => 'lourdes',
            'email' => 'lourdes@avn.com',
            'password' => Hash::make('lourdes'),
        ]);
        $lourdes->assignRole('employee');

        // Añadir más usuarios según sea necesario
    }
}