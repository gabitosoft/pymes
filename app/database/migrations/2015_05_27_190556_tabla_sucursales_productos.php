<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TablaSucursalesProductos extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('sucursales_productos',function($table) {                
        $table->increments('id');

        $table->integer('unidad_sucursal_producto');
        $table->integer('id_sucursal')->unsigned();
        $table->foreign('id_sucursal')->references('id')->on('sucursales')->onDelete('cascade');

        $table->integer('id_producto')->unsigned();
        $table->foreign('id_producto')->references('id')->on('productos')->onDelete('cascade');
      });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('sucursales_compras');
  }
}
