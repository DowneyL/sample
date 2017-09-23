@extends('layouts.default')

@section('title', '主页')

@section('content')
    <div class="jumbotron">
      <h1>ARAGAKI YUI</h1>
      <p class="lead">
          計算出来ずに残った答え、それが人の気持ちと言うものだよ。
      </p>
      <p>
        <a class="btn btn-lg btn-success" href="{{ route('signup') }}" role="button">注册</a>
      </p>
    </div>
@stop
