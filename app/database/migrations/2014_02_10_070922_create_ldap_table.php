<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLdapTable extends Migration {

	public function up()
	{
		/*Schema::create('ldap_targets', function(Blueprint $table) {
			# Engine=InnoDB
			$table->engine = 'InnoDB';
			
			$table->string('id', 32);
			$table->string('app_id', 32);
			$table->boolean('secure')->default('0');
			$table->string('hostname', 32);
			$table->smallInteger('port');

			# Timestamp controlling
			$table->timestamps();
			# Adds a deleted_at
			$table->softDeletes(); 

			$table->primary('id');
			$table->index('app_id');

			$table->foreign('app_id')
				->references('id')->on('applications')
				->onUpdate('cascade')
				->onDelete('restrict');
		});*/
	}

	public function down()
	{
		Schema::dropIfExists('ldap_targets');
	}
}