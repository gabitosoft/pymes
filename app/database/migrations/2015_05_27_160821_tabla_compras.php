<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TablaCompras extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('compras',function($table) {                
        $table->increments('id');
        $table->integer('num_factura_compra');
        $table->dateTime('fecha_recepcion_compra');
        $table->date('fecha_vencimiento_compra');
        $table->float('monto_compra');
        $table->string('estado_compra');

        $table->integer('id_usuario')->unsigned();
        $table->foreign('id_usuario')->references('id')->on('usuarios')->onDelete('cascade');

        $table->integer('id_sucursal')->unsigned();
        $table->foreign('id_sucursal')->references('id')->on('sucursales')->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {

    Schema::dropIfExists('compras');
  }

}
