<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TablaDetalles extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {

    Schema::create('detalles',function($table) {               
        $table->increments('id');
        $table->dateTime('fecha_venc_detalle');
        $table->dateTime('fecha_elab_detalle');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {

    Schema::dropIfExists('detalles');
  }
}
