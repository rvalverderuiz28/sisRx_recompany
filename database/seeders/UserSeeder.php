<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nombre' => 'User',
            'apellido_paterno' => 'demo',
            'apellido_materno' => '',
            'direccion' => 'casa',
            'dni' => '99999999',
            'sexo' => 'MASCULINO',
            'fecha_contratacion' => '2020-02-01',
            'fecha_nacimiento' => '1992-02-28',
            'email' => 'correo@correo.com',
            'rol' => 'Administrador',
            'email_verified_at' => now(),
            'password' => bcrypt('123456789'), // password
            'remember_token' => Str::random(10),
            'celular' => '909909909',
            'profile_photo_path' => 'logo.jpeg', 
            'estado' => '1',
        ]);//->assignRole('Administrador');
    }
}