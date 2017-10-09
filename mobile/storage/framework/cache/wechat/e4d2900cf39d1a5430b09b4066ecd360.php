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
	<div class="title"><?php echo $lang['wechat_menu']; ?> - <?php echo $lang['sub_title']; ?></div>
    <div class="content_tips">
        <div class="tabs_info">
            <ul>
                <li role="presentation" class="curr"><a href="<?php echo url('subscribe_list');?>">已关注</a></li>
            </ul>
        </div>
        <div class="explanation" id="explanation">
            <div class="ex_tit"><i class="sc_icon"></i><h4>操作提示</h4><span id="explanationZoom" title="收起提示"></span></div>
            <ul>
                <li>粉丝管理：显示已经关注微信公众号的用户信息。</li>
                <li>在对用户进行发送消息操作之前，请及时点击更新按钮，以便同步微信公众号平台的用户分组（标签）与数量。</li>
                <li>发送客服消息，可以单独发送微信消息给微信用户（只有48小时内和公众号有过互动的粉丝才能接收到信息，否则会发送失败）</li>
            </ul>
        </div>
		<div class="flexilist">
			<div class="common-head">
                <div class="fl">
                    <a href="<?php echo url('sys_tags');?>"><div class="fbutton"><div class="csv" title="更新"><span><i class="fa fa-refresh"></i><?php echo $lang['group_update']; ?></span></div></div></a>
                    <!-- <a href="<?php echo url('groups_edit');?>"><div class="fbutton"><div class="add" title="添加"><span><i class="icon icon-plus"></i><?php echo $lang['add']; ?></span></div></div></a> -->
                </div>

                <form action="<?php echo url('subscribe_search');?>" name="searchForm" method="post" role="search">
                    <div class="search">
                        <div class="input">
                            <input type="text" name="keywords" class="text nofocus" placeholder="<?php echo $lang['sub_search']; ?>" autocomplete="off">
                            <input type="hidden" value="<?php echo $group_id; ?>" name="group_id">
                            <input type="submit" value="" class="btn search_button">
                        </div>
                    </div>
                </form>
            </div>
			<div class="common-content">
	    		<form action="<?php echo url('batch_tagging');?>" method="post" class="form-inline" role="form">
	    			<div class="list-div">
		    			<table cellspacing="0" cellpadding="0" border="0"  class="sub-list">
		    				<thead>
			    				<tr>
			    					<th width="5%" class="sign"><div class="tDiv"><input type="checkbox" id="check_box" /></div></th>
			    					<th width="10%"><div class="tDiv"><?php echo $lang['sub_headimg']; ?></div></th>
			    					<th width="20%"><div class="tDiv"><?php echo $lang['sub_nickname']; ?>/地区</div></th>
			    					<th width="15%"><div class="tDiv"><?php echo $lang['sub_time']; ?></div></th>
									<!-- <th width="10%"><div class="tDiv"><?php echo $lang['sub_binduser']; ?></div></th> -->
			    					<th width="30%" class="handle text-center" ><?php echo $lang['handler']; ?></th>
			    				</tr>
		    				</thead>
                            <?php if($list) { ?>
		    				<?php $n=1;if(is_array($list)) foreach($list as $key=>$val) { ?>
		    				<tr>
		    					<td class="sign"><div class="tDiv"><input type="checkbox" name="id[]" value="<?php echo $val['openid']; ?>" class="checks"></div></td>
		    					<td><div class="user_img_box"><?php if($val['headimgurl']) { ?><img src="<?php echo $val['headimgurl']; ?>" width="70" alt="<?php echo $val['nickname']; ?>" /><?php } ?></div></td>
		    					<td>
                                    <div class="tDiv">
                                        <span class="wei-nickname"><?php echo $val['nickname']; ?></span><br>
                                        <span class="wei-area" >
                                        <?php $n=1;if(is_array($val['taglist'])) foreach($val['taglist'] as $k=>$v) { ?>
                                        <a href="javascript:;" class="user_tag" tagAttr="<?php echo $v['tag_id']; ?>" openidAttr="<?php echo $val['openid']; ?>" title="点击取消标签" ><?php echo $v['name']; ?></a>
                                        <?php $n++;}unset($n); ?>
                                        </span>
                                        <br><span class="wei-area"><?php echo $val['province']; ?> - <?php echo $val['city']; ?></span>
                                    </div>
                                </td>
		    					<td><div class="tDiv"><?php echo date('Y-m-d H:i:s', $val['subscribe_time']);?></div></td>
								<!-- <td><div class="tDiv"><?php if($val['user_name']) { echo $val['user_name']; } else { ?>暂未绑定<?php } ?></div></td> -->
		    					<td class="handle text-center">
		    						<div class="tDiv a2">
                                        <?php if($val['ect_uid']) { ?>
                                        <a href="../admin/users.php?act=edit&id=<?php echo $val['ect_uid']; ?>" class="btn_see" title=""><i class="sc_icon sc_icon_see"></i>查看会员</a>
                                        <?php } ?>
                                        <!-- <a href="<?php echo url('custom_message_list', array('uid'=>$val['uid']));?>" class="btn_see" title="<?php echo $lang['custom_message_list']; ?>"><i class="sc_icon sc_icon_see"></i>查看消息</a> -->
                                        <a href="<?php echo url('send_custom_message', array('uid'=>$val['uid']));?>" class="btn_region fancybox fancybox.iframe" title="<?php echo $lang['send_custom_message']; ?>"><i class="fa fa-weixin" ></i>发送消息</a>
		    					    </div>
		    					</td>
		    				</tr>
		    				<?php $n++;}unset($n); ?>
                          <?php } else { ?>
                          <tbody>
                                 <tr><td class="no-records" colspan="6">没有找到任何记录</td></tr>
                          </tbody>
                          <?php } ?>
		    				<tfoot>
                        	<tr>
                                <td colspan="3">
                                    <div class="tDiv of">
                                    	<div class="tfoot_btninfo">
	                                    	<span class="fl" style="line-height:30px;margin-right:20px;"><?php echo $lang['tag_move']; ?></span>
	                                    	<select name="tag_id" style="padding:5px;height:30px;" class="imitate_select select_w120 fl">
							    		  		<?php $n=1;if(is_array($tag_list)) foreach($tag_list as $k=>$v) { ?>
							    		  		<option value="<?php echo $v['tag_id']; ?>"><?php echo $v['name']; ?></option>
							    		  		<?php $n++;}unset($n); ?>
							    		  	</select>
							    		  	<input type="submit" class="btn button btn_disabled" value="<?php echo $lang['tag_join']; ?>" disabled="disabled" ectype='btnSubmit' >
                                        </div>
                                    </div>

                                </td>
                                <td colspan="3">
                            	
