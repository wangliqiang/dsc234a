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
  <div class="title">分销排行</div>
  <div class="content_tips">
    <div class="tabs_info">
      <ul>
          <li class="<?php if($act =='') { ?>curr<?php } ?>"><a href="<?php echo url('drp_list',array('where'=>''));?>">全部</a></li>
          <li class="<?php if($act =='1') { ?>curr<?php } ?>"><a href="<?php echo url('drp_list',array('where'=>1));?>">一年</a></li>
          <li class="<?php if($act =='2') { ?>curr<?php } ?>"><a href="<?php echo url('drp_list',array('where'=>2));?>">半年</a></li>
          <li class="<?php if($act =='3') { ?>curr<?php } ?>"><a href="<?php echo url('drp_list',array('where'=>3));?>">一个月</a></li>
      </ul>
    </div>
    <div class="explanation" id="explanation">
        <div class="ex_tit"><i class="sc_icon"></i><h4>操作提示</h4><span id="explanationZoom" title="收起提示"></span></div>
        <ul>
            <li>分销排行可以按照满一年，半年，一个月进行排行查询。</li>
            <li>分销排行按照销售佣金进行排序。</li>
        </ul>
    </div>
    <div class="flexilist">
      <div class="common-content">
        <div class="list-div">
          <form action="<?php echo url('shop');?>" method="post" class="form-horizontal" role="form">
          <table cellspacing="0" cellpadding="0" border="0">
              <tr class="active">
                <th><div class="tDiv">编号</div></th>
                <th><div class="tDiv">用户名</div></th>
                <th><div class="tDiv">销售佣金</div></th>
                <th><div class="tDiv">店铺名</div></th>
                <th><div class="tDiv">手机号</div></th>
                <th><div class="tDiv">开店时间</div></th>
              </tr>
              <?php if($list) { ?>
              <?php $n=1;if(is_array($list)) foreach($list as $val) { ?>
              <tr>
                <td><div class="tDiv"><?php echo $val['id']; ?></div></td>
                <td><div class="tDiv"><?php echo $val['name']; ?></div></td>
                <td><div class="tDiv"><?php echo $val['money']; ?></div></td>
                <td><div class="tDiv"><?php echo $val['shop_name']; ?></div></td>
                <td><div class="tDiv"><?php echo $val['mobile']; ?></div></td>
                <td><div class="tDiv"><?php echo $val['time']; ?></div></td>
              </tr>
              <?php $n++;}unset($n); ?>
              <?php } else { ?>
              <tbody>
                     <tr><td class="no-records" colspan="6">没有找到任何记录</td></tr>
              </tbody>
              <?php } ?>
              <tfoot>
                  <tr>
                      <td colspan="6">
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
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
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