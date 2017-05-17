<?php

use App\Lottery;

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class LotteryTableSeeder extends Seeder
{

    public function run()
    {
        $lottery = new Lottery([
            'name'       => 'フィールドブック一番くじ',
            'open_time'  => new DateTimeImmutable("-3d"),
            'close_time' => new DateTimeImmutable("3week"),
            'status'     => 'open',
        ]);
        $lottery->save();
    }

}
