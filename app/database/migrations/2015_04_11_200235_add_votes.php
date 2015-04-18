<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddVotes extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('usuario', function(Blueprint $table)
		{
                    $table->increments('id');
                    $table->string('nombre');
                    $table->string('correo');
                    $table->string('password');                    
                    $table->timestamps();
                    $table->rememberToken();
                });
                Schema::create('publicacion', function(Blueprint $table)
		{
                    $table->increments('id');
                    $table->text('publicacion');
                    //$table->string('correo');
                    $table->boolean('tipo');
                    $table->integer('usuario_id')->unsigned();
                    $table->integer('padre')->unsigned()->nullable();
                    $table->foreign('usuario_id')->references('id')->on('usuario');
                    $table->foreign('padre')->references('id')->on('publicacion');
                    $table->timestamps();
                });
                Schema::create('me_gusta', function(Blueprint $table)
		{
			$table->increments('id');
                        $table->integer('publicacion_id')->unsigned();
                        $table->integer('usuario_id')->unsigned();
                        $table->foreign('publicacion_id')->references('id')->on('publicacion');
                        $table->foreign('usuario_id')->references('id')->on('usuario');
                        $table->timestamps();    
		});
                DB::table('usuario')
                        ->insert([
                           'nombre'=>'Sergio',
                           'correo'=>'chechin3012@hotmail.com',
                           'password'=>Hash::make('987')                            
                        ]);
    }
		
	

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('me_gusta');
                Schema::drop('publicacion');
                Schema::drop('usuario');
		

}
}