<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Good;
use App\Models\GoodLog;
use Auth;

class PrizeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index(User $user)
    {
        $this -> authorize('update', $user);
        $prizes = DB::table('goods_log')
            ->join('users', function ($json) {
                $json->on('goods_log.uid', '=', 'users.id')
                     ->where('users.id', '=', Auth::user()->id);
            })
            ->join('goods', 'goods_log.gsid', '=', 'goods.gid')
            ->select('goods.gname', 'goods.gimg')
            ->get();
        
        return view('prizes.index',compact('prizes'));
    }
}
