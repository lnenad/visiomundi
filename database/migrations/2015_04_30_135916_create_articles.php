<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticles extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('articles', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('journal_id');
			$table->integer('user_id');
			$table->string('doi');
			$table->string('category');
			$table->string('title');
			$table->string('slug');
			$table->string('keywords');
			$table->text('body');
			$table->integer('views');
			$table->integer('downloads');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('articles');
	}

}
