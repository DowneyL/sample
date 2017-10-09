<?php

use Illuminate\Database\Seeder;

class GoodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('goods')->insert([
            ['goods_id' => 50, 'gname' => '平台10积分', 'gimg' => 'credit10', 'gstock' => 999, 'probability' => 30, 'description' => 0],
            ['goods_id' => 70, 'gname' => '电动打蛋机', 'gimg' => 'ddj', 'gstock' => 40, 'probability' => 1, 'description' => 1],
            ['goods_id' => 70, 'gname' => '电动打蛋机', 'gimg' => 'ddj', 'gstock' => 40, 'probability' => 1, 'description' => 1],
            ['goods_id' => 70, 'gname' => '电动打蛋机', 'gimg' => 'ddj', 'gstock' => 40, 'probability' => 1, 'description' => 1],
            ['goods_id' => 70, 'gname' => '电动打蛋机', 'gimg' => 'ddj', 'gstock' => 40, 'probability' => 1, 'description' => 1],
            ['goods_id' => 70, 'gname' => '电动打蛋机', 'gimg' => 'ddj', 'gstock' => 40, 'probability' => 1, 'description' => 1],
            ['goods_id' => 70, 'gname' => '电动打蛋机', 'gimg' => 'ddj', 'gstock' => 40, 'probability' => 1, 'description' => 1],
            ['goods_id' => 70, 'gname' => '电动打蛋机', 'gimg' => 'ddj', 'gstock' => 40, 'probability' => 1, 'description' => 1],
            ['goods_id' => 70, 'gname' => '电动打蛋机', 'gimg' => 'ddj', 'gstock' => 40, 'probability' => 1, 'description' => 1]
        ]);
    }
}
