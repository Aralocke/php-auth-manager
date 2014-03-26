<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLdapMetaTable extends Migration {

	public function up()
	{
		Schema::create('ldap_targets_metadata', function(Blueprint $table) {
			$table->engine = 'InnoDB';
			
			$table->increments('id');
			
			$table->integer('ldap_id')
				->unsigned()
				->index();
			$table->foreign('ldap_id')
				->references('id')->on('ldap_targets')
				->onUpdate('cascade');

			$table->string('field', 32);

			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::dropIfExists('ldap_targets_metadata');
	}
}