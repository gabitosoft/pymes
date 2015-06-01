<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TablaPagosCompras extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {

    Schema::create('pagos_compras',function($table) {                
        $table->increments('id');
        $table->dateTime('fecha_pago_compra');
        $table->float('monto_pago_compra');
      });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('pagos_compras');
  }
}
