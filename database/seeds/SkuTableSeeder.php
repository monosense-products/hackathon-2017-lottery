<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class SkuTableSeeder extends Seeder
{

    public function run()
    {
        $data = [
            1 => 1,
            2 => 3,
            3 => 6,
            4 => 10,
        ];

        foreach ($data as $id => $n) {
            foreach (range(1, $n) as $m) {
                DB::table('skus')->insert([
                    'name'       => "景品{$id}-{$m}",
                    'image_code' => $id . "-" . $m . '.jpg',
                    'lottery_id' => 1,
                    'grade_id'   => $id,
                ]);
            }
        }
    }

}
