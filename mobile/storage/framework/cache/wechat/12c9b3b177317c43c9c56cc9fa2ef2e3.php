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
#footer {position: static;bottom:0px;}
</style>
<div class="wrapper">
   <div class="title"><?php echo $lang['wechat_menu']; ?> - 自定义菜单</div>
   <div class="content_tips">
		<div class="explanation" id="explanation">
        	<div class="ex_tit"><i class="sc_icon"></i><h4>操作提示</h4><span id="explanationZoom" title="收起提示"></span></div>
            <ul>
            	<li>微信自定义菜单最多可添加3个一级菜单、5个二级菜单。</li>
                <li>微信自定义菜单分为关键词click，网址view两种类型。click是响应关键词指令，view则是直接跳转URL地址（填写绝对路径）。</li>
                <li>每次修改自定义菜单后，由于微信客户端缓存，需要24小时左右微信客户端才会显示生效。测试时可以尝试重新关注微信公众号，或者清除微信缓存。</li>
            </ul>
        </div>
   	   <div class="flexilist">
            <div class="common-head">
            	<div class="fl">
                	<a href="<?php echo url('menu_edit');?>" class="fancybox fancybox.iframe"><div class="fbutton"><div class="add"><span><i class="fa fa-plus"></i><?php echo $lang['menu_add']; ?></span></div></div></a>
                </div>
            </div>
            <div class="common-content">
                <form action="<?php echo url('menu');?>" method="post" class="form-horizontal" role="form">
                    <div class="list-div">
            	        <table cellpadding="0" cellspacing="0" border="0">
            	        	<thead>
            			            <tr>
            			              <th width="10%"><div class="tDiv"><?php echo $lang['menu_name']; ?></div></th>
            			              <th width="10%"><div class="tDiv"><?php echo $lang['menu_keyword']; ?></div></th>
            			              <th width="50%"><div class="tDiv"><?php echo $lang['menu_url']; ?></div></th>
            			              <th width="10%"><div class="tDiv"><?php echo $lang['sort_order']; ?></div></th>
            			              <th width="20%"><div class="tDiv"><?php echo $lang['handler']; ?></div></th>
            			            </tr>
            	            </thead>
            	            <tbody>
            	            <?php $n=1;if(is_array($list)) foreach($list as $key=>$val) { ?>
            	            <tr>
            	              <td><div class="tDiv"><?php echo $val['name']; ?></div></td>
            	              <td><div class="tDiv"><?php echo $val['key']; ?></div></td>
            	              <td><div class="tDiv"><?php echo $val['url']; ?></div></td>
            	              <td><div class="tDiv"><?php echo $val['sort']; ?></div></td>
            	              <td class="handle">
            	              	<div class="tDiv a2">
            			              	<a href="<?php echo url('menu_edit', array('id'=>$val['id']));?>" class="btn_edit fancybox fancybox.iframe"><i class="fa fa-edit"></i><?php echo $lang['wechat_editor']; ?></a>
            			              	<a href="javascript:if(confirm('<?php echo $lang['confirm_delete']; ?>')){window.location.href='<?php echo url('menu_del', array('id'=>$val['id']));?>'};" class="btn_trash"><i class="fa fa-trash-o"></i><?php echo $lang['drop']; ?></a>
            	               </div>
            	              </td>
            	            </tr>
            	            <?php $n=1;if(is_array($val['sub_button'])) foreach($val['sub_button'] as $k=>$v) { ?>
            	            <tr>
            	              <td><div class="tDiv">&nbsp;|---- &nbsp;&nbsp;<?php echo $v['name']; ?></div></td>
            	              <td><div class="tDiv"><?php echo $v['key']; ?></div></td>
            	              <td><div class="tDiv"><?php echo $v['url']; ?></div></td>
            	              <td><div class="tDiv"><?php echo $v['sort']; ?></div></td>
            	              <td class="handle">
            	              	<div class="tDiv a2">
            	              		<a href="<?php echo url('menu_edit', array('id'=>$v['id']));?>" class="btn_edit fancybox fancybox.iframe"><i class="fa fa-edit"></i><?php echo $lang['wechat_editor']; ?></a>
            	              		<a href="javascript:if(confirm('<?php echo $lang['confirm_delete']; ?>')){window.location.href='<?php echo url('menu_del', array('id'=>$v['id']));?>'};" class="btn_trash"><i class="fa fa-trash-o"></i><?php echo $lang['drop']; ?></a>
            	                </div>
            	              </td>
            	            </tr>
            	            <?php $n++;}unset($n); ?>
            	            <?php $n++;}unset($n); ?>
            				<tr>
            					<td colspan="5">
            					 <div class="info_btn text-center"><a href="<?php echo url('sys_menu');?>" class="button btn-danger bg-red" style="float:none;padding:5px 20px;height:55px;line-height:55px;"><?php echo $lang['menu_create']; ?></a></div>
            					</td>
            				</tr>
            	            </tbody>
            	        </table>
            	    </div>
                </form>
            </div>
		</div>
   </div>
</div>
<script>
	$(document).on("mouseenter",".list-div tbody td",function(){
	    $(this).parents("tr").addClass("tr_bg_blue");
	});

	$(document).on("mouseleave",".list-div tbody td",function(){
		$(this).parents("tr").removeClass("tr_bg_blue");
	});
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