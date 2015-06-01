<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TablaClientesVentas extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('clientes_ventas',function($table) {                
        $table->increments('id');

        $table->integer('id_venta')->unsigned();
        $table->foreign('id_venta')->references('id')->on('ventas')->onDelete('cascade');

        $table->integer('id_cliente')->unsigned();
        $table->foreign('id_cliente')->references('id')->on('clientes')->onDelete('cascade');
      });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('clientes_ventas');
  }
}
