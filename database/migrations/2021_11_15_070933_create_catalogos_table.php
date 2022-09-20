<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatalogosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catalogos', function (Blueprint $table) {
            $table->id();
            $table->string('nombreProducto', 100);
            $table->string('descripcion');
            $table->float('precio');
            $table->integer('disponibilidad');
            $table->integer('stock');
            $table->string('tipo');
            $table->string('imagen')->nullable();
            $table->string('image_alt');
            $table->integer('borrado')->default('0');
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
        Schema::dropIfExists('catalogos');
    }
}
