<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateApplicationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('applications', function(Blueprint $table) {
			# Engine=InnoDB
			$table->engine = 'InnoDB';
			
			# VARCHAR(32)
			$table->string('id', 32);
			$table->integer('uid')
				->unsigned()
				->index();

			$table->string('name', 64);

			$table->string('callback_url', 155);
			$table->string('application_url', 155);

			// OAuth secret and Access token
			$table->string('access_token', 32);
			$table->string('secret_token', 64);

			# Timestamp controlling
			$table->timestamps();
			# Adds a deleted_at
			$table->softDeletes(); 

			$table->foreign('uid')
			    ->references('id')->on('users')
			    ->onUpdate('cascade');

			// Primary key index for the table
			$table->primary('id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('applications');
	}
}