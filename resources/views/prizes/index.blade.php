@extends('layouts.default')
@section('title', '我的奖品')

@section('content')
    <div class="col-md-offset-1 col-md-9">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    奖品列表
                </h3>
            </div>
            <div class="panel-body">
                @if (count($prizes) > 0)
                    @foreach ($prizes as $prize)
                        {{ $prize->gname }}
                    @endforeach
                @else
                    <ul class="list-unstyled empty-list text-center">
                        <li><img src="/img/empty.png" alt="empty" class="img-responsive"></li>
                        <li><small>您还没有获得任何奖品，点击<a href="">参与分享</a>即可获得抽奖资格！</small></li>
                    </ul>
                @endif
            </div>
        </div>
    </div>
@stop
