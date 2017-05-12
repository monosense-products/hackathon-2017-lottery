<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class GradeTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('grades')->insert([
            'name' => 'ラストワン賞',
            'rank' => 1,

            'last_one_flag' => true,
        ]);
        DB::table('grades')->insert([
            'name' => 'A賞',
            'rank' => 2,
        ]);
        DB::table('grades')->insert([
            'name' => 'B賞',
            'rank' => 3,
        ]);
        DB::table('grades')->insert([
            'name' => 'C賞',
            'rank' => 4,
        ]);
    }

}