<div class="list-page">
	<div id="turn-page">
	    <span class="page page_1">总计 <em id="totalRecords"><?php if($page['count']) { echo $page['count']; } else { ?>0<?php } ?></em>个记录</span>
	    <span class="page page_2">共<em id="totalPages"><?php if($page['page_count']) { echo $page['page_count']; } else { ?>1<?php } ?></em>页</span>
	    <!--<span>页当前第<em id="pageCurrent">1</em></span>-->
	    <span class="page page_3"><i>每页</i><input type="text" size="3" id="pageSize" value="<?php echo $page_num; ?>" onkeypress="return changePageSize(event);" ></span>
	    <span id="page-link">
	        <a href="<?php if($page['page_first']) { echo $page['page_first']; } else { ?>javascript:;<?php } ?>" class="first" title="第一页"></a>
	        <a href="<?php if($page['page_prev']) { echo $page['page_prev']; } else { ?>javascript:;<?php } ?>" class="prev" title="上一页"></a>
	        <select id="gotoPage" onchange="location.href=this.value">
	            <?php if($page['page_number']) { ?>
	            <?php $n=1;if(is_array($page['page_number'])) foreach($page['page_number'] as $key=>$vo) { ?>
                <option <?php if($page['page'] == $key) { ?> selected<?php } ?> value="<?php echo $vo; ?>"><?php echo $key; ?></option>
                <?php $n++;}unset($n); ?>
                <?php } else { ?>
                <option selected value="1">1</option>
                <?php } ?>
            </select>
	        <a href="<?php if($page['page_next']) { echo $page['page_next']; } else { ?>javascript:;<?php } ?>" class="next" title="下一页"></a>
	        <a href="<?php if($page['page_last']) { echo $page['page_last']; } else { ?>javascript:;<?php } ?>" class="last" title="最末页"></a>
	    </span>
	</div>
