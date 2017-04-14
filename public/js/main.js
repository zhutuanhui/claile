var _flayHtml = {
    payLayString: "<div class=\"layPay\">" +
                         "    <div class=\"title\">充值遇到问题？<span class=\"r mr-1\"><a onclick=\"$.jBox.close();\" href=\"javascript:void(0);\">×关闭</a></span></div>" +
                         "    <div class=\"line-solid clearfix\"><div></div><div></div></div>" +
                         "    <div class=\"txt-gray mt-1 pl-1\">充值完成前请不要关闭此窗口。完成充值后请根据你的情况点击下面的按钮</div>" +
                         "    <div class=\"txt-red f14 mt-1 pl-1\">请在新打开的页面完成付款后再选择。</div>" +
                         "    <div class=\"tc_but clearfix mt-2 mb-2\"><a href=\"javascript:void(0);\" id=\"sucessPay\">已完成充值</a><a target=\"_blank\" href=\"/help/\">充值遇到问题</a> </div>" +
                         "    <div class=\"pl-1 mb-1\"><a onclick=\"$.jBox.close();\" href=\"javascript:void(0);\" class=\"txt-red\"><< 返回重新选择支付方式？</a></div>" +
                         "</div>"
};
var _userpro = { id: 0, nickname: "游客", isForum: false };
function getPostid() {
    var cid = [];
    $(":checkbox:checked[name='chk_bid']").each(function () { cid.push($(this).val()); });
    return cid.toString();
}

function showPayLay() {
    $.jBox.close();
    $.jBox(_flayHtml.payLayString, {
        title: null, width: 520, buttons: false, top: '30%', persistent: false, showClose: false,
        loaded: function (h) {
            h.find("#sucessPay").unbind().bind("click", function () {
                location.href = location.href;
            });
        }
    });
}

function showLoginLay() {
    $("#overlay-login").overlay().load();
}

function flyLogin() {
    var ok = function (json) {
        if (json.Success) {
            var fly = '<a class="btn btn-normal-1 zhenggao" href="/zt/yuegao/index.html" target="_blank"><i class="ico ico-zhenggao"></i>征稿</a><a class="btn btn-normal-1 bg-gray-1 txt-gray" href="/user/bookcase.aspx"><i class="ico ico-4"></i>藏书架</a>' +
                        '<a class="btn btn-normal-1 bg-gray-1 txt-gray" href="/author/book/listbook.aspx"><i class="ico ico-3"></i>作品管理</a>' +
                        '<div class="line"></div>' +
                        '<div class="member-drop">' +
                            '<a class="member" href="/user/"><img src="' + json.InnerResult.Avatar + '" />' + json.InnerResult.nickname + '</a>' +
                            '<div class="show">' +
                                '<p>等级：<b class="txt-red">' + json.InnerResult.gride + '</b></p>' +
                                '<div class="line-dotted"><div></div></div>' +
                                '<p><a href="/user/">进入会员中心</a></p>' +
                                '<div class="line-dotted"><div></div></div>' +
                                '<p><a class="r" href="/user/logout.aspx">安全退出</a></p>' +
                            '</div>' +
                        '</div>' +
                        '<a href="/author/"><b>作者后台</b></a>';
            $("#h_login_info").html(fly);
            _userpro.id = json.InnerResult.uid;
            _userpro.nickname = json.InnerResult.nickname;
        }
    };
    $.fn.WsAjax({
        url: "/services/member.aspx?action=flyLogin&jsoncallback=?&" + Math.random(),
        success: ok
    });
}

function flyCase() {
    var temp_case_ok = function (json) {
        if (json.Success) {
            var i = 1;
            $.each(json.InnerResult, function (index, va) {
                if (i > 1) return;
                var chpTitle = va.chapterTitle;
                if ((va.booktitle + va.chapterTitle).length >= 18) {
                    chpTitle = va.chapterTitle.substring(0, 18 - va.booktitle.length) + "...";
                }
                $("#temp_case").html("<i class=\"ico ico-2\"></i>上次阅读到:<a class=\"txt-red\" href=\"/book/" + va.bid + "\">《" + va.booktitle + "》</a>" + chpTitle + "<a class=\"btn btn-small bg-brown ml-0-5\" href=\"" + va.chapterMarkUrl + "\">接着读 &gt;</a>");
                i++;
            });
        }
    };
    $.fn.WsAjax({
        url: "/services/member.aspx?action=loadmycase&jsoncallback=?&" + Math.random(),
        success: temp_case_ok
    });
}

