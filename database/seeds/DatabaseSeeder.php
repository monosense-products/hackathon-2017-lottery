<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LotteryTableSeeder::class);
        $this->call(LotterySpecTableSeeder::class);
        $this->call(GradeTableSeeder::class);
        $this->call(SkuTableSeeder::class);
        $this->call(PrizeTableSeeder::class);
    }
}
