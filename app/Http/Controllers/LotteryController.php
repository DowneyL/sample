<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Good;
use App\Models\GoodLog;
use Auth;

class LotteryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isadmin', [
            'only' => ['show', 'destroy', 'edit', 'update', 'change']
        ]);
    }

    // 摇奖操作 获取中奖结果 并返回 信息
    private function get_win()
    {
        $user_id = Auth::user()->id;
        $lottery_flag = Auth::user()->activated;
        $json = array('code' => 0, 'msg' => '', 'uid' => $user_id);

        if ($lottery_flag) {
            $json['msg'] = '您已参与抽奖，请勿重复参与！';
            $json['status'] = 2;
            return $json;
        }

        // 可抽中奖品列表
//        $arr = array(
//            '0' => array('id' => 0, 'good_id' => 50, 'name' => '平台10积分', 'v' => 15),
//            '1' => array('id' => 1, 'good_id' => 70, 'name' => '电动打蛋机', 'v' => 1),
//            '2' => array('id' => 2, 'good_id' => 54, 'name' => '理财红包5元', 'v' => 30),
//            '3' => array('id' => 3, 'good_id' => 66, 'name' => 'GPS手表电话', 'v' => 0),
//            '4' => array('id' => 4, 'good_id' => 51, 'name' => '平台50积分', 'v' => 15),
//            '5' => array('id' => 5, 'good_id' => 68, 'name' => '智能无人航拍', 'v' => 1),
//            '6' => array('id' => 6, 'good_id' => 53, 'name' => '理财红包18元', 'v' => 20),
//            '7' => array('id' => 7, 'good_id' => 60, 'name' => '全自动咖啡机', 'v' => 5),
//            '8' => array('id' => 8, 'good_id' => 52, 'name' => '平台300积分', 'v' => 10),
//            '9' => array('id' => 9, 'good_id' => 59, 'name' => '20元话费', 'v' => 5),
//            '10' => array('id' => 10, 'good_id' => 67, 'name' => '全自动榨汁机', 'v' => 3),
//            '11' => array('id' => 11, 'good_id' => 58, 'name' => '10元话费', 'v' => 10),
//            '12' => array('id' => 12, 'good_id' => 56, 'name' => '理财红包58元', 'v' => 10),
//            '13' => array('id' => 13, 'good_id' => 61, 'name' => '电子血压仪', 'v' => 10),
//            '14' => array('id' => 14, 'good_id' => 57, 'name' => '理财红包88元', 'v' => 1),
//            '15' => array('id' => 15, 'good_id' => 69, 'name' => '护腰带', 'v' => 5),
//        );
        $arr = array(
            '0' => array('id' => 0, 'good_id' => 1, 'name' => '平台10积分', 'v' => 15),
            '1' => array('id' => 1, 'good_id' => 2, 'name' => '电动打蛋机', 'v' => 1),
            '2' => array('id' => 2, 'good_id' => 3, 'name' => '理财红包5元', 'v' => 30),
            '3' => array('id' => 3, 'good_id' => 4, 'name' => 'GPS手表电话', 'v' => 0),
            '4' => array('id' => 4, 'good_id' => 5, 'name' => '平台50积分', 'v' => 15),
            '5' => array('id' => 5, 'good_id' => 6, 'name' => '智能无人航拍', 'v' => 1),
            '6' => array('id' => 6, 'good_id' => 7, 'name' => '理财红包18元', 'v' => 20),
            '7' => array('id' => 7, 'good_id' => 8, 'name' => '全自动咖啡机', 'v' => 5),
            '8' => array('id' => 8, 'good_id' => 9, 'name' => '平台300积分', 'v' => 10),
            '9' => array('id' => 9, 'good_id' => 10, 'name' => '20元话费', 'v' => 5),
            '10' => array('id' => 10, 'good_id' => 11, 'name' => '全自动榨汁机', 'v' => 3),
            '11' => array('id' => 11, 'good_id' => 12, 'name' => '10元话费', 'v' => 10),
            '12' => array('id' => 12, 'good_id' => 13, 'name' => '理财红包58元', 'v' => 10),
            '13' => array('id' => 13, 'good_id' => 14, 'name' => '电子血压仪', 'v' => 10),
            '14' => array('id' => 14, 'good_id' => 15, 'name' => '理财红包88元', 'v' => 1),
            '15' => array('id' => 15, 'good_id' => 16, 'name' => '护腰带', 'v' => 5),
        );
        /*  开始抽奖  */
        $key = $this->get_rand($arr);
        $win = $arr[$key];
        //输出抽奖信息
//        echo $user_id."<br>";
//        echo $lottery_flag."<br>";
//        echo $key;
//        echo "<pre>";
//        print_r($win);
//        echo "</pre>";

        $good = DB::select('select * from goods where gid = ?', [$win['good_id']]);

        // 抽奖成功
        if (!empty($good)) {
            //用户失去唯一抽奖机会
            $affected = DB::update('update users set activated = 1 where id = ?', [$user_id]);

            //添加抽奖记录
            $inserted = GoodLog::create([
                'uid' => $user_id,
                'gsid' => $win['good_id']
            ]);

            if ($affected && $inserted) {
                return array(
                    'code' => 1,
                    'status' => 1,
                    'win' => array(
                        'id' => $win['id'],
                        'name' => $win['name'],
                    ),
                );
            } else {
                $json['msg'] = '异常错误！';
                $json['status'] = 2;
                return $json;
            }
        } else {
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
    
    //公共方法
    public function index()
    {
        $user = Auth::user();
        return view('lottery.index', compact('user'));
    }

    public function start()
    {
        $arr = $this->get_win();
        $data = json_encode($arr);
        return $data;
    }


    public function show()
    {
        $user = Auth::user();
        if ($user->is_admin) {
            $goods = DB::select('select * from goods');
//            dd($goods);
            if (!empty($goods)) {
                return view('lottery.show', ['goods' => $goods]);
            } else {
                return view('lottery.show');
            }
        } else {
            session()->flash('danger', '抱歉，您不是管理员！');
            return redirect('/');
        }
    }

    public function destroy($good)
    {
        $deleted = DB::delete('delete from goods where gid = ?', ["$good"]);
        if ($deleted) {
            session()->flash('success', '删除成功！');
            return redirect()->back();
        } else {
            session()->flash('danger', '删除失败, 请稍后重试!');
            return redirect()->back();
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'goods_id' => 'required',
            'gname' => 'required',
            'gimg' => 'required',
            'gstock' => 'required',
            'probability' => 'required',
            'description' => 'required'
        ]);

        $good = Good::create([
            'goods_id' => $request->goods_id,
            'gname' => $request->gname,
            'gimg' => $request->gimg,
            'gstock' => $request->gstock,
            'probability' => $request->probability,
            'description' => $request->description,
        ]);

        if ($good) {
            session()->flash('success', '添加成功！');
            return redirect()->route('lottery.show');
        } else {
            session()->flash('danger', '操作失败，请稍后再试！');
            return redirect('lottery.edit');
        }

    }

    public function edit()
    {
        return view('lottery.edit');
    }

    public function change($good)
    {
        $good_arr = DB::select('select * from goods where gid = ?', ["$good"]);
        $goods = $good_arr[0];
        return view('lottery.change', ['goods' => $goods]);
    }

    public function update(Request $request, $good)
    {
        $this->validate($request, [
            'goods_id' => 'required',
            'gname' => 'required',
            'gimg' => 'required',
            'gstock' => 'required',
            'probability' => 'required',
            'description' => 'required'
        ]);

        $affected = DB::table('goods')
            ->where('gid', $good)
            ->update(array(
                'goods_id' => $request->goods_id,
                'gname' => $request->gname,
                'gimg' => $request->gimg,
                'gstock' => $request->gstock,
                'probability' => $request->probability,
                'description' => $request->description,
            ));

        if ($affected) {
            session()->flash('success', '修改成功！');
            return redirect()->route('lottery.show');
        } else {
            session()->flash('danger', '操作失败，请稍后再试！');
            return redirect('lottery.change', $good);
        }
    }
    
}
