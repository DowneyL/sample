@extends('layouts.default')
@section('title', '添加奖品')

@section('content')
    <div class="col-md-offset-2 col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h5>添加商品</h5>

            </div>
            <div class="panel-body">

                @include('shared._errors')

                <form method="POST" action="{{ route('lottery.store') }}">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="goods_id">奖品id：</label>
                        <input type="text" name="goods_id" class="form-control" value="{{ old('goods_id') }}">
                    </div>

                    <div class="form-group">
                        <label for="gname">奖品名称：</label>
                        <input type="text" name="gname" class="form-control" value="{{ old('gname') }}">
                    </div>

                    <div class="form-group">
                        <label for="gstock">奖品库存：</label>
                        <input type="text" name="gstock" class="form-control" value="{{ old('gstock') }}">
                    </div>

                    <div class="form-group">
                        <label for="probability">奖品概率：</label>
                        <input type="text" name="probability" class="form-control" value="{{ old('probability') }}">
                    </div>

                    <div class="form-group">
                        <label for="gimg">奖品图片：</label>
                        <input type="text" name="gimg" class="form-control" value="{{ old('gimg') }}">
                    </div>

                    <div class="form-group">
                        <label for="description">添加描述：</label>
                        <label class="radio-inline">
                            <input type="radio" name="description" id="optionsRadios3" value="1"> 是
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="description" id="optionsRadios4" value="0" checked> 否
                        </label>
                    </div>
                    <button type="submit" class="btn btn-success">添加</button>
                    <a href="{{ route('lottery.show') }}" class="btn btn-primary">返回</a>
                </form>
            </div>
        </div>
    </div>
@stop