<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $lang['cp_home']; ?></title>
<?php echo global_assets('css', 'wechat');?>
<script type="text/javascript">var ROOT_URL = '/dsc234a/mobile/';</script>
<?php echo global_assets('js', 'wechat');?>

</head>
<body>

<div class="wrapper">
	<div class="title"><?php echo $lang['wechat_menu']; ?> - 自动回复</div>
	<div class="content_tips">
		<div class="tabs_info">
    	    <ul>
        		<li class="curr"><a href="<?php echo url('reply_subscribe');?>">关注自动回复</a></li>
		        <li><a href="<?php echo url('reply_msg');?>">消息自动回复</a></li>
		        <li><a href="<?php echo url('reply_keywords');?>">关键词自动回复</a></li>
    	    </ul>
	  </div>
    <div class="explanation" id="explanation">
        <div class="ex_tit"><i class="sc_icon"></i><h4>操作提示</h4><span id="explanationZoom" title="收起提示"></span></div>
        <ul>
          <li>自动回复的类型 共分三种：关注自动回复、消息自动回复、关键词自动回复。回复内容可以设置为文字，图片，语音，视频。文本消息回复内容可以直接填写，长度限制1024字节（大约200字，含标点以及其他特殊字符），其他素材需要先在素材管理中添加。</li>
          <li>一、关注自动回复：即用户首次关注，自动回复的消息，重新关注也回复。例如：欢迎关注微信公众号！</li>
          <li>★ 关注自动回复，不支持图文消息素材。</li>
        </ul>
    </div>
		<div class="flexilist">
			<div class="main-info">
                <form action="<?php echo url('reply_subscribe');?>" method="post">
                  <div class="panel panel-default">
                      <div class="panel-heading">
                      <ul class="nav nav-pills" role="tablist">
                        <li role="presentation"><a href="javascript:;" class="glyphicon glyphicon-pencil ectouch-fs18" title="文字"></a></li>
                        <li role="presentation"><a href="<?php echo url('auto_reply', array('type'=>'image'));?>" class="glyphicon glyphicon-picture ectouch-fs18 fancybox fancybox.iframe" title="图片"></a></li>
                        <li role="presentation"><a href="<?php echo url('auto_reply', array('type'=>'voice'));?>" class="glyphicon glyphicon-volume-up ectouch-fs18 fancybox fancybox.iframe"  title="语音"></a></li>
                        <li role="presentation"><a href="<?php echo url('auto_reply', array('type'=>'video'));?>" class="glyphicon glyphicon-film ectouch-fs18 fancybox fancybox.iframe"  title="视频"></a></li>
                      </ul>
                      </div>
                      <div class="panel-body" style="padding:0;">
                        <div <?php if($subscribe['media_id']) { ?>class="hidden"<?php } ?>><textarea name="content" placeholder="文本内容" rows="6" class="form-control" style="border:none;"><?php if($subscribe['content']) { echo $subscribe['content']; } ?></textarea></div>
                        <div class="<?php if(empty($subscribe) || $subscribe['content']) { ?>hidden<?php } ?> col-xs-6 col-md-3 thumbnail content" style="border:none;">
                            <?php if($subscribe['media']) { ?>
                                <?php if($subscribe['media']['type'] == 'voice') { ?>
                                    <input type='hidden' name='media_id' value="<?php echo $subscribe['media_id']; ?>"><img src='<?php echo elixir("img/voice.png");?>' class='img-rounded' /><span class='help-block'><?php echo $subscribe['media']['file_name']; ?></span>
                                <?php } elseif ($subscribe['media']['type'] == 'video') { ?>
                                    <input type='hidden' name='media_id' value="<?php echo $subscribe['media_id']; ?>"><img src='<?php echo elixir("img/video.png");?>' class='img-rounded' /><span class='help-block'><?php echo $subscribe['media']['file_name']; ?></span>
                                <?php } else { ?>
                                    <input type='hidden' name='media_id' value="<?php echo $subscribe['media_id']; ?>"><img src="<?php echo $subscribe['media']['file']; ?>" class='img-rounded' />
                                <?php } ?>
                            <?php } ?>
                        </div>
                      </div>
                  </div>
                  <div class="form-group">
                  	  <div class="info_btn">
	                    <input type="hidden" name="content_type" value="text" />
	                    <input type="submit" class="button btn-danger bg-red" name="submit" value="保存" />
	                    <input type="reset" class="button button_reset" name="reset" value="清除内容" />
	                  </div>
                  </div>
                </form>
            </div>
        </div>
	</div>
</div>
<script type="text/javascript">
$(function(){
    $(".nav-pills li").click(function(){
        var index = $(this).index();
        var tab = $(this).parent().parent(".panel-heading").siblings(".panel-body");
        if(index == 0){
    	    tab.find("div").addClass("hidden");
            tab.find("div").eq(index).removeClass("hidden");
            $("input[name=content_type]").val("text");
        }
    });
})
</script>
<!-- 版权 -->
<div id="footer">
    <p><?php echo $lang['copyright']; ?></p>
</div>

<script type="text/javascript">
$(function(){
	// 操作提示
	$("#explanationZoom").on("click",function(){
		var explanation = $(this).parents(".explanation");
		var width = $(".content_tips").width();
		if($(this).hasClass("shopUp")){
			$(this).removeClass("shopUp");
			$(this).attr("title","收起提示");
			explanation.find(".ex_tit").css("margin-bottom",10);
			explanation.animate({
				width:width-0
			},300,function(){
				$(".explanation").find("ul").show();
			});
		}else{
			$(this).addClass("shopUp");
			$(this).attr("title","提示相关设置操作时应注意的要点");
			explanation.find(".ex_tit").css("margin-bottom",0);
			explanation.animate({
				width:"118"
			},300);
			explanation.find("ul").hide();
		}
	});


	//弹出框
	$(".fancybox").fancybox({
		width		: '60%',
		height		: '60%',
		closeBtn	: true,
		title       : ''
	});

	// 删除
    $(".delete").click(function(){
        var url = $(this).attr("data-href");
        //询问框
        layer.confirm('您确定要删除此条记录吗？', {
            btn: ['确定','取消'] //按钮
        }, function(){
            window.location.href = url;
        });
    });


});

// 修改分页数量
function changePageSize(e){
    var keynum = window.event ? e.keyCode : e.which;
    if (keynum == 13)
    {
        var page_num = $("#pageSize").val();
        $.post("<?php echo url('index');?>", {page_num:page_num}, function(data){
            if(data.status > 0){
                window.location.reload();
            }
        }, 'json');
        return false;
    }
}
</script>
</body>
</html>