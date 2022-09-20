<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeederProductos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('catalogos')->insert([
            'nombreProducto' => 'Pulsera de corazón rojo',
            'descripcion' => 'Pulsera dorada con corazón rojo',
            'precio' => 230,
            'disponibilidad' => 2,
            'stock' => 12,
            'tipo' => 'pulsera',
            'imagen' => 'Picture3.png',
            'image_alt' => 'Pulsera de corazón rojo',
            'borrado' => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('catalogos')->insert([
            'nombreProducto' => 'Collar de diferentes estilos',
            'descripcion' => 'Collar de diferentes estilos para toda ocasión (uno por compra)',
            'precio' => 250,
            'disponibilidad' => 1,
            'stock' => 2,
            'tipo' => 'collar',
            'imagen' => 'Picture4.png',
            'image_alt' => 'Collares de diferentes estilos',
            'borrado' => 0,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('catalogos')->insert([
            'nombreProducto' => 'Aretes de brillantes blancos',
            'descripcion' => 'Aretes elegantes con brillante blanco',
            'precio' => 350,
            'disponibilidad' => 3,
            'stock' => 12,
            'tipo' => 'aretes',
            'imagen' => 'Picture5.png',
            'image_alt' => 'Aretes de brillante blanco',
            'borrado' => 0,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('catalogos')->insert([
            'nombreProducto' => 'Anillo de nudo',
            'descripcion' => 'Anillo con baño en oro en forma de nudo',
            'precio' => 300,
            'disponibilidad' => 1,
            'stock' => 12,
            'tipo' => 'anillo',
            'imagen' => 'Picture6.png',
            'image_alt' => 'Anillo nudo',
            'borrado' => 0,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('catalogos')->insert([
            'nombreProducto' => 'Aretes de flores',
            'descripcion' => 'Aretes de flores dorados con piedra en el centro',
            'precio' => 120,
            'disponibilidad' => 1,
            'stock' => 10,
            'tipo' => 'aretes',
            'imagen' => 'Picture2.png',
            'image_alt' => 'Aretes de flores',
            'borrado' => 0,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('catalogos')->insert([
            'nombreProducto' => 'Anillo perlas',
            'descripcion' => 'Anillo de perlas de diferentes colores, para cualquier ocasión',
            'precio' => 240,
            'disponibilidad' => 1,
            'stock' => 15,
            'tipo' => 'anillo',
            'imagen' => 'Picture1.png',
            'image_alt' => 'Anillos de perlas',
            'borrado' => 0,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('catalogos')->insert([
            'nombreProducto' => 'Collar LOVE',
            'descripcion' => 'Collar con baño de oro con colguije de LOVE',
            'precio' => 220,
            'disponibilidad' => 1,
            'stock' => 5,
            'tipo' => 'collar',
            'imagen' => 'Picture8.png',
            'image_alt' => 'Collar de LOVE',
            'borrado' => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }
}
