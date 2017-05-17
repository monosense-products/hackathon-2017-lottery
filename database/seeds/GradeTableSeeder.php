<?php

use App\Grade;

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class GradeTableSeeder extends Seeder
{
    const DATA = [
        [
            'name' => 'ラストワン賞',
            'rank' => 1,

            'last_one_flag' => true,
        ],
        [
            'name' => 'A賞',
            'rank' => 2,
        ],
        [
            'name' => 'B賞',
            'rank' => 3,
        ],
        [
            'name' => 'C賞',
            'rank' => 4,
        ],
    ];

    public function run()
    {
        foreach (self::DATA as $DATUM) {
            $grade = new Grade($DATUM);
            $grade->save();
        }
    }

}
