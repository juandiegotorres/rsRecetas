<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = User::create([
            'name' => 'Juan',
            'email' => 'correo@correo.com',
            'password' => Hash::make('123123'),
            'url' => 'http://www.pagina.com',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);


        // $user->perfil()->create();


        $user2 = User::create([
            'name' => 'Diego',
            'email' => 'correo2@correo.com',
            'password' => Hash::make('123123'),
            'url' => 'http://www.pagina1.com',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        // $user2->perfil()->create();
    }
}
