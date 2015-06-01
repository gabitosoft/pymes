<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TablaVendedoresEmpresas extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('vendedores_empresas',function($table) {                
        $table->increments('id');
        $table->string('nombre_vendedor');
        $table->integer('id_empresa')->unsigned();
        $table->foreign('id_empresa')->references('id')->on('empresas')->onDelete('cascade');
      });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('vendedores_empresas');
  }
}
