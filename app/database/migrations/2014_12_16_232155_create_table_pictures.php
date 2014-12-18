<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePictures extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pictures', function($table)
		{
			$table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
  			$table->integer('user_id')->unsigned();
  			$table->text('location');
  			$table->text('description');
            $table->timestamps();
  			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('pictures');
	}

}
