<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Signed;

class MouldController extends Controller
{
    public function index()
    {
        return view('mould.index');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'corporate' => 'required|max:50',
            'tel' => 'required|unique:signeds|max:50',
            'contacts' => 'required|max:50'
        ]);

        // $timestamp = time();
        //
        // $sign_data = array(
        //     'corporate' => $request->corporate,
        //     'tel' => $request->tel,
        //     'contacts' => $request->contacts,
        //     'dateline' => $timestamp
        // );

        $sign_data = Signed::create([
            'corporate' => $request->corporate,
            'tel' => $request->tel,
            'contacts' => $request->contacts,
        ]);

        session()->flash('success', '签到成功');
        return redirect()->route('sign.result', 1);
    }

    public function result($tel)
    {
        return view('mould.result');
    }
}
