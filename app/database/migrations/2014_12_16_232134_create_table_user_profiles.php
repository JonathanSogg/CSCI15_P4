<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUserProfiles extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_profiles', function($table)
		{
			$table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
  			$table->integer('user_id')->unique()->unsigned();
  			$table->text('name');
  			$table->text('profile_pic');
  			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
	//
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('user_profiles');
	}
}
