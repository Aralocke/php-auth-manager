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
			$table->string('name', 64);

			# Timestamp controlling
			$table->timestamps();
			# Adds a deleted_at
			$table->softDeletes(); 

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