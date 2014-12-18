<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeProfileBioInUserProfile extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('user_profiles', function(Blueprint $table)
		{
			$table->renameColumn('profile_pic', 'profile_bio');//
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('user_profiles', function(Blueprint $table)
		{
			$table->renameColumn('profile_bio', 'profile_pic');//
		});
	}

}