function checkLogin(username, userpass, vcode, saveLogin, goUrl) {
    var ok = function(json) {
        if (json.Success) {
            location.href = goUrl == null ? json.InnerResult : goUrl;
        } else {
            alert(json.Error);
        }
    };
    var err = function(h, t, e) {
        alert("系统错误，请联系管理员！");
    };
    $.fn.WsAjax({
        url: "/services/member.aspx?action=chkLogin&jsoncallback=?&" + Math.random(),
        data: { "username": username, "userpass": userpass, "vcode": vcode, "saveLogin": saveLogin },
        success: ok,
        error: err
    });
}

function MemberActionSubmit(okTxt, action, loadTxt, datas, url) {
    var urls = url ? url : location.href;
    var loadString = loadTxt ? loadTxt : '正在提交数据，请稍后...';
    var ok = function (json) {
        if (json.Success) {
            if (okTxt == null) {
                location.href = urls;
            } else {
                $.jBox.tip(okTxt, 'success', { closed: function () { $.jBox.close(); location.href = urls; } });
            }
        } else {
            $.jBox.closeTip();
            if (json.needLogin) {
                showLoginLay();
            } else {
                $.jBox.error(json.Error, '系统提示');
            }
        }
    };
    $.fn.WsAjax({
        url: "/services/member.aspx?action=" + action + "&jsoncallback=?&" + Math.random(),
        data: datas,
        beforeSend: function () { $.jBox.tip(loadString, 'loading'); },
        success: ok
    });
}

function addBookMark(bid, cid) {
    MemberActionSubmit('恭喜，加入书架/书签 成功！', 'addBookMark', "正在保存 加入书架/书签，请稍后...", { "bid": bid, "cid": cid });
}

