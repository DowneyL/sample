@extends('layouts.default')
@section('title', '奖品列表')

@section('content')
    <div class="row">
    <div class="col-md-offset-2 col-md-8">
        @if (!empty($goods))
            <table class="table table-hover table-striped table-goods">
                <caption>
                    已设置的奖品信息
                    &nbsp;&nbsp;<a href="{{ route('lottery.edit') }}" class="btn btn-sm btn-success"><i
                                class="fa fa-plus" aria-hidden="true"></i> 添加</a>
                </caption>

                <thead>
                <tr>
                    <th>id</th>
                    <th>名称</th>
                    <th>库存</th>
                    <th class="mobile_hide">图片</th>
                    <th class="mobile_hide">描述</th>
                    <th>概率</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($goods as $good)
                    <tr>
                        <td>{{ $good->goods_id }}</td>
                        <td>{{ $good->gname }}</td>
                        <td>{{ $good->gstock }}</td>
                        <td class="mobile_hide">{{ $good->gimg }}</td>
                        <td class="mobile_hide">
                            @if ($good->description) 是 @else 否 @endif
                        </td>
                        <td>{{ $good->probability }}</td>
                        <td>
                            <form action="{{ route('lottery.destroy', $good->gid) }}" method="post"
                                  class="lottery-form">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-sm btn-danger">删除</button>
                            </form>
                            <a href="{{ route('lottery.change', $good->gid) }}" class="btn btn-sm btn-primary">修改</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <small>目前暂未设置任何奖品</small>
        @endif
    </div>
    </div>
@stop