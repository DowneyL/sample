<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <title>@yield('title', '中国模具网') - by Ara</title>
    <link rel="stylesheet" href="/css/app.css">
  </head>
  <body>
    @include('m_layouts._mould_header')
    <div class="container mould-container">
        <div class="col-md-offset-1 col-md-10">
          @yield('content')
          @include('m_layouts._mould_footer')
        </div>
    </div>

    <script src="/js/app.js"></script>
  </body>
</html>
