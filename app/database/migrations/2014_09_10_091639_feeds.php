<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Feeds extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('feeds', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description', 300);
            $table->string('url');
            $table->integer('creator');
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
        Schema::drop('feeds');
	}

}
