<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateApplicationsMetaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		/*Schema::create('applications_metadata', function(Blueprint $table) {
			# Engine=InnoDB
			$table->engine = 'InnoDB';

            # VARCHAR(32)
			$table->string('id', 32);

			# PRIMARY KEY (`id`)
			$table->primary('id');

			# ALTER TABLE `applications_metadata`
			# ADD CONSTRAINT `fk_app_metadata_id` FOREIGN KEY (`app_id`) 
			# REFERENCES `applications` (`id`) ON UPDATE CASCADE;
			$table->foreign('id')
				->references('id')->on('applications')
				->onUpdate('cascade')
				->onDelete('restrict');
		});*/
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('applications_metadata');
	}

}