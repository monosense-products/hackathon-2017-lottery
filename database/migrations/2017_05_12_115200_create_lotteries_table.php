<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLotteriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lotteries', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->dateTime('open_time');
            $table->dateTime('close_time');
            $table->enum('status',['close', 'open']);
            
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
		Schema::drop('lotteries');
	}

}
