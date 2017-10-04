<div class="col-md-4 col-sm-6">
  <div class="our-team">
    <div class="pic">
      <img src="{{ $user->gravatar() }}" alt="{{ $user->name }}"/>
      @can('destroy', $user)
      <form action="{{ route('user.destroy', $user->id) }}" method="post">
      {{ csrf_field() }}
      {{ method_field('DELETE') }}
      <button type="submit" class="btn btn-sm btn-danger delete-btn">删除</button>
      </form>
      @endcan
    </div>
    <div class="team-content">
      <h3 class="title">{{ $user->name }}</h3>
      <span class="post">{{ $user->corporate }}</span>

    </div>
    <ul class="social">
      <li><a href="{{ route('user.show', $user->id )}}"><small>查看更多</small></a></li>
      {{--<li><a href="#" class="fa fa-twitter"></a></li>--}}
      {{--<li><a href="#" class="fa fa-google-plus"></a></li>--}}
      {{--<li><a href="#" class="fa fa-linkedin"></a></li>--}}
    </ul>
  </div>
</div>
