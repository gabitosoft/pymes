<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TablaDetallesCompras extends Migration {

/**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {

    Schema::create('detalles_compras',function($table) {                
        $table->increments('id');
        $table->integer('unidad_compra');
        
        $table->integer('id_compra')->unsigned();
        $table->foreign('id_compra')->references('id')->on('compras')->onDelete('cascade');

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

    Schema::dropIfExists('detalles_compras');
  }
}
