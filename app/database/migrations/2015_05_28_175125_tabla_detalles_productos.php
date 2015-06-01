<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TablaDetallesProductos extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {

    Schema::create('detalles_productos',function($table) {                
        $table->increments('id');

        $table->integer('id_producto')->unsigned();
        $table->foreign('id_producto')->references('id')->on('productos')->onDelete('cascade');

        $table->integer('id_detalle')->unsigned();
        $table->foreign('id_detalle')->references('id')->on('detalles')->onDelete('cascade');
      });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('detalles_productos');
  }
}
