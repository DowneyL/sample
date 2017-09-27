@extends('m_layouts.mould_default')
@section('title', '签到')

@section('content')
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(session()->has($msg))
          <div class="sign-message">
              <img src="/img/qiandao.png" alt="" class="img-responsive sign-img">
          </div>
      @endif
    @endforeach
@stop
