<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLdapMetaTable extends Migration {

	public function up()
	{
		Schema::create('ldap_targets_metadata', function(Blueprint $table) {
			# Engine=InnoDB
			$table->engine = 'InnoDB';
			
			$table->string('id', 32);
			$table->string('app_id', 32);

			$table->string('field_username');
			$table->string('field_email');
            $table->string('field_')

			$table->primary('id');
			$table->index('app_id');

			$table->foreign('id')
				->references('id')->on('ldap_targets')
				->onUpdate('cascade')
				->onDelete('restrict');

			$table->foreign('app_id')
				->references('id')->on('applications')
				->onUpdate('cascade')
				->onDelete('restrict');
		});
	}

	public function down()
	{
		Schema::dropIfExists('ldap_targets_metadata');
	}
}