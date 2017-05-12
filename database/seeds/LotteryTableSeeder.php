<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class LotteryTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('lotteries')->insert([
            'name'       => 'フィールドブック一番くじ',
            'open_time'  => new DateTime("-3d"),
            'close_time' => new DateTime("3week"),
            'status'     => 'open',
        ]);
    }

}