</div>

                                </td>
                            </tr>
                            </tfoot>
		    			</table>

                        <table cellspacing="0" cellpadding="0" border="0"  class="group-list">
                            <thead>
                                <tr>
                                    <th><div class="tDiv"><?php echo $lang['tag_title']; ?></div></th>
                                    <th><div class="tDiv"><a href="<?php echo url('tags_edit', array('id'=>$val['id']));?>" class="btn_edit fancybox fancybox.iframe" ><?php echo $lang['tag_add']; ?></a></div></th>
                                </tr>
                            </thead>
                            <?php $n=1;if(is_array($tag_list)) foreach($tag_list as $key=>$val) { ?>
                            <tr>
                                <td>
                                    <div class="handle">
                                        <div class="tDiv"><a class="btn_see" href="<?php echo url('subscribe_search', array('tag_id'=>$val['tag_id']));?>"><?php echo $val['name']; ?> </a><span class="badge"><?php echo $val['count']; ?></span></div>
                                    </div>
                                </td>
                                <td>
                                    <div class="handle">
                                        <?php if($val['tag_id'] != 0 && $val['tag_id'] != 1 && $val['tag_id'] != 2) { ?>
                                        <div class="tDiv"><a href="<?php echo url('tags_edit', array('id'=>$val['id']));?>" class="btn_edit fancybox fancybox.iframe" ><i class="icon icon-edit"></i><?php echo $lang['tag_edit']; ?></a></div>
                                        <?php } ?>
                                    </div>
                                </td>
                            </tr>
                            <?php $n++;}unset($n); ?>
                        </table>

					</div>
	    		</form>
		    </div>

		</div>
		<script type="text/javascript">
		$(function(){
            // 选择全中复选框
			$('#check_box').bind('click', function(){
				$('.checks').prop("checked", $(this).prop("checked"));
			});

            // 选择单个复选框
            $("input[type='checkbox']").bind("click",function(){
                var length = $("input[type='checkbox']:checked").length;
                if(length > 0){
                    if($("*[ectype='btnSubmit']").length > 0){
                        $("*[ectype='btnSubmit']").removeClass("btn_disabled");
                        $("*[ectype='btnSubmit']").attr("disabled",false);
                    }
                }else{
                    if($("*[ectype='btnSubmit']").length > 0){
                        $("*[ectype='btnSubmit']").addClass("btn_disabled");
                        $("*[ectype='btnSubmit']").attr("disabled",true);
                    }
                }
            });

            // 批量加入标签验证
            $("input[ectype='btnSubmit']").bind("click",function(){
                var item = $("select[name=tag_id]").val();
                if(!item){
                    layer.msg('请选择标签');
                    return false;
                };
            });

            // 移除标签
            $('.user_tag').click(function(){
                var tag_id = $(this).attr("tagAttr");
                var open_id = $(this).attr("openidAttr");
                $.post("<?php echo url('batch_un_tagging');?>", {tagid: tag_id, openid: open_id}, function(data){
                    if(data.status > 0){
                        window.location.reload();
                    }else{
                        layer.msg(data.msg);
                        return false;
                    }
                }, 'json');
            });

            // 搜索验证
            $('.search_button').click(function(){
                var search_keywords = $("input[name=keywords]").val();
                if(!search_keywords){
                    layer.msg('搜索关键字不能为空');
                    return false;
                }
            });

		})
		</script>

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