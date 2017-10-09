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

<div class="wrapper shop_special">
	<div class="title"><?php echo $lang['wechat_menu']; ?> - 公众号设置</div>
	<div class="content_tips">
		<div class="explanation" id="explanation">
        	<div class="ex_tit"><i class="sc_icon"></i><h4>操作提示</h4><span id="explanationZoom" title="收起提示"></span></div>
            <ul>
            	<li>一、配置前先需要申请一个微信服务号，并且通过微信认证。（认证服务号需要注意每年微信官方都需要重新认证，如果认证过期，接口功能将无法使用，具体请登录微信公众号平台了解详情）</li>
            	<li>二、网站域名 需要通过ICP备案并正确解析到空间服务器，临时域名与IP地址无法配置。</li>
            	<li>三、登录 <a href="https://mp.weixin.qq.com/" target="_blank"/>微信公众号平台 </a>，获取且依次填写好 公众号名称，公众号原始ID，Appid，Appsecret，token值。 </li>
            	<li>四、自定义Token值，必须为英文或数字（长度为3-32字符），如 weixintoken，并保持后台与公众号平台填写的一致。 </li>
            	<li>五、复制接口地址，填写到微信公众号平台 开发=> 基本配置，服务器配置下的 URL地址，验证提交通过后，并启用。（注意仅支持80端口） </li>
            </ul>
        </div>
		<div class="flexilist">
			<div class="main-info">
				<!--<div class="panel-heading"><?php echo $lang['edit_wechat']; ?></div>-->
				<form method="post" action="<?php echo url('modify');?>" class="form-horizontal" role="form">
					<div class="switch_info">
						<div class="item">
							<div class="label-t"><?php echo $lang['wechat_name']; ?></div>
							<div class="label_value">
								<input type="text" name="data[name]" class="text" value="<?php echo $data['name']; ?>"/>
								<div class="notic">* <?php echo $lang['wechat_help1']; ?></div>
							</div>
						</div>
						<div class="item">
							<div class="label-t"><?php echo $lang['wechat_id']; ?></div>
							<div class="label_value">
								<input type="text" name="data[orgid]" class="text" value="<?php echo $data['orgid']; ?>">
						    <div class="notic">* <?php echo $lang['wechat_help2']; ?></div>
							</div>
						</div>
						<div class="item">
							<div class="label-t"><?php echo $lang['appid']; ?></div>
							<div class="label_value">
								<input type="text" name="data[appid]" class="text" value="<?php echo $data['appid']; ?>">
								<div class="notic">* <?php echo $lang['wechat_help4']; ?></div>
							</div>
						</div>
						<div class="item">
							<div class="label-t"><?php echo $lang['appsecret']; ?></div>
							<div class="label_value">
								<input type="text" name="data[appsecret]" class="text" value="<?php echo $data['appsecret']; ?>">
								<div class="notic">* <?php echo $lang['wechat_help5']; ?></div>
							</div>
						</div>
						<div class="item">
							<div class="label-t"><?php echo $lang['token']; ?></div>
							<div class="label_value">
								<input type="text" name="data[token]" class="text" value="<?php echo $data['token']; ?>">
								<div class="notic">* <?php echo $lang['wechat_help3']; ?></div>
							</div>
						</div>
				        <div class="item">
							<div class="label-t"><?php echo $lang['aeskey']; ?></div>
							<div class="label_value">
								<input type="text" name="data[encodingaeskey]" class="text" value="<?php echo $data['encodingaeskey']; ?>">
								<div class="notic">(选填) <?php echo $lang['wechat_help7']; ?></div>
							</div>
						</div>
						<!--<tr>
							<td>微信授权回调域名</td>
							<td><div class="col-sm-4">
								<input type="text" name="data[oauth_redirecturi]" class="form-control" value="<?php echo $data['oauth_redirecturi']; ?>">
								</div>
								<p class="help-block">示例格式：http://shop.ectouch.cn</p>
							</td>
						</tr>
						 <tr>
							<td>微信OAuth推送量</td>
							<td><div class="col-sm-4">
								<input type="text" name="data[oauth_count]" class="form-control" value="<?php echo $data['oauth_count']; ?>" readonly>
								</div>
							</td>
						</tr>
						<tr>
							<td><?php echo $lang['sort_order']; ?></td>
							<td><div class="col-sm-4">
								<input type="text" name="data[sort]" value="10" class="form-control" value="<?php echo $data['sort']; ?>">
								</div></td>
						</tr>
						<tr>
							<td>电脑端账号绑定</td>
							<td><div class="col-sm-4 col-lg-2 col-md-3">
								<div  class="btn-group" data-toggle="buttons">
									<label class="btn btn-primary <?php if($data['oauth_status']==1) { ?>active<?php } ?>">
										<input type="radio" name="data[oauth_status]" value="1" <?php if($data['oauth_status']==1) { ?>checked<?php } ?>> <?php echo $lang['wechat_open']; ?>
									</label>
									<label class="btn btn-primary <?php if($data['oauth_status']==0) { ?>active<?php } ?>">
										<input type="radio" name="data[oauth_status]" value="0" <?php if($data['oauth_status']==0) { ?>checked<?php } ?>> <?php echo $lang['wechat_close']; ?>
									</label>
								</div>
								</div>
								<p class="help-block">开启之后，微商城会员中心会出现电脑端账号绑定按钮，绑定后不再出现。</p>
							</td>
						</tr>-->
						<div class="item">
							<div class="label-t"><?php echo $lang['wechat_status']; ?></div>
							<div class="label_value">
								<div class="checkbox_items">
		                            <div class="checkbox_item">
					                    <input type="radio" name="data[status]" class="ui-radio event_zhuangtai" id="value_118_0" value="1" <?php if($data['status'] == 1) { ?>checked<?php } ?>>
					                    <label for="value_118_0" class="ui-radio-label <?php if($data['status']==1) { ?>active<?php } ?>"><?php echo $lang['wechat_open']; ?></label>
					                </div>
					                <div class="checkbox_item">
					                    <input type="radio" name="data[status]" class="ui-radio event_zhuangtai" id="value_118_1" value="0" <?php if($data['status'] == 0) { ?>checked<?php } ?>>
					                    <label for="value_118_1" class="ui-radio-label <?php if($data['status'] == 0) { ?>active<?php } ?>"><?php echo $lang['wechat_close']; ?></label>
					                </div>
                                </div>
							</div>
						</div>
						<?php if($data['orgid']) { ?>
						<div class="item">
							<div class="label-t"><?php echo $lang['wechat_api_url']; ?></div>
							<div class="label_value">
								<span class="text weixin_url"><?php echo ($data['url']); ?></span>
							</div>
						</div>
						<?php } ?>
						<div class="item">
							<div class="label-t">&nbsp;</div>
							<div class="label_value info_btn">
								<input type="hidden" name="id" value="<?php echo $data['id']; ?>" />
								<input type="hidden" name="data[type]" value="2">
								<input type="submit" name="submit" value="<?php echo $lang['button_save']; ?>" class="button btn-danger bg-red" />
							</div>
						</div>
					</div>
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