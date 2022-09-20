<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeederPedidos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pedidos')->insert([
            'clientes_id' => 2,
            'total' => 1730,
            'estado' => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('pedidos')->insert([
            'clientes_id' => 2,
            'total' => 250,
            'estado' => 3,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('pedidos')->insert([
            'clientes_id' => 2,
            'total' => 1970,
            'estado' => 3,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('pedidos')->insert([
            'clientes_id' => 2,
            'total' => 3000,
            'estado' => 4,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('pedidos')->insert([
            'clientes_id' => 2,
            'total' => 2920,
            'estado' => 0,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('pedidos')->insert([
            'clientes_id' => 2,
            'total' => 550,
            'estado' => 0,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('pedidos')->insert([
            'clientes_id' => 2,
            'total' => 420,
            'estado' => 0,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }
}
