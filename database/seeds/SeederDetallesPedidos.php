<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeederDetallesPedidos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('detalles_pedidos')->insert([
            'clientes_id' => 2,
            'pedidos_id' => 1,
            'productos' => '{"1":{"identificador":1,"nombre":"Pulsera de coraz\u00f3n rojo","precio":230,"cantidad":1,"imagen":"Picture3.png"},"4":{"identificador":4,"nombre":"Anillo de nudo","precio":300,"cantidad":1,"imagen":"Picture6.png"},"6":{"identificador":6,"nombre":"Anillo perlas","precio":240,"cantidad":"5","imagen":"Picture1.png"}}',
            'total' => 1730,
            'metodoEntrega' => 'Paquetería',
            'lugarEntrega' => 'Xilitla, SLP',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('detalles_pedidos')->insert([
            'clientes_id' => 2,
            'pedidos_id' => 2,
            'productos' => '{"2":{"identificador":2,"nombre":"Collar de diferentes estilos","precio":250,"cantidad":1,"imagen":"Picture4.png"}}',
            'total' => 250,
            'metodoEntrega' => 'Personal',
            'lugarEntrega' => 'PT',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('detalles_pedidos')->insert([
            'clientes_id' => 2,
            'pedidos_id' => 3,
            'productos' => '{"2":{"identificador":2,"nombre":"Collar de diferentes estilos","precio":250,"cantidad":5,"imagen":"Picture4.png"},"4":{"identificador":4,"nombre":"Anillo de nudo","precio":300,"cantidad":2,"imagen":"Picture6.png"},"5":{"identificador":5,"nombre":"Aretes de flores","precio":120,"cantidad":1,"imagen":"Picture2.png"}}',
            'total' => 1970,
            'metodoEntrega' => 'Personal',
            'lugarEntrega' => 'PT',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('detalles_pedidos')->insert([
            'clientes_id' => 2,
            'pedidos_id' => 4,
            'productos' => '{"4":{"identificador":4,"nombre":"Anillo de nudo","precio":300,"cantidad":"10","imagen":"Picture6.png"}}',
            'total' => 3000,
            'metodoEntrega' => 'Personal',
            'lugarEntrega' => 'PC',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('detalles_pedidos')->insert([
            'clientes_id' => 2,
            'pedidos_id' => 5,
            'productos' => '{"2":{"identificador":2,"nombre":"Collar de diferentes estilos","precio":250,"cantidad":"10","imagen":"Picture4.png"},"4":{"identificador":4,"nombre":"Anillo de nudo","precio":300,"cantidad":1,"imagen":"Picture6.png"},"5":{"identificador":5,"nombre":"Aretes de flores","precio":120,"cantidad":1,"imagen":"Picture2.png"}}',
            'total' => 2920,
            'metodoEntrega' => 'Personal',
            'lugarEntrega' => 'PC',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('detalles_pedidos')->insert([
            'clientes_id' => 2,
            'pedidos_id' => 6,
            'productos' => '{"2":{"identificador":2,"nombre":"Collar de diferentes estilos","precio":250,"cantidad":1,"imagen":"Picture4.png"},"4":{"identificador":4,"nombre":"Anillo de nudo","precio":300,"cantidad":1,"imagen":"Picture6.png"}}',
            'total' => 550,
            'metodoEntrega' => 'Personal',
            'lugarEntrega' => 'PC',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('detalles_pedidos')->insert([
            'clientes_id' => 2,
            'pedidos_id' => 7,
            'productos' => '{"4":{"identificador":4,"nombre":"Anillo de nudo","precio":300,"cantidad":1,"imagen":"Picture6.png"},"5":{"identificador":5,"nombre":"Aretes de flores","precio":120,"cantidad":1,"imagen":"Picture2.png"}}',
            'total' => 420,
            'metodoEntrega' => 'Personal',
            'lugarEntrega' => 'PT',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }
}
