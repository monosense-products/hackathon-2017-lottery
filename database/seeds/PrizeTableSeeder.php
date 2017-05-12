<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class PrizeTableSeeder extends Seeder
{

    public function run()
    {
        $q = 3;
        $skus = DB::table('skus')->where("grade_id", ">", 1)->get();
        foreach ($skus as $sku) {
            foreach (range(1, $q) as $n) {
                DB::table('prizes')->insert([
                    'status'     => "on_sale",
                    'lottery_id' => 1,
                    'sku_id'     => $sku->id,
                ]);
            }
        }
    }

}
