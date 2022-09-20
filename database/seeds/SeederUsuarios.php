<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeederUsuarios extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Zurisadai',
            'apellidoP' => 'Torres',
            'apellidoM' => 'García',
            'email' => 'holi@hotmail.com',
            'metodoContacto' => 'Facebook',
            'usuarioContacto' => 'holi',
            'tipo' => 0,
            'password' => Hash::make('holiaiuda'),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('users')->insert([
            'name' => 'Zurisadai2',
            'apellidoP' => 'Torres',
            'apellidoM' => 'García',
            'email' => 'holi2@hotmail.com',
            'metodoContacto' => 'Facebook',
            'usuarioContacto' => 'holi',
            'tipo' => 1,
            'password' => Hash::make('holiaiuda'),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }
}
