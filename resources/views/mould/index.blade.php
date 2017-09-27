@extends('m_layouts.mould_default')
@section('title', '签到')

@section('content')
<div class="col-md-offset-2 col-md-8">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h5>签到</h5>
    </div>
    <div class="panel-body">
      @include('shared._errors')
      <form method="POST" action="{{ route('sign') }}">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="corporate">公司名称：</label>
            <input type="text" name="corporate" class="form-control" value="{{ old('coname') }}">
          </div>

          <div class="form-group">
            <label for="tel">联系方式：</label>
            <input type="text" name="tel" class="form-control" value="{{ old('tel') }}">
          </div>

          <div class="form-group">
            <label for="contacts">联系人：</label>
            <input type="text" name="contacts" class="form-control" value="{{ old('contacts') }}">
          </div>

          <button type="submit" class="btn btn-primary">签到</button>
      </form>
    </div>
  </div>
</div>
@stop
