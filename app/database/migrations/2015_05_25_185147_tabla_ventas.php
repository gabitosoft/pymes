<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TablaVentas extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
          Schema::create('ventas',function($table) {                
              $table->increments('id');
              $table->dateTime('fecha_venta');
              $table->float('monto_venta');

              $table->integer('id_usuario')->unsigned();
              $table->foreign('id_usuario')->references('id')->on('usuarios')->onDelete('cascade');
            });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
          Schema::dropIfExists('ventas');
	}

}
