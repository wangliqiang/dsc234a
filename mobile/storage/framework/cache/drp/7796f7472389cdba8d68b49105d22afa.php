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

<!--同步pc时间插件修改-->
<link href="../js/calendar/calendar.min.css" rel="stylesheet" type="text/css" />
<script src="../js/calendar/calendar.min.js"></script><!--时间插件js-->
<style>
ul, li {overflow: hidden;}
.dates_box_top {height: 32px;}
.dates_bottom {height: auto;}
.dates_hms {width: auto;}
.dates_btn {width: auto;}
.dates_mm_list span {width: auto;}

</style>

<div class="wrapper">
    <div class="title">分销商管理</div>
        <div class="content_tips">
            <div class="explanation" id="explanation">
                <div class="ex_tit"><i class="sc_icon"></i><h4>操作提示</h4><span id="explanationZoom" title="收起提示"></span></div>
                <ul>
                    <li>微分销店铺开启审核，如需开启，关闭，审核请点击开启，关闭，审核按钮操作即可。 </li>
                    <li>微分销店铺列表导出可以根据条件进行导出。</li>
                    <li>微分销店铺列表可以根据店铺名/姓名/手机号进行查询。</li>
                </ul>
            </div>
            <div class="flexilist">
                <div class="common-head">
                    <div class="fl">
                        <form action="<?php echo url('export_shop');?>" method="post">
                        <div class="label_value">
                            <div class="text_time" id="text_time1" style="float:left;">
                                <input type="text" name="starttime"  class="text" value="<?php echo date('Y-m-d H:i', mktime(0,0,0,date('m'), date('d')-7, date('Y')));?>" id="promote_start_date" class="text mr0" readonly>
                            </div>

                            <div class="text_time" id="text_time2"  style="float:left;">
                                <input type="text" name="endtime"  class="text" value="<?php echo date('Y-m-d H:i');?>" id="promote_end_date" class="text" readonly >
                            </div>
                                <input type="submit" name="export" value="导出" class="button bg-green" />
                        </div>
                        </form>
                    </div>
                    <div class="search">
                        <form action="<?php echo url('shop');?>" method="post">
                             <div class="input">
                                 <input type="text" placeholder="店铺名/姓名/手机号" name="shop_name"  class="text nofocus" autocomplete="off">
                                <!--  <input type="text" placeholder="" name="real_name" class="form-control" >
                                 <input type="text" placeholder="" name="mobile" class="form-control" >
                                 <input type="text" placeholder="" name="user_name" class="form-control" > -->
                                 <input type="submit" name="export" value="" class="btn"  style="font-style:normal">
                             </div>
                        </form>
                    </div>
                </div>
                <div class="common-content">
                    <div class="list-div" id="listDiv">
                        <table cellpadding="0" cellspacing="0" border="0">
                            <thead>
                                <tr>
                                  <th><div class="tDiv">编号</div></th>
                                  <th><div class="tDiv">店铺名</div></th>
                                  <th><div class="tDiv">用户名</div></th>
                                  <th><div class="tDiv">推荐人</div></th>
                                  <th><div class="tDiv">真实姓名</div></th>
                                  <th><div class="tDiv">手机号</div></th>
                                  <th><div class="tDiv">开店时间</div></th>
                                  <th><div class="tDiv">审核状态</div></th>
                                  <th><div class="tDiv">店铺状态</div></th>
                                  <th><div class="tDiv">操作</div></th>
                                </tr>
                            </thead>
                            <?php if($list) { ?>
                            <?php $n=1;if(is_array($list)) foreach($list as $key=>$val) { ?>
                            <tr>
                                <td><div class="tDiv"><?php echo ($val['id']); ?></div></td>
                                <td><div class="tDiv"><?php echo ($val['shop_name']); ?></div></td>
                                <td><div class="tDiv"><?php echo ($val['user_name']); ?></div></td>
                                <td><div class="tDiv"><?php echo ($val['parent_name']); ?></div></td>
                                <td><div class="tDiv"><?php echo ($val['real_name']); ?></div></td>
                                <td><div class="tDiv"><?php echo ($val['mobile']); ?></div></td>
                                <td><div class="tDiv"><?php echo ($val['create_time']); ?></div></td>
                                <td><div class="tDiv"><?php if($val['audit'] == 1) { ?>已审核<?php } else { ?>未审核<?php } ?></div></td>
                                <td><div class="tDiv"><?php if($val['status'] == 1) { ?>已开启<?php } else { ?>已关闭<?php } ?></div></td>
                                <td><div class="tDiv btn-group">
                                    <a href="<?php echo url('afflist', array('user_id'=>$val['user_id']));?>" class="btn btn-primary borderno">下线会员</a>
                                    <?php if(empty($val['audit'])) { ?>
                                    <a href="<?php echo url('set_shop', array('id'=>$val['id'], 'audit'=>1));?>" class="btn btn-primary borderno">审核</a>
                                    <?php } ?>
                                    <?php if($val['status']) { ?>
                                    <a href="<?php echo url('set_shop', array('id'=>$val['id'],'status'=>0));?>" class="btn btn-primary borderno">关闭</a>
                                    <?php } else { ?>
                                    <a href="<?php echo url('set_shop', array('id'=>$val['id'],'status'=>1));?>" class="btn btn-primary borderno  active">开启</a>
                                    <?php } ?></div>
                                </td>
                            </tr>
                            <?php $n++;}unset($n); ?>
                            <?php } else { ?>
                            <tbody>
                            <tr><td class="no-records" colspan="10">没有找到任何记录</td></tr>
                            </tbody>
                            <?php } ?>
                             <tfoot>
                                <tr>
                                    <td colspan="10">
                                        <div class="list-page">
                                            
<div class="list-page">
	<div id="turn-page">
	    <span class="page page_1">总计 <em id="totalRecords"><?php if($page['count']) { echo $page['count']; } else { ?>0<?php } ?></em>个记录</span>
	    <span class="page page_2">共<em id="totalPages"><?php if($page['page_count']) { echo $page['page_count']; } else { ?>1<?php } ?></em>页</span>
	    <!--<span>页当前第<em id="pageCurrent">1</em></span>-->
	    <span class="page page_3"><i>每页</i><input type="text" size="3" id="pageSize" value="<?php echo $page_num; ?>" onkeypress="return changePageSize(event);"></span>
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

<script type="text/javascript">
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
                                        </div>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
//日历显示
/*$("#starttime, #endtime").datetimepicker({
    lang:'ch',
    format:'Y-m-d H:i',
    timepicker:false
});*/
</script>
<script>
    $("#explanationZoom").on("click",function(){
        var explanation = $(this).parents(".explanation");
        var width = $(".content_tips").width();
        if($(this).hasClass("shopUp")){
            $(this).removeClass("shopUp");
            $(this).attr("title","收起提示");
            explanation.find(".ex_tit").css("margin-bottom",10);
            explanation.animate({
                width:width
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

    var opts1 = {
            'targetId':'promote_start_date',
            'triggerId':['promote_start_date'],
            'alignId':'text_time1',
            'format':'-',
            'hms':'off'
        },opts2 = {
            'targetId':'promote_end_date',
            'triggerId':['promote_end_date'],
            'alignId':'text_time2',
            'format':'-',
            'hms':'off'
        }

        xvDate(opts1);
        xvDate(opts2);
</script>
</body>
</html>