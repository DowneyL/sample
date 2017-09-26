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
        @if (Auth::check())
           <li><a href="#"><span class="glyphicon glyphicon-list"></span>用户列表</a></li>
           <li class="dropdown">
             <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
               <span class="glyphicon glyphicon-user"></span>{{ Auth::user()->name }} <b class="caret"></b>
             </a>
             <ul class="dropdown-menu">
               <li><a href="{{ route('user.show', Auth::user()->id) }}">个人中心</a></li>
               <li><a href="#">编辑资料</a></li>
               <li class="divider"></li>
               <li>
                 <a id="logout" href="javascript:;">
                   <form action="{{ route('logout') }}" method="POST">
                     {{ csrf_field() }}
                     {{ method_field('DELETE') }}
                     <button class="btn btn-block btn-danger" type="submit" name="button">退出</button>
                   </form>
                 </a>
               </li>
             </ul>
           </li>
          @else
          <li><a href="{{ route('help') }}"><span class="glyphicon glyphicon-question-sign"></span>帮助</a></li>
          <li><a href="{{ route('login') }}"><span class="glyphicon glyphicon-log-in"></span>登录</a></li>
          @endif
        </ul>
      </nav>
    </div>
  </div>
</header>
