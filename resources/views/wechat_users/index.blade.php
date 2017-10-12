@extends('layouts.default')
@section('title', $wechat_user->getName())

@section('content')
    <ul>
        <li><img src="{{ $wechat_user->getAvatar() }}" class="img-circle"></li>
        <li>{{ $wechat_user->getName() }}</li>
    </ul>
@stop
