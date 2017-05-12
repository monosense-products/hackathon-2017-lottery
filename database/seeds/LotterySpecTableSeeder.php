<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class LotterySpecTableSeeder extends Seeder {

    public function run()
    {
        DB::table('lottery_specs')->insert([
            'lot_price'       => 500,
            'lottery_id'  => App\Lottery::all()->first()->id,
        ]);
    }

}