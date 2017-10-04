<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class SessionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', [
            'only' => 'create',
        ]);
    }

    //登陆页面
    public function create()
    {
        return view('sessions.create');
    }

    public function store(Request $request)
    {
       $this->validate($request, [
           'tel' => 'required|max:11',
           'password' => 'required'
       ]);

       $credentials = [
           'tel'    => $request->tel,
           'password' => $request->password,
       ];

       if (Auth::attempt($credentials, $request->has('remember'))) {
               session()->flash('success', '欢迎回来！');
               return redirect()->intended(route('user.show', [Auth::user()]));
       } else {
           session()->flash('danger', '很抱歉，您的联系方式和密码不匹配');
           return redirect()->back();
       }
    }

    public function destroy()
    {
        Auth::logout();
        session()->flash('success', '您已成功退出！');
        return redirect('login');
    }

}
