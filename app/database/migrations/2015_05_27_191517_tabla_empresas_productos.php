<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TablaEmpresasProductos extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    
    Schema::create('empresas_productos',function($table) {                
        $table->increments('id');

        $table->integer('id_empresa')->unsigned();
        $table->foreign('id_empresa')->references('id')->on('empresas')->onDelete('cascade');

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
    Schema::dropIfExists('empresas_productos');
  }

}
