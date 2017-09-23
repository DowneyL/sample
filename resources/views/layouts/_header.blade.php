<header class="navbar navbar-fixed-top navbar-inverse">
  <div class="container">
    <div class="col-md-offset-1 col-md-10">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
    data-target="#default-navbar-collapse">
                <span class="sr-only">切换导航</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('home') }}" id="logo">ARAGAKI</a>
        </div>
      <nav class="collapse navbar-collapse" id="default-navbar-collapse">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="{{ route('help') }}"><span class="glyphicon glyphicon-question-sign"></span>帮助</a></li>
          <li><a href="#"><span class="glyphicon glyphicon-log-in"></span>登录</a></li>
        </ul>
      </nav>
    </div>
  </div>
</header>
