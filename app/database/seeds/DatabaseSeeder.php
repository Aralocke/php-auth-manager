<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		// $this->call('UserTableSeeder');

		// Sentry Authentication Systems
		$this->call('SentryGroupSeeder');
		$this->call('SentryUserSeeder');
		$this->call('SentryUserGroupSeeder');
	}

}