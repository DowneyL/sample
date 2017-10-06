var lottery = {
    index: 0, //当前转动到哪个位置，起点位置
    count: 16, //总共有多少个位置
    timer: 0, //setTimeout的ID，用clearTimeout清除
    speed: 20, //初始转动速度
    times: 0, //转动次数
    cycle: 50, //转动基本次数：即至少需要转动多少次再进入抽奖环节
    prize: -1, //中奖位置
    init: function(id) {
        if ($("#" + id).find(".lottery-unit").length > 0) {
            $lottery = $("#" + id);
            $units = $lottery.find(".lottery-unit");
            this.obj = $lottery;
            this.count = $units.length;
            $lottery.find(".lottery-unit-" + this.index).addClass("active");
        }
    },
    roll: function() {
        var index = this.index;
        var count = this.count;
        var lottery = this.obj;
        $(lottery).find(".lottery-unit-" + index).removeClass("active");
        index += 1;
        if (index > count - 1) {
            index = 0;
        }
        $(lottery).find(".lottery-unit-" + index).addClass("active");
        this.index = index;
        return false;
    },
    stop: function(index) {
        this.prize = index;
        return false;
    }
};

function roll() {
    lottery.times += 1;
    lottery.roll();
    var prize_site = $("#lottery").attr("prize_site");
    if (lottery.times > lottery.cycle + 10 && lottery.index == prize_site) {
        // var prize_id = $("#lottery").attr("prize_id");
        var prize_name = $("#lottery").attr("prize_name");
        // alert("中奖名称："+prize_name+"\n中奖id："+prize_id);
        $.showSuccess('恭喜你中得 '+ prize_name,function(){
            get_win_num();
            get_win_list();
            get_tot_num();
        });
        clearTimeout(lottery.timer);
        lottery.prize = -1;
        lottery.times = 0;
        click = false;
    } else {
        if (lottery.times < lottery.cycle) {
            lottery.speed -= 10;
        } else if (lottery.times == lottery.cycle) {
            var index = Math.random() * (lottery.count) | 0;
            lottery.prize = index;
        } else {
            if (lottery.times > lottery.cycle + 10 && ((lottery.prize == 0 && lottery.index == 7) || lottery.prize == lottery.index + 1)) {
                lottery.speed += 110;
            } else {
                lottery.speed += 20;
            }
        }
        if (lottery.speed < 40) {
            lottery.speed = 40;
        }
        lottery.timer = setTimeout(roll, lottery.speed);
    }
    return false;
}

/* 获取中奖列表 */
function get_win_list(){
    $.get('/gifts/index.php?ctl=lottery&pc_ct=get_new_win&num=100', function(a){
        // console.log(a);
        if(typeof a != 'object'){
            return;
        }
        for(k in a){
            html = '<ul>';
            for(i = 0, l = a[k].length; i < l; i++){
                html += '<li><span>'+ a[k][i].user_name +'</span><span>'+ a[k][i].goods_name +'</span></li>';
            }
            html += '</ul>';
            $('.lottery-list').html(html);
        }
        /* 中奖列表滚动插件 */
        $('.lottery-list ul').totemticker({
            row_height: '21px',
            next: '#ticker-next',
            previous: '#ticker-previous',
            stop: '#stop',
            start: '#start',
            mousestop: true
        });
    }, 'json');
}

/* 获取剩余抽奖次数 */
function get_win_num(){
    $.get('/gifts/index.php?ctl=lottery&pc_ct=get_win_num&type=t_box', function(a){
        if(typeof a != 'object'){
            return;
        }
        $('.score').html(a.score);
        $('.num').html(a.num);
        $('.count').html(a.count);
    }, 'json');
}

/* 获取抽奖排行 */
function get_tot_num(){
    $.get('/gifts/index.php?ctl=lottery&pc_ct=get_tot_num', function(a){
        if(typeof a != 'object'){
            return;
        }
        var html = '';
        $.each(a, function(i, n){
            html = html+'<span>'+(i+1)+'：'+n.user_name+'('+n.num+'次)</span>';
        });
        $('.c_count').html(html);
    }, 'json');
}

var click = false;

$(function() {

    // var ajax_url = "/lottery/index.php?ctl=lottery&pc_ct=get_win";
    var ajax_url = "/lottery/get_win";
    lottery.init('lottery');

    /* 开始抽奖 */
    $("#lottery a").click(function() {
        console.log(click);
        if (click) {
            return false;
        } else {
            $.get(ajax_url, {uid: 1}, function(a) { // 获取奖品，也可以在这里判断是否登陆状态
                alert(a);
                if(!a.code){
                    var _url = a.status == 2 ? '/index.php?ctl=user&act=login' : '/index.php?ctl=deals';
                    return $.showErr(a.msg, function(){window.location = _url;});
                }else if(a.win){
                    $("#lottery").attr("prize_site", a.win.id);
                    $("#lottery").attr("prize_name", a.win.name);
                    lottery.speed = 100;
                    roll();
                    click = true;
                    return false;
                }else{
                    $.showSuccess('通讯错误 稍后再试');
                }
            }, "json")
        }
    });

    /*获取积分和用户抽奖次数*/
    get_win_num();

    /*获取中奖信息*/
    get_win_list();

    /* 获取抽奖前十名 */
    get_tot_num();
})