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
  <div class="title">分销订单列表</div>
  <div class="content_tips">
    <div class="tabs_info">
      <ul>
          <li class="<?php if($status =='' && $able == '') { ?>curr<?php } ?>"><a href="<?php echo url('drp_order_list');?>"><?php echo ($lang['sch_stats']['all']); ?></a></li>
          <li class="<?php if($status == '0' && $able == '1') { ?>curr<?php } ?>"><a href="<?php echo url('drp_order_list',array('status'=>0,'able'=>1));?>"><?php echo ($lang['sch_stats']['0']); ?></a></li>
          <li class="<?php if($status == '0' && $able == '2') { ?>curr<?php } ?>"><a href="<?php echo url('drp_order_list',array('status'=>0,'able'=>2));?>">不足<?php echo $able_day; ?>天</a></li>
          <li class="<?php if($status == '1') { ?>curr<?php } ?>"><a href="<?php echo url('drp_order_list',array('status'=>1));?>"><?php echo ($lang['sch_stats']['1']); ?></a></li>
          <li class="<?php if($status == '2') { ?>curr<?php } ?>"><a href="<?php echo url('drp_order_list',array('status'=>2));?>"><?php echo ($lang['sch_stats']['2']); ?></a></li>
      </ul>
    </div>
    <div class="explanation" id="explanation">
        <div class="ex_tit"><i class="sc_icon"></i><h4>操作提示</h4><span id="explanationZoom" title="收起提示"></span></div>
        <ul>
            <li>分销订单可以根据等待处理，不足7天，已分成，取消分成状态查询分销订单。</li>
            <li>分销订单点击分成会根据会员不同级别计算所获得的佣金。</li>
            <li>分销订单点击撤销分成把会员所获得佣金收回。</li>
            <li>点击下方批量分成可以对选中多个订单进行分成。</li>
        </ul>
    </div>
    <div class="flexilist">
        <div class="common-head">
            <form action="<?php echo url('drporderlist');?>" method="post">
              <div class="search">
                <div class="input">
                    <input type="text" name="order_sn" class="text nofocus" placeholder="<?php echo ($lang['sch_order']); ?>" autocomplete="off"><input type="submit" value="" class="btn" name="export">
                </div>
              </div>
            </form>
        </div>
        <div class="common-content">
          <div class="list-div"  id="listDiv">
             <table cellspacing="0" cellpadding="0" border="0">
                <tr class="active">
                  <th></th>
                  <th><div class="tDiv"><?php echo ($lang['order_sn']); ?></div></th>
                  <th><div class="tDiv"><?php echo ($lang['order_stats']['name']); ?></div></th>
                  <th><div class="tDiv"><?php echo ($lang['sch_stats']['name']); ?></div></th>
                  <th><div class="tDiv"><?php echo ($lang['drp_info']); ?></div></th>
                  <th><div class="tDiv"><?php echo ($lang['drp_ru_name']); ?></div></th>
                  <th><div class="tDiv"><?php echo ($lang['drp_action']); ?></div></th>
                </tr>
                <?php if($list) { ?>
                <?php $n=1;if(is_array($list)) foreach($list as $list) { ?>
                <tr>
                    <td>
                        <div class="tDiv">
                          <div class="checkbox">
                              <label>
                                  <input type="checkbox"  value="<?php echo ($list['order_id']); ?>" <?php if($list['drp_is_separate'] == 0 && $list['separate_able'] == 1 && $on == 1) { ?>name="checkboxes[]"<?php } else { ?>disabled="disabled"<?php } ?>>
                              </label>
                          </div>
                        </div>
                    </td>
                  <td><div class="tDiv"><?php echo ($list['order_sn']); ?></div></td>
                  <td><div class="tDiv"><?php echo ($lang['order_stats'][$list['order_status']]); ?></div></td>
                  <td><div class="tDiv"><?php echo ($lang['sch_stats'][$list['drp_is_separate']]); ?></div></td>
                  <?php if($list['info']) { ?>
                  <td><div class="tDiv"><?php echo ($list['info']); ?></div></td>
                  <?php } else { ?>
                  <td><div class="tDiv">暂无操作，等待订单处理</div></td>
                  <?php } ?>
                  <td><div class="tDiv"><?php echo ($list['shop_name']); ?></div></td>
                  <td><div class="tDiv">
                      <?php if($list['drp_is_separate'] == 0 && $list['separate_able'] == 1 && $on == 1) { ?>
                      <a href="<?php echo url('separatedrporder',array('oid'=>$list['order_id']));?>"><?php echo ($lang['drp_affiliate_separate']); ?></a>&nbsp;|
                      <a href="<?php echo url('deldrporder',array('oid'=>$list['order_id']));?>">&nbsp;<?php echo ($lang['drp_affiliate_cancel']); ?></a>
                      <?php } elseif ($list['drp_is_separate'] == 1) { ?>
                      <?php echo ($lang['sch_stats']['1']); ?>&nbsp;|<a href="<?php echo url('rollbackdrporder',array('log_id'=>$list['log_id']));?>">&nbsp;<?php echo ($lang['drp_affiliate_rollback']); ?></a>
                      <?php } else { ?>
                      <?php if($list['drp_is_separate'] == 0) { ?>
                      不足<?php echo $able_day; ?>天
                      <?php } else { ?>
                      -
                      <?php } ?>
                      <?php } ?>
                      </div>
                  </td>
                </tr>
                <?php $n++;}unset($n); ?>
                <?php } else { ?>
                <tbody>
                     <tr><td class="no-records" colspan="7">没有找到任何记录</td></tr>
                </tbody>
                <?php } ?>
                <tfoot>
                    <tr>
                        <td colspan="3">
                            <div class="tDiv of">
                              <div class="tfoot_btninfo">
                                   <input type="submit" onclick="confirm_bath()"  id="btnSubmit" value="<?php echo ($lang['drp_affiliate_batch']); ?>" class="button bg-green">
                                </div>
                            </div>
                        </td>
                        <td colspan="7">
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

<script>
    function confirm_bath()
    {
        Items = document.getElementsByName('checkboxes[]');
        var arr = new Array();
        for (i=0; Items[i]; i++){
            if (Items[i].checked){
                var selected = 1;
                  arr.push(Items[i].value);
            }
        }
        if(selected != 1){
            return false;
        }else{
            $.post("<?php echo url('separatedrporder');?>", {oid:arr}, function(data){
                    if(data.url){
                        window.location.href = data.url;
                    }
            }, 'json');
        }

    }
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
</script>
</body>
</html>