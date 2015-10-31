<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVenueTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('venue_operators', function(Blueprint $table)
		{
			$table->increments('id');
            $table->tinyInteger('user_id');
            $table->string('name');
            $table->string('gender');
            $table->string('personal_id', 19);
            $table->string('department');
            $table->string('mobile', 20);
            $table->string('email');
            $table->string('date_of_birth');
            $table->string('function');
            $table->string('present_address1');
            $table->string('present_address2');
            $table->string('present_district');
            $table->string('present_zip');
            $table->string('permanent_address1');
            $table->string('permanent_address2');
            $table->string('permanent_district');
            $table->string('permanent_zip');
            $table->string('photo');
            $table->string('attachment');
            $table->tinyInteger('status')->default('0');
            $table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('venue_operators');
	}

}
