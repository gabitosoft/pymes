<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TablaVentasProductos extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('ventas_productos',function($table) {                
        $table->increments('id');

        $table->integer('id_producto')->unsigned();
        $table->foreign('id_producto')->references('id')->on('productos')->onDelete('cascade');

        $table->integer('id_venta')->unsigned();
        $table->foreign('id_venta')->references('id')->on('ventas')->onDelete('cascade');
      });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('ventas_productos');
  }
}
