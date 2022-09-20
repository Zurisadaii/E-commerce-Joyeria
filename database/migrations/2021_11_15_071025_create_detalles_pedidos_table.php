<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallesPedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalles_pedidos', function (Blueprint $table) {
            $table->id();
            //$table->unsignedBigInteger('catalogo_id');
            //$table->unsignedBigInteger('pedidos_id');
            $table->foreignId('clientes_id')->constrained('users');
            //$table->foreign('catalogo_id')->references('id')->on('catalogos');
            //$table->foreign('pedidos_id')->references('id')->on('pedidos');
            $table->foreignId('pedidos_id')->constrained('pedidos');
            $table->string('productos', 1000);
            $table->double('total');
            $table->string('metodoEntrega');
            $table->string('lugarEntrega');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalles_pedidos');
    }
}
