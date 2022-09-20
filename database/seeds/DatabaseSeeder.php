<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SeederUsuarios::class);
        $this->call(SeederProductos::class);
        $this->call(SeederPedidos::class);
        $this->call(SeederDetallesPedidos::class);
    }
}
