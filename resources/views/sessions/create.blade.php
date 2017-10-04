@extends('layouts.k_default')
@section('title', '登录')

@section('content')
        <!-- Top content -->
<div class="top-content">
    <div class="inner-bg">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 text">
                    <h1><strong>中国模具网</strong></h1>
                    <div class="description">
                        <p>
                            欢迎参观由<a href="http://www.mould.net.cn"><strong>中国模具网</strong></a>举办的全国模具展会
                            这里有展会的最新消息和参展商信息。完成信息登录后将获得丰厚的奖品。
                        </p>
                    </div>
                </div>
            </div>

            @if (count($errors) > 0)
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <div class="alert alert-danger show-errors">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li><small>{{ $error }}</small></li>
                                @endforeach
                            </ul>
                        <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            @else
                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                    @if(session()->has($msg))
                        <div class="row">
                            <div class="col-sm-6 col-sm-offset-3">
                                <div class="flash-message">
                                <p class="alert alert-{{ $msg }} show-messages">
                                    <small>{{ session()->get($msg) }}</small>
                                </p>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            @endif

            <div class="row">
                <div class="col-sm-6 col-sm-offset-3 form-box">
                    <div class="form-top">
                        <div class="form-top-left">
                            <h3>登录</h3>
                            <p>如果您已经签到，即可登录参与抽奖:</p>
                        </div>
                        <div class="form-top-right">
                            <i class="fa fa-user"></i>
                        </div>
                    </div>
                    <div class="form-bottom">
                        <form role="form" action="{{ route('login') }}" method="post" class="login-form">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="sr-only" for="form-telphone">联系方式</label>
                                <input type="text" name="tel" placeholder="联系方式..." class="form-telphone form-control" id="form-telphone" value="{{ old('tel') }}">
                            </div>

                            <div class="form-group">
                                <label class="sr-only" for="form-password">密码</label>
                                <input type="password" name="password" placeholder="密码..." class="form-password form-control" id="form-password" value="{{ old('password') }}">
                            </div>

                            <div class="checkbox login-check">
                                <label><input type="checkbox" name="remember"> 记住我</label>
                            </div>

                            <button type="submit" class="btn">登录</button>
                        </form>
                        <p></p>
                        <p class="login-ask"><small>还没签到？<a href="{{ route('signup') }}">现在签到！</a></small></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@stop
