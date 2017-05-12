<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('skus', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('image_code');
            $table->integer('lottery_id')->unsigned();
            $table->integer('grade_id')->unsigned();

            $table->foreign('lottery_id')->references('id')->on('lotteries');
            $table->foreign('grade_id')->references('id')->on('grades');

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
		Schema::drop('skus');
	}

}
