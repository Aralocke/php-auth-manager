<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLdapTable extends Migration {

	public function up()
	{
		Schema::create('ldap_targets', function(Blueprint $table) {
			$table->engine = 'InnoDB';
			
			$table->increments('id');

			$table->string('app_id', 32)
				->index();
			$table->foreign('app_id')
				->references('id')->on('applications')
				->onUpdate('cascade');

			$table->string('hostname', 32);
			$table->smallInteger('port');
			$table->boolean('secure')
				->default('0');

			# Timestamp controlling
			$table->timestamps();
			# Adds a deleted_at
			$table->softDeletes(); 
		});
	}

	public function down()
	{
		Schema::dropIfExists('ldap_targets');
	}
}