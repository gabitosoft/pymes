<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TablaDetalles extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		
      Schema::create('detalles',function($table)
      {                
		$table->increments('id');
        $table->datetime('fecha_venc_detalles');
        $table->datetime('fecha_elab_detalles');
        
	  });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('detalles');
	}

}
