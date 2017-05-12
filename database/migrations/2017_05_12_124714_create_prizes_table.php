<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrizesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('prizes', function(Blueprint $table) {
            $table->increments('id');
            $table->enum('status', ['on_sale', 'sold']);
            $table->integer('lottery_id')->unsigned();
            $table->integer('sku_id')->unsigned();

            $table->foreign('lottery_id')->references('id')->on('lotteries');
            $table->foreign('sku_id')->references('id')->on('skus');

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
		Schema::drop('prizes');
	}

}
