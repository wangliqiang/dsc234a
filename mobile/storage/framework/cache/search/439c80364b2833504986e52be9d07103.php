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

<body class="show-search-div">
<div class="search-div j-search-div ts-3">
    <section class="search common-search">
        <form action="<?php echo url('/');?>?m=category&a=search" method="post" id="search-form">
        <div class="text-all dis-box j-text-all text-all-back">
            <a class="a-icon-back"  href="javascript:history.go(-1);"><i class="iconfont icon-back"></i></a>
            <div class="box-flex input-text">
                <label class="search-check j-search-check" data="2">
                    <span>商品</span><i class="iconfont icon-xiajiantou"></i>
                </label>
                <input class="j-input-text" type="text" name="keyword"  autofocus="autofocus" placeholder="<?php if($keywords) { echo $keywords; } else { ?>商品/店铺搜索<?php } ?>" />
                <input type="hidden" name="type_select" value="2" />
                <input type="hidden" name="isself" value="<?php echo $isself; ?>" />
                <input type="hidden" name="brand" value="<?php echo $brand_id; ?>" />
                <input type="hidden" name="price_min" value="<?php echo $price_min; ?>" />
                <input type="hidden" name="price_max" value="<?php echo $price_max; ?>" />
                <input type="hidden" name="filter_attr" value="<?php echo $filter_attr; ?>"/>
            </div>
            <a type="button" class="btn-submit search-btn" onclick="$('#search-form').submit()">搜索</a>
        </div>
        </form>
    </section>
    <section class="search-con">
        <div class="history-search">
           <!-- <div class="swiper-wrapper">
                <div class="swiper-slide">-->
                    <p>
                        <label class="fl">热门搜索</label>
                    </p>
                    <ul class="hot-search a-text-more a-text-more-btn">
                        <?php $n=1;if(is_array($hot_keywords)) foreach($hot_keywords as $v) { ?>
                        <li class="w-3"><a href="<?php echo url('category/index/search', array('keyword'=>$v));?>"><span class="onelist-hidden"><?php echo $v; ?></span></a></li>
                        <?php $n++;}unset($n); ?>
                    </ul>
                    <p class="hos-search">
                        <label class="fl">最近搜索</label>
                        <span class="fr clear_history"><i class="iconfont icon-xiao10"></i></span>
                    </p>
                    <?php if($history_keywords) { ?>
                    <ul class="hot-search a-text-more a-text-more-btn" id="search-con">
                        <?php $n=1;if(is_array($history_keywords)) foreach($history_keywords as $v) { ?>
                        <?php if($v) { ?>
                        <li class="w-3"><a href="<?php echo url('category/index/search', array('keyword'=>$v));?>"><span class="onelist-hidden"><?php echo $v; ?></span></a></li>
                        <?php } ?>
                        <?php $n++;}unset($n); ?>
                    </ul>
                    <?php } else { ?>
                    <div class="no-div-message">
                        <h6 class="f-04 col-9">暂无搜索记录</h6>
                    </div>
                    <?php } ?>
                <!--</div>
            </div>-->
        <div class="swiper-scrollbar"></div>
        </div>
    </section>
    <div class="other-login search-footer">
            <h4 class="title-hrbg"><a href="javascript:history.go(-1);"><span class="col-6">点击关闭搜索</span></a>
                <hr>
            </h4>
    </div>
    <!--<a href="javascript:history.go(-1);">
     <footer class="close-search">
      关闭
    </footer>
    </a>-->
</div>
<script type="text/javascript">
    $(function(){
        //清除搜索记录
        var history = <?php if($history_keywords) { echo $history_keywords; } else { ?>""<?php } ?>;
        $(".clear_history").click(function(){
            if(history && $("ul#search-con").length > 0){
                $.get("<?php echo url('category/index/clear_history');?>", '', function(data){
                    if(data.status){
                        $("#search-con").remove();
                        var no = '<div class="no-div-message"><p>暂无搜索记录</p></div>';
                        $(".hos-search").after(no);
                    }
                }, 'json');
            }
        });
    })
</script>
</body>
</html>