<?php

class Init {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table)
		{
			# primary key

			$table->increments('id');

			# unique key

			$table->string('email')->unique();

			# fields

			$table->string('password');
			$table->string('name')->nullable();
			$table->string('surname')->nullable();

			# timestamps

			$table->timestamps();
		});

		Schema::create('posts', function($table)
		{
			# primary key

			$table->increments('id');

			# unique key

			$table->string('slug')->unique();

			# fields

			$table->string('title');
			$table->text('content');

			# timestamps

			$table->timestamps();
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
