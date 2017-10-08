@extends('layouts.default')
@section('title', '修改奖品信息')

@section('content')
    <div class="col-md-offset-2 col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h5>修改奖品信息</h5>
            </div>
            <div class="panel-body">

                @include('shared._errors')

                <form method="POST" action="{{ route('lottery.update', $goods->gid) }}">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}

                    <div class="form-group">
                        <label for="goods_id">奖品id：</label>
                        <input type="text" name="goods_id" class="form-control" value="{{ $goods->goods_id }}">
                    </div>

                    <div class="form-group">
                        <label for="gname">奖品名称：</label>
                        <input type="text" name="gname" class="form-control" value="{{ $goods->gname }}">
                    </div>

                    <div class="form-group">
                        <label for="gstock">奖品库存：</label>
                        <input type="text" name="gstock" class="form-control" value="{{ $goods->gstock }}">
                    </div>

                    <div class="form-group">
                        <label for="probability">奖品概率：</label>
                        <input type="text" name="probability" class="form-control" value="{{ $goods->probability }}">
                    </div>

                    <div class="form-group">
                        <label for="gimg">奖品图片：</label>
                        <input type="text" name="gimg" class="form-control" value="{{ $goods->gimg  }}">
                    </div>

                    <div class="form-group">
                        <label for="description">添加描述：</label>
                        <label class="radio-inline">
                            <input type="radio" name="description" id="optionsRadios3" value="1" @if ($goods->description) checked @endif> 是
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="description" id="optionsRadios4" value="0" @if (!$goods->description) checked @endif> 否
                        </label>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">修改</button>
                </form>
            </div>
        </div>
    </div>
@stop