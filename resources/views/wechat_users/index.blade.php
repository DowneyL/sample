@extends('layouts.default')
@section('title', $wechat_user->getName())

@section('content')
    <ul>
        <li>{{ $wechat_user->getAvatar() }}</li>
        <li>{{ $wechat_user->getName() }}</li>
    </ul>
@stop