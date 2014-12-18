<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePictureComments extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('picture_comments', function($table)
		{
			$table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
  			$table->integer('user_id')->unsigned();            
            $table->integer('picture_id')->unsigned();
  			$table->text('comment');
  			$table->timestamps();
  			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('picture_id')->references('id')->on('pictures')->onDelete('cascade')->onUpdate('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('picture_comments');
	}

}
