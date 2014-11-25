<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TablaUsuarios extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		 Schema::create('usuarios',function($table)
      {                
		$table->increments('id');
        $table->string('nombre_usuarios');
        $table->string('login_usuarios');
        $table->string('passsword_usuarios');  
        $table->integer('ci_usuarios');
        $table->integer('telefono_usuarios');
       
	  });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('usuarios');
	}

}
