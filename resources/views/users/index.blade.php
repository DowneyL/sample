@extends('layouts.default')
@section('title', '所有用户')

@section('content')
  <div class="demo">
    <div class="row">
      <h1>所有用户</h1>
        @foreach ($users as $user)
          @include('users._user')
        @endforeach
    </div>
    <div class="text-center">
        {!! $users->render() !!}
    </div>
  </div>
@stop
