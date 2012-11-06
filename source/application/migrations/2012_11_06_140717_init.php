<?php

class Init {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('authors', function($table)
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
			$table->string('status');
			$table->text('content');

			# timestamps

			$table->timestamps();

			# foreign keys

			$table->integer('created_by')->unsigned();
			$table->foreign('created_by')->references('id')->on('authors');
		});

		Schema::create('tags', function($table)
		{
			# primary key

			$table->increments('id');

			# unique key

			$table->string('slug')->unique();

			# fields

			$table->string('title');

			# timestamps

			$table->timestamps();
		});

		Schema::create('post_tags', function($table)
		{
			# primary key

			$table->increments('id');

			# unique key

			$table->string('slug')->unique();

			# foreign keys

			$table->integer('post_id')->unsigned();
			$table->foreign('post_id')->references('id')->on('posts');

			$table->integer('tag_id')->unsigned();
			$table->foreign('tag_id')->references('id')->on('tags');

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
		# Drop tables

		Schema::drop('post_tags');
		Schema::drop('posts');
		Schema::drop('authors');
		Schema::drop('tags');
	}

}
