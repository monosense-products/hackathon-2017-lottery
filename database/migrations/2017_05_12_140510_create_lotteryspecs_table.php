<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLotterySpecsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lottery_specs', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('lot_price');
            $table->integer('lottery_id')->unsigned();

            $table->foreign('lottery_id')->references('id')->on('lotteries');

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
		Schema::drop('lottery_specs');
	}

}
