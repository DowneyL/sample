<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\User;
use Auth;

class LotteryController extends Controller
{
    // 摇奖操作 获取中奖结果 并返回 信息
    private function get_win()
    {
        $user_id = Auth::user()->id;

        $json = array('code' => 0, 'msg' => '', 'uid' => $user_id);

        if(!$user_id){
            $json['msg'] = '请登录后再试！';
            $json['status'] = 2;
            es_session::set("gopreview", "/index.php?ctl=user&act=login");
            return $json;
        }



        // 可抽中奖品列表
        $arr = array(
            '0' => array('id'=>0,'good_id'=>50,'name'=>'平台10积分','v'=>15),
            '1' => array('id'=>1,'good_id'=>70,'name'=>'电动打蛋机','v'=>1),
            '2' => array('id'=>2,'good_id'=>54,'name'=>'理财红包5元','v'=>30),
            '3' => array('id'=>3,'good_id'=>66,'name'=>'GPS手表电话','v'=>0),
            '4' => array('id'=>4,'good_id'=>51,'name'=>'平台50积分','v'=>15),
            '5' => array('id'=>5,'good_id'=>68,'name'=>'智能无人航拍','v'=>1),
            '6' => array('id'=>6,'good_id'=>53,'name'=>'理财红包18元','v'=>20),
            '7' => array('id'=>7,'good_id'=>60,'name'=>'全自动咖啡机','v'=>5),
            '8' => array('id'=>8,'good_id'=>52,'name'=>'平台300积分','v'=>10),
            '9' => array('id'=>9,'good_id'=>59,'name'=>'20元话费','v'=>5),
            '10' => array('id'=>10,'good_id'=>67,'name'=>'全自动榨汁机','v'=>3),
            '11' => array('id'=>11,'good_id'=>58,'name'=>'10元话费','v'=>10),
            '12' => array('id'=>12,'good_id'=>56,'name'=>'理财红包58元','v'=>10),
            '13' => array('id'=>13,'good_id'=>61,'name'=>'电子血压仪','v'=>10),
            '14' => array('id'=>14,'good_id'=>57,'name'=>'理财红包88元','v'=>1),
            '15' => array('id'=>15,'good_id'=>69,'name'=>'护腰带','v'=>5),
        );

        $user_ids = array(
            '13' => array(20861,3661,20631,7433,2447,7239,12471,3338,13031,12070), // 24小时保温杯
            '15' => array(2086,8824,6699,747,2291,1127,2955,2408,5127,12070), // 智能运动手环
        );

        /*  正常抽奖  */
        $key = $this->get_rand($arr);
        $win = $arr[$key];

        /*  特殊客户 抽实物  */
        $g_count = $GLOBALS['db']->getOne("SELECT count(*) FROM ".DB_PREFIX."turntable_user_goods WHERE user_id = ".$GLOBALS['user_info']['id']." AND type='t_box' AND goods_id IN(61,66,67,68,69,70)");
        foreach ($user_ids as $k => $v) {
            if(in_array($user_id, $v) && !$g_count)
            {
                $win = $arr[$k];
                break;
            }
        }

        $good = $GLOBALS['db']->getRow("SELECT * FROM ".DB_PREFIX."turntable_goods WHERE id = ".$win['good_id']);

        // 抽奖成功
        if(!empty($good))
        {
            // 扣除抽奖积分，或赠送机会
            $this->upadte_user_num_score($user_num,$user_score);
            // 添加奖品给用户
            $this->update_user_goods($good);
            return array(
                'code' => 1,
                'status' => 1,
                'win' => array(
                    'id' => $win['id'],
                    'name' => $good['name'],
                ),
            );
        }else{
            return array('code' => 0, 'status' => 4, 'msg' => '该活动 处于关闭状态，详情咨询客服！');
        }
    }

    // 抽奖概率算法
    private function get_rand($proArr)
    {
        $result = '';
        foreach ($proArr as $key => $val) {
            $arr[$key] = $val['v'];
        }
        // 概率数组的总概率
        $proSum = array_sum($arr);
        // 概率数组循环
        foreach ($arr as $k => $v) {
            $randNum = mt_rand(1, $proSum);
            if ($randNum <= $v) {
                $result = $k;
                break;
            } else {
                $proSum -= $v;
            }
        }
        return $result;
    }

    public function index()
    {
        $user = Auth::user();
        return view('lottery.index',compact('user'));
    }

    public function start()
    {
        $arr = array(
            'code' => 1,
            'status' => 1,
            'win' => array(
                'id' => 1,
                'name' => '平台10积分',
            ),
        );
        $data = json_encode($arr);
        return $data;
    }
}
