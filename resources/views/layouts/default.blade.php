<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <title>@yield('title', '中国模具网') - by Ara</title>
    <link rel="stylesheet" href="/assets/css/dialog.css">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/css/users.css">
    <link rel="stylesheet" href="/assets/css/lottery.css">
    <link rel="shortcut icon" href="/assets/ico/favicon.png">
  </head>
  <body>
    @include('layouts._header')
    <div class="container no-padding">
        <div class="col-md-offset-1 col-md-10">
          @include('shared._messages')
          @yield('content')
          @include('layouts._footer')
        </div>
    </div>

    {{--<script src="/js/app.js"></script>--}}
    <script src="/assets/js/jquery-1.11.1.min.js"></script>
    <script src="/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="/assets/js/dialog.js"></script>
    <script src="/assets/js/jquery.totemticker.js"></script>
   <script src="/assets/js/lottery.js"></script>
  </body>
</html>
