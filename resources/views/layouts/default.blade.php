<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <title>@yield('title', 'AragakiYui') - by me</title>
    <link rel="stylesheet" href="/css/app.css">
  </head>
  <body>
    @include('layouts._header')
    <div class="container">
        <div class="col-md-offset-1 col-md-10">
          @include('shared._messages')
          @yield('content')
          @include('layouts._footer')
        </div>
    </div>

    <script src="/js/app.js"></script>
  </body>
</html>
