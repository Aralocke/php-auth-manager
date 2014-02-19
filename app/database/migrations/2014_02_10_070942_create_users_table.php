<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
			# Engine=InnoDB
			$table->engine = 'InnoDB';
			
			$table->string('id', 32);
            $table->string('ldap_id', 32);

			$table->string('email', 64);
			$table->string('first_name', 32);
			$table->string('last_name', 32);
			$table->string('username', 32);

			$table->primary('id');
			
			$table->index('username');
			$table->index('email');

			$table->foreign('ldap_id')
				->references('id')->on('ldap_targets')
				->onUpdate('cascade')
				->onDelete('restrict');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}