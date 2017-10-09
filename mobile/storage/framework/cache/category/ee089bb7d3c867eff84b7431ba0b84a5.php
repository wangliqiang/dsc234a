<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="black"/>
    <meta name="format-detection" content="telephone=no"/>
    <meta name="description" content="<?php echo $description; ?>"/>
    <meta name="keywords" content="<?php echo $keywords; ?>"/>
    <title><?php echo $page_title; ?></title>
    <?php echo global_assets('css');?>
    <script type="text/javascript">var ROOT_URL = '/dsc234a/mobile/';</script>
    <?php echo global_assets('js');?>
    <?php if($is_wechat) { ?>
    <script type="text/javascript" src="https://res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>
    <script type="text/javascript">
        // 分享内容
        var shareContent = {
            title: '<?php echo ($share_data['title']); ?>',
            desc: '<?php echo ($share_data['desc']); ?>',
            link: '<?php echo ($share_data['link']); ?>',
            imgUrl: '<?php echo ($share_data['img']); ?>',
            success: function (res) {
                // 用户确认分享后执行的回调函数
                // res {"checkResult":{"onMenuShareTimeline":true},"errMsg":"onMenuShareTimeline:ok"}
                console.log(JSON.stringify(res));
                var msg = res.errMsg;
                var jsApiname = msg.replace(':ok','');
                shareCount(jsApiname,'<?php echo ($share_data['link']); ?>');
            }
        };

        // 分享统计
        function shareCount(jsApiname = '', link = ''){
            $.post('<?php echo url("wechat/jssdk/count");?>', {jsApiname: jsApiname, link:link}, function (res) {
                if(res.status == 200){
                    //
                }
            }, 'json');
        }

        $(function(){
            var url = window.location.href;
            var jsConfig = {
                debug: false,
                jsApiList: [
                    'onMenuShareTimeline',
                    'onMenuShareAppMessage',
                    'onMenuShareQQ',
                    'onMenuShareQZone'
                ]
            };
            $.post('<?php echo url("wechat/jssdk/index");?>', {url: url}, function (res) {
                if(res.status == 200){
                    jsConfig.appId = res.data.appId;
                    jsConfig.timestamp = res.data.timestamp;
                    jsConfig.nonceStr = res.data.nonceStr;
                    jsConfig.signature = res.data.signature;
                    // 配置注入
                    wx.config(jsConfig);
                    // 事件注入
                    wx.ready(function () {
                        wx.onMenuShareTimeline(shareContent);
                        wx.onMenuShareAppMessage(shareContent);
                        wx.onMenuShareQQ(shareContent);
                        wx.onMenuShareWeibo(shareContent);
                        wx.onMenuShareQZone(shareContent);
                    });
                }
            }, 'json');
        })
    </script>
    <?php } ?>
</head>
<body>
<p style="text-align:right; display:none;"><?php echo config('shop.stats_code');?></p>
<div id="loading"><img src="<?php echo elixir('img/loading.gif');?>" /></div>

