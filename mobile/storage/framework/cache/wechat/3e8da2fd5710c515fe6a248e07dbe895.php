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
.article{border:1px solid #ddd;padding:5px 5px 0 5px;overflow: hidden;}
.cover{height:160px; position:relative;margin-bottom:5px;overflow:hidden;}
.article .cover img{width:100%; height:auto;}
.article h4{overflow:hidden;}
.article span{height:40px; line-height:40px; display:block; z-index:5; position:absolute;width:100%;bottom:0px; color:#FFF; padding:0 10px; background-color:rgba(0,0,0,0.6)}
.article_list{padding:5px;border:1px solid #ddd;border-top:0;overflow:hidden;}
#footer {position: static;bottom:0px;}
</style>
<div class="wrapper">
    <div class="title"><?php echo $lang['wechat_menu']; ?> - 素材管理</div>
    <div class="content_tips">
            <div class="tabs_info">
            	<ul>
                    <li role="presentation" class="curr"><a href="<?php echo url('article');?>">图文素材</a></li>
                    <li role="presentation"><a href="<?php echo url('picture');?>">图片</a></li>
                    <li role="presentation"><a href="<?php echo url('voice');?>">语音</a></li>
                    <li role="presentation"><a href="<?php echo url('video');?>">视频</a></li>
                </ul>
            </div>
            <div class="explanation" id="explanation">
                <div class="ex_tit"><i class="sc_icon"></i><h4>操作提示</h4><span id="explanationZoom" title="收起提示"></span></div>
                <ul>
                    <li>图文素材：分为单图文、多图文素材。支持图片，语音，视频素材。</li>
                    <li>单图文素材添加好之后，即可将多条单图文素材组合成为一条多图文素材。</li>
                    <li>★ 注意事项：单图文素材如果经过修改，则多图文素材需要重新组合。</li>
                </ul>
            </div>
            <div class="flexilist of">
                <!-- 单图文添加 -->
            	<div class="common-head">
                    <div class="fl">
                        <a href="<?php echo url('article_edit');?>"><div class="fbutton"><div class="add" title="图文添加"><span><i class="fa fa-plus"></i>图文添加</span></div></div></a>
                    </div>
                </div>
	            <div class="common-content" style="border-bottom: 1px solid #62b3ff">
                    <!-- 单图文列表 -->
                    <div class="row">
	                    <?php $n=1;if(is_array($list)) foreach($list as $key=>$val) { ?>
                        <?php if(empty($val['article_id'])) { ?>
	                    <div class="col-sm-6 col-md-4 col-lg-2 ectouch-mb">
	                        <div class="article">
	                            <h4><?php echo $val['title']; ?></h4>
	                            <p><?php echo date('Y年m月d日', $val['add_time']);?></p>
	                            <div class="cover"><img src="<?php echo $val['file']; ?>" /></div>
	                            <p><?php echo $val['content']; ?></p>

	                        </div>
	                        <div class="bg-info">
                                <ul class="nav nav-pills nav-justified" role="tablist">
                                <li role="presentation"><a href="<?php echo url('article_edit', array('id'=>$val['id']));?>" title="编辑" class="ectouch-fs18"><span class="glyphicon glyphicon-pencil"></span></a></li>
                                <li role="presentation">
                                <?php if($val['is_prize'] == 1) { ?>
                                <a href="javascript:;" title="禁止删除" class="ectouch-fs18">
                                <?php } else { ?>
                                <a href="javascript:if(confirm('<?php echo $lang['confirm_delete']; ?>')){window.location.href='<?php echo url('article_del', array('id'=>$val['id']));?>'};" title="删除" class="ectouch-fs18">
                                <?php } ?>
                                <span class="glyphicon glyphicon-trash"></span></a></li>
                                </ul>
	                        </div>
	                    </div>
                        <?php } ?>
	                    <?php if(($key+1) % 6 == 0) { ?>
	                </div>
	                <div class="row">
	                    <?php } ?>
	                <?php $n++;}unset($n); ?>
	                </div>
                </div>

                <!-- 多图文添加 -->
                <div class="common-head" style="padding-top:10px;">
                    <div class="fl">
                        <a href="<?php echo url('article_edit_news');?>"><div class="fbutton"><div class="add" title="多图文添加"><span><i class="fa fa-plus"></i>多图文添加</span></div></div></a>
                    </div>
                </div>
                <div class="common-content">
                    <!-- 多图文列表 -->
                    <div class="row">
                        <?php $n=1;if(is_array($list)) foreach($list as $key=>$val) { ?>
                        <?php if($val['article_id']) { ?>
                        <div class="col-sm-6 col-md-4 col-lg-2 ectouch-mb">
                            <?php $n=1;if(is_array($val['articles'])) foreach($val['articles'] as $k=>$v) { ?>
                            <?php if($k == 0) { ?>
                            <div class="article">
                                <p><?php echo date('Y年m月d日', $v['add_time']);?></p>
                                <div class="cover"><img src="<?php echo $v['file']; ?>" /><span><?php echo $v['title']; ?></span></div>
                            </div>
                            <?php } else { ?>
                            <div class="article_list">
                                <span><?php echo $v['title']; ?></span>
                                <img src="<?php echo $v['file']; ?>" width="78" height="78" class="pull-right" />
                            </div>
                            <?php } ?>
                            <?php $n++;}unset($n); ?>
                            <div class="bg-info">
                                <ul class="nav nav-pills nav-justified" role="tablist">
                                <li role="presentation"><a href="<?php echo url('article_edit_news', array('id'=>$val['id']));?>" title="编辑" class="ectouch-fs18"><span class="glyphicon glyphicon-pencil"></span></a></li>
                                <li role="presentation"><a href="javascript:if(confirm('<?php echo $lang['confirm_delete']; ?>')){window.location.href='<?php echo url('article_del', array('id'=>$val['id']));?>'};" title="删除" class="ectouch-fs18"><span class="glyphicon glyphicon-trash"></span></a></li>
                                </ul>
                            </div>
                        </div>
                        <?php } ?>
                        <?php if(($key+1) % 6 == 0) { ?>
                    </div>
                    <div class="row">
                        <?php } ?>
                        <?php $n++;}unset($n); ?>
                    </div>
	            </div>
            </div>
	        <div class="list-div of">
	        	<table cellspacing="0" cellpadding="0" border="0">
			        <tfoot>
			        	<tr>
			                <td colspan="7">
			                	
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