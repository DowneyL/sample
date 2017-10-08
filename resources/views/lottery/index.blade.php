@extends('layouts.default')
@section('title', '抽奖')

@section('content')
    <div class="row">
        <div class="col-md-offset-1 col-md-9">
            {{--<h1>{{ $user->name }}</h1>--}}
            <div id="lottery">
                <table border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td class="lottery-unit lottery-unit-0"><img src="https://www.huijindaicn.com/public/attachment/1_images/lottery/jf-10.png"><div class="mask"></div></td>
                        <td class="lottery-unit lottery-unit-1">
                            <img src="https://www.huijindaicn.com/public/attachment/1_images/lottery/ddj.png">
                            <!-- <img src="/public/attachment/1_images/lottery/bbg.png"> -->
                            <!--<img src="https://www.huijindaicn.com/public/images/lottery/pc/pc-1.png" class="wz">-->
                            <div class="mask"></div>
                        </td>
                        <td class="lottery-unit lottery-unit-2"><img src="https://www.huijindaicn.com/public/attachment/1_images/lottery/hb-5.png"><div class="mask"></div></td>
                        <td class="lottery-unit lottery-unit-3">
                            <img src="https://www.huijindaicn.com/public/attachment/1_images/lottery/gps.png">
                            <!-- <img src="/public/attachment/1_images/lottery/zyp.png"> -->
                            <!--<img src="https://www.huijindaicn.com/public/images/lottery/pc-1.png" class="wz">-->
                            <div class="mask"></div>
                        </td>
                        <td class="lottery-unit lottery-unit-4"><img src="https://www.huijindaicn.com/public/attachment/1_images/lottery/jf-50.png"><div class="mask"></div></td>
                        <td class="lottery-unit lottery-unit-5">
                            <img src="https://www.huijindaicn.com/public/attachment/1_images/lottery/hpy.png">
                            <!-- <img src="/public/attachment/1_images/lottery/jhq.png"> -->
                            <!--<img src="https://www.huijindaicn.com/public/images/lottery/pc-3.png" class="wz">-->
                            <div class="mask"></div>
                        </td>
                    </tr>
                    <tr>
                        <td class="lottery-unit lottery-unit-15">
                            <!-- <img src="/public/attachment/1_images/lottery/px.png"> -->
                            <img src="https://www.huijindaicn.com/public/attachment/1_images/lottery/hyd.png">
                            <!--<img src="https://www.huijindaicn.com/public/images/lottery/pc-2.png" class="wz">-->
                            <div class="mask"></div>
                        </td>
                        <td colspan="4" rowspan="2"><a href="javascript:;"></a></td>
                        <td class="lottery-unit lottery-unit-6"><img src="https://www.huijindaicn.com/public/attachment/1_images/lottery/hb-18.png"><div class="mask"></div></td>
                    </tr>
                    <tr>
                        <td class="lottery-unit lottery-unit-14"><img src="https://www.huijindaicn.com/public/attachment/1_images/lottery/hb-88.png"><div class="mask"></div></td>
                        <td class="lottery-unit lottery-unit-7">
                            <img src="https://www.huijindaicn.com/public/attachment/1_images/lottery/kfj.png">
                            <!--<img src="https://www.huijindaicn.com/public/images/lottery/pc-6.png" class="wz">-->
                            <div class="mask"></div>
                        </td>
                    </tr>
                    <tr>
                        <td class="lottery-unit lottery-unit-13">
                            <img src="https://www.huijindaicn.com/public/attachment/1_images/lottery/xyy.png">
                            <!--<img src="https://www.huijindaicn.com/public/images/lottery/pc-5.png" class="wz">-->
                            <div class="mask"></div>
                        </td>
                        <td class="lottery-unit lottery-unit-12"><img src="https://www.huijindaicn.com/public/attachment/1_images/lottery/hb-58.png"><div class="mask"></div></td>
                        <td class="lottery-unit lottery-unit-11"><img src="https://www.huijindaicn.com/public/attachment/1_images/lottery/hf-10.png"><div class="mask"></div></td>
                        <td class="lottery-unit lottery-unit-10">
                            <img src="https://www.huijindaicn.com/public/attachment/1_images/lottery/zzj.png">
                            <!-- <img src="/public/attachment/1_images/lottery/hb-38.png"> -->
                            <!--<img src="https://www.huijindaicn.com/public/images/lottery/pc-7.png" class="wz">-->
                            <div class="mask"></div>
                        </td>
                        <td class="lottery-unit lottery-unit-9"><img src="https://www.huijindaicn.com/public/attachment/1_images/lottery/hf-20.png"><div class="mask"></div></td>
                        <td class="lottery-unit lottery-unit-8"><img src="https://www.huijindaicn.com/public/attachment/1_images/lottery/jf-300.png"><div class="mask"></div></td>
                    </tr>
                </table>

            </div>
            <!-- 九宫格中奖列表 -->
            <div class="list lottery-list"></div>
        </div>
    </div>
@stop