<div class="con">
    <div class="category-top blur-div">
        <header>
            <section class="search category-search">
                <div class="text-all dis-box j-text-all text-all-back">
                    <div class="box-flex input-text n-input-text i-search-input">
                        <a class="a-search-input" href="<?php echo url('search/index/index');?>"></a>
                        <div class="j-input-text nav-soso"><i class="iconfont icon-sousuo"></i>商品/店铺搜索</div>
                    </div>
                    <?php if($cat_id) { ?>
                    <a href="javascript:void(0)" class="s-filter j-s-filter">筛选</a>
                    <?php } ?>
                </div>
            </section>
        </header>
        <aside>
            <div class="menu-left" id="sidebar">
                <ul>
                    <?php $n=1;if(is_array($category)) foreach($category as $key=>$val) { ?>
                    <li data="<?php echo url('category/index/childcategory', array('id'=>$val['id']));?>" data-id="<?php echo ($val['id']); ?>">
                        <?php echo sub_str($val['name'], 4,'');?>
                    </li>
                    <?php $n++;}unset($n); ?>
                </ul>
            </div>
        </aside>
        <section class="menu-right padding-all" style="margin-bottom:4.6rem">
            <ul class="child_category"></ul>
            <script id="category" type="text/html">
                <%each category as value%>
                <%if value.cat_id%>
                <a href="<%value.url%>"><h5><%value.name%></h5></a>
                <ul>
                    <%each value.cat_id as cat%>
                    <li class="w-3"><a href="<%cat.url%>"></a><img src="<%cat.cat_img%>" alt="<%cat.name%>"/><span><%cat.name%></span>
                    </li>
                    <%/each%>
                </ul>
                <%else%>
                <li class="w-3"><a href="<%value.url%>"></a><img src="<%value.cat_img%>" alt="<%value.name%>"/><span><%value.name%></span>
                </li>
                <%/if%>
                <%/each%>
            </script>
        </section>
    </div>
    <footer class="footer-nav dis-box">
        <a href="<?php echo url('/');?>" class="box-flex nav-list">
            <i class="nav-box i-home"></i><span>首页</span>
        </a>
        <a href="<?php echo url('category/index/index');?>" class="box-flex nav-list  active">
            <i class="nav-box i-cate"></i><span>分类</span>
        </a>
        <a href="<?php echo url('search/index/index');?>" class="box-flex nav-list">
            <i class="nav-box i-shop"></i><span>搜索</span>
        </a>
        <a href="<?php echo url('cart/index/index');?>" class="box-flex position-rel nav-list">
            <i class="nav-box i-flow"></i><span>购物车</span>
        </a>
        <?php if($filter) { ?>
        <a href="<?php echo url('drp/user/index');?>" class="box-flex nav-list">
            <i class="nav-box i-user"></i><span><?php echo $custom; ?>中心</span>
        </a>
        <?php } elseif ($community) { ?>
        <a href="<?php echo url('community/index/index');?>" class="box-flex nav-list">
            <i class="nav-box i-user"></i><span>社区</span>
        </a>
        <?php } else { ?>
        <a href="<?php echo url('user/index/index');?>" class="box-flex nav-list">
            <i class="nav-box i-user"></i><span>我</span>
        </a>
        <?php } ?>
    </footer>
    <!--悬浮菜单e-->
</div>
<script type="text/javascript">
    $(function () {
        var cat_id = 0;
        //取出上次位置的值并保存
        var sLocalCateO = sessionStorage.getItem("sCateO");
        if (sLocalCateO != "" && sLocalCateO) {
            var oCate = JSON.parse(sLocalCateO);
            ajaxAction($("#sidebar li:first"), oCate.sData, oCate.sDataId);
            $(".menu-left ul li").each(function () {
                $(this).removeClass("active")
                if ($(this).attr("data-id") == oCate.sDataId) {
                    $(this).addClass("active")
                }
            })
        } else {
            ajaxAction($("#sidebar li:first"), $("#sidebar li:first").attr("data"), $("#sidebar li:first").attr("data-id"));
        }

        $("#sidebar li").click(function () {
            var li = $(this);
            var url = $(this).attr("data");
            var id = $(this).attr("data-id");
            ajaxAction(li, url, id);
        });

        function ajaxAction(obj, url, id) {
            if (cat_id != id) {
                $.ajax({
                    type: 'get',
                    url: url,
                    data: '',
                    cache: true,
                    async: false,
                    dataType: 'json',
                    beforeSend: function () {
                        $(".loading").show();
                    },
                    success: function (result) {
                        if (typeof(result.code) == 'undefined') {
                            $(window).scrollTop(0);
                            template.config('openTag', '<%');
                            template.config('closeTag', '%>');
                            var html = template('category', result);
                            $(".child_category").html(html);
                            //$(".child_category ul").html(result);
                            obj.addClass("active").siblings("li").removeClass("active");
                        }
                        else {
                            d_messages(result.message);
                        }
                    },
                    complete: function () {
                        $(".loading").hide();
                    }
                });
                cat_id = id;
            }
        }

        //返回之前页面的操作位置
        //将value存储到key字段
        $(".menu-left").scroll(function () {
            if ($(".menu-left").scrollTop() != 0) {
                sessionStorage.setItem("offsetTop", $(".menu-left").scrollTop());//保存滚动位置
            }
        });
        //取出并滚动到上次保存位置
        var _offset = sessionStorage.getItem("offsetTop");
        $(".menu-left").scrollTop(_offset);

        //将value存储到key字段
        $(".menu-left ul li").click(function () {
            if ($(this).hasClass("active")) {
                var sDataId = $(this).attr("data-id"),
                    sData = $(this).attr("data")
                sO = JSON.stringify({
                    sDataId: sDataId,
                    sData: sData
                })
                sessionStorage.setItem("sCateO", sO);//保存id,data
            }
        });
        setTimeout(function () {
            sessionStorage.removeItem("offsetTop");
            sessionStorage.removeItem("sCateO");
        }, 10000);

    })
</script>
</body>
</html>