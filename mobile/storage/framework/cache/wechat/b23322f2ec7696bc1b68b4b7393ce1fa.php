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

<style>
.article{border:1px solid #ddd;padding:5px 5px 0 5px;}
.cover{height:160px; position:relative;margin-bottom:5px;overflow:hidden;}
.article .cover img{width:100%; height:auto;}
.article span{height:40px; line-height:40px; display:block; z-index:5; position:absolute;width:100%;bottom:0px; color:#FFF; padding:0 10px; background-color:rgba(0,0,0,0.6)}
.article_list{padding:5px;border:1px solid #ddd;border-top:0;overflow:hidden;}
.radio label{width:100%;position:relative;padding:0;}
.radio .news_mask{position:absolute;left:0;top:0;background-color:#000;opacity:0.5;width:100%;height:100%;z-index:10;}
</style>
<div class="wrapper">
	<div class="title"><?php echo $lang['wechat_menu']; ?> - 群发消息</div>
	<div class="content_tips">
    <div class="tabs_info">
    	  <ul>
	        		<li class="curr"><a href="<?php echo url('mass_message');?>">群发信息</a></li>
	        		<li><a href="<?php echo url('mass_list');?>">发送记录</a></li>
    	  </ul>
    </div>
    <div class="explanation" id="explanation">
        <div class="ex_tit">
        	<i class="sc_icon"></i>
        	<h4>操作提示</h4>
        	<span id="explanationZoom" title="收起提示"></span>
        </div>
        <ul>
        	  <li>该接口暂时仅提供给已微信认证的服务号</li>
        	  <li>用户每月只能接收4条群发消息，多于4条的群发将对该用户发送失败。</li>
        	  <li>群发图文消息的标题上限为64个字节,群发内容字数上限为1200个字符、或600个汉字。</li>
        	  <li>在返回成功时，意味着群发任务提交成功，并不意味着此时群发已经结束，所以，仍有可能在后续的发送过程中出现异常情况导致用户未收到消息，如消息有时会进行审核、服务器不稳定等。此外，群发任务一般需要较长的时间才能全部发送完毕，请耐心等待。</li>
        </ul>
    </div>
    <div class="flexilist">
    	  <div class="main-info">
        <form action="<?php echo url('mass_message');?>" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">
        <table id="general-table" class="table table-hover ectouch-table">
        <tr>
            <td width="200" class="text-align-r">选择标签组：</td>
            <td>
              <div class="col-md-2">
                <select name="tag_id" class="form-control input-sm">
                    <?php $n=1;if(is_array($tags)) foreach($tags as $val) { ?>
                    <option value="<?php echo $val['tag_id']; ?>"><?php echo $val['name']; ?></option>
                    <?php $n++;}unset($n); ?>
                </select>
              </div>
              <div class="notic">每次群发前，需要先更新粉丝管理</div>
            </td>
          </tr>
          <tr>
            <td width="200" class="text-align-r">选择图文信息：</td>
            <td>
                <div class="col-md-5 label_value">
                    <div class="fl" style="margin-right:20px;">
                        <a class="btn button btn-info bg-green fancybox fancybox.iframe" href="<?php echo url('auto_reply', array('type'=>'news'));?>">选择图文信息</a>
                    </div>
                    <div class="notic">一个图文消息支持1到8条图文，多于8条会发送失败</div>
                </div>
            </td>
          </tr>
          <tr>
            <td width="200" class="text-align-r">图文信息：</td>
            <td><div class="col-md-3 content"></div></td>
          </tr>
          <tr>
            <td width="200"></td>
            <td>
                <div class="label_value info_btn">
                    <input type="submit" value="<?php echo $lang['button_submit']; ?>" class="button btn-danger bg-red" />
                    <input type="reset" value="<?php echo $lang['button_reset']; ?>" class="button button_reset" />
                </div>
            </td>
          </tr>
          </table>
          </form>
        </div>
    </div>
  </div>
</div>
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