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
            $table->string('name');
            $table->integer('lotteryId');
            $table->integer('gradeId');
            $table->enum('status', ['on_sale', 'sold']);
            
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
