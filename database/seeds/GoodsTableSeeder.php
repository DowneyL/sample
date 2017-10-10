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
            ['goods_id' => 70, 'gname' => '电动打蛋机', 'gimg' => 'ddj', 'gstock' => 100, 'probability' => 1, 'description' => 1],
            ['goods_id' => 54, 'gname' => '理财红包5元', 'gimg' => 'hongbao5', 'gstock' => 999, 'probability' => 30, 'description' => 0],
            ['goods_id' => 66, 'gname' => 'GPS手表电话', 'gimg' => 'gps', 'gstock' => 0, 'probability' => 0, 'description' => 1],
            ['goods_id' => 51, 'gname' => '平台50积分', 'gimg' => 'credit50', 'gstock' => 999, 'probability' => 15, 'description' => 0],
            ['goods_id' => 68, 'gname' => '智能无人航拍', 'gimg' => 'hpj', 'gstock' => 10, 'probability' => 1, 'description' => 1],
            ['goods_id' => 53, 'gname' => '理财红包18元', 'gimg' => 'hongbao18', 'gstock' => 999, 'probability' => 20, 'description' => 0],
            ['goods_id' => 60, 'gname' => '全自动咖啡机', 'gimg' => 'kfj', 'gstock' => 10, 'probability' => 5, 'description' => 1],
            ['goods_id' => 52, 'gname' => '平台300积分', 'gimg' => 'credit300', 'gstock' => 999, 'probability' => 10, 'description' => 0],
            ['goods_id' => 59, 'gname' => '20元话费', 'gimg' => 'huafei20', 'gstock' => 999, 'probability' => 5, 'description' => 0],
            ['goods_id' => 67, 'gname' => '全自动榨汁机', 'gimg' => 'zzj', 'gstock' => 100, 'probability' => 3, 'description' => 1],
            ['goods_id' => 58, 'gname' => '10元话费', 'gimg' => 'huafei10', 'gstock' => 999, 'probability' => 10, 'description' => 0],
            ['goods_id' => 56, 'gname' => '理财红包58元', 'gimg' => 'hongbao58', 'gstock' => 999, 'probability' => 10, 'description' => 0],
            ['goods_id' => 61, 'gname' => '电子血压仪', 'gimg' => 'xyy', 'gstock' => 100, 'probability' => 10, 'description' => 1],
            ['goods_id' => 57, 'gname' => '理财红包88元', 'gimg' => 'hongbao88', 'gstock' => 999, 'probability' => 1, 'description' => 0],
            ['goods_id' => 69, 'gname' => '护腰带', 'gimg' => 'hyd', 'gstock' => 100, 'probability' => 5, 'description' => 1]
        ]);
    }
}