/* ubb 转换处理 */
function htmlUBB_trans(str) {
    var re = /\[em=([\w]+)\]/ig;
    str = str.replace(re, "<img src=\"/images/em/$1_thumb.gif\" alt=\"emote\" />&nbsp;");
    re = /(\[color=(.[^\[]*)\])(.*?)(\[\/color\])/ig;
    str = str.replace(re, "<font color=$2>$3</font>");
    return str;
}

$(function () {
    $.metadata.setType("attr", "data-meta");
    function isNotCss3() {//判断浏览器版本
        if ($.browser.msie) {
            var $v = parseInt($.browser.version);
            if ($v < 9) {
                return $v;
            } else {
                return false;
            }
        }
        return false;
    }
    //水印
    $.each($('.j_watermark'), function (i, n) {
        if (typeof ($(n).attr('watermark')) != 'undefined')
            $(n).watermark($(n).attr('watermark'));
    });
    //tab
    $('.j_tabs').tabs('.j_tabCnt', { event: 'mouseover' });
    //文字循环滚动
    $('.j_textSlider').textSlider({ line: 1, speed: 400, timer: 3000 });
    //hover
    if (isNotCss3() == 6) {
        $('.j_hover').each(function () {
            var hoverTag = $(this).metadata().hoverTag;
            if (!hoverTag) {
                hoverTag = 'li';
            }
            var dataHover = $(this).data("hovers");
            if (dataHover) {
                $(this).removeData("hovers");
                $(this).children(hoverTag).unbind("hover");
            }
            dataHover = 'bindHover';
            $(this).data("hovers", dataHover);
            $('.j_hover >' + hoverTag).hover(function () {
                $(this).addClass('hover');
            }, function () {
                $(this).removeClass('hover');
            });
        });


        var firstTag = $('.j_first').metadata().firstTag;
        if (!firstTag) {
            firstTag = 'li';
        }
        $('.j_first >' + firstTag + ':first').addClass('first');
    }
    //弹出框
    $("#overlay-login").overlay({
        speed: 0,
        fixed: false,
        closeOnClick: false,
        closeOnEsc: false,
        closeSpeed: 0,
        top: 'center',
        mask: {
            color: '#000',
            opacity: 0.5,
            closeSpeed: 0,
            loadSpeed: 0
        }
    });
    //展开收起
    $('.j_show').live('click', function () {
        var changeTxt = $(this).metadata().changeTxt;
        var showTxt = new Array();
        if (changeTxt)
            showTxt = changeTxt.split(',');
        var showCnt = $(this).parents('.j_showParent:first').find('.j_showCnt:first');
        if (showCnt.is(':hidden')) {
            if (changeTxt)
                $(this).html(showTxt[1]);
            $(this).addClass('showOpen');
            showCnt.slideDown();
        } else {
            if (changeTxt)
                $(this).html(showTxt[0]);
            $(this).removeClass('showOpen');
            showCnt.slideUp();
        }
    });
    //其他
    $('.j_odd').each(function (i, n) {
        var tag = $(this).metadata().tag;
        if (!tag) tag = 'li';
        $(this).children('"' + tag + ':odd"').addClass('odd');
    });
    //首页幻灯片
    var $dot = $("#j_slide > a");
    var $cnt = $('#j_slideCnt > div');
    var $size = $dot.length, stopApi = true;
    //初始化
    var currentIndex = init($dot, $cnt); var futureIndex = currentIndex + 1;
    function init(dot, cnt) {
        var fistDot = dot.filter('a.current'), index;
        fistDot.length > 0 ? index = fistDot.index() : index = 0;
        dot.eq(index).addClass('current');
        cnt.hide().eq(index).fadeIn(150);
        return index;
    }
    //控制点
    $dot.bind('mouseover', function () {
        futureIndex = $(this).index();
        if (dotChange($(this))) fade();
    });
    function dotChange(currentDot) {
        if (typeof (currentDot) == 'undefined') currentDot = $dot.eq(futureIndex);
        if (currentDot.hasClass('current')) return false;
        if ($cnt.eq(currentIndex).is(':animated')) return false;
        currentDot.addClass('current').siblings().removeClass('current');
        return true;
    }
    //切换效果
    function fade() {
        $cnt.eq(currentIndex).fadeOut(150);
        $cnt.eq(futureIndex).fadeIn(150);
        currentIndex = futureIndex;
    }
    //自动切换
    var interval = function () {
        if (stopApi) {
            getIndex();
            if (dotChange()) fade();
        }
    };
    var timing = setInterval(interval, 4000);
    //移除自动切换
    closeAuto($dot); closeAuto($cnt);
    function closeAuto(object) {
        object.hover(function () {
            clearInterval(timing);
        }, function () {
            timing = setInterval(interval, 4000);
        });
    }
    //获取当前索引值
    function getIndex(direction) {
        if (direction == 'prev') {
            currentIndex == 0 ? futureIndex = $size - 1 : futureIndex = currentIndex - 1;
        } else {
            $size == currentIndex + 1 ? futureIndex = 0 : futureIndex = currentIndex + 1;
        }
    }
    /*$('.j_scrollTo').click(function(){
		$($(this).attr('href')).ScrollTo(300);
		return false;
	});*/


    $("#checkedAll").click(function () {
        var isChecked = $(this).is(":checked");
        $(":input[name='chk_bid']").each(function () {
            if (!$(this).is(":disabled")) {
                $(this).attr("checked", isChecked);
            }
        });
    });

    $(".userLogin").click(function () { showLoginLay(); });
    $("#chkLogin").click(function () {
        checkLogin($("#lusername").val(), $("#lpassword").val(), $("#vcode").val(), $("#lsaveLogin").is(':checked') == true ? 1 : 0, location.href);
    });

    //$('header').css({ 'position': 'fixed', 'left': 0, 'top': 0, 'width': '100%', 'z-index': 100 }).wrap('<div style="height:141px;"></div>');
});

flyLogin();
flyCase();