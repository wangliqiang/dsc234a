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
    <div class="title">分销设置</div>
    <div class="content_tips">
        <div class="explanation" id="explanation">
            <div class="ex_tit"><i class="sc_icon"></i><h4>操作提示</h4><span id="explanationZoom" title="收起提示"></span></div>
            <ul>
                <li>微分销设置开店流程中的模板提示语，温馨提示，新手必读，提现提示。 </li>
                <li>微分销佣金提现金额必须大于等于10元才可以进行佣金提现，具体可操作的时间可在下方修改。</li>
                <li>微分销配置根据需求操作消息推送，购买成为分销商，购买金额，商品分销模式，分销商审核配置信息。</li>
                <li>微分销自定义整站“分销商”替换设定的分销商名称，自定义“分销”名称替换设定的分销名称。</li>
            </ul>
        </div>
        <div class="flexilist">
            <div class="main-info">
            <form method="post" action="<?php echo url('config');?>" class="form-horizontal" role="form">
            <div class="switch_info">
                    <?php $n=1;if(is_array($list)) foreach($list as $config) { ?>
                    <?php if($config['code'] != 'drp_affiliate') { ?>
                    <div class="item">
                        <div class="label-t"><?php echo ($config['name']); ?></div>
                        <div class="label_value">
                            <?php if($config['type'] == 'text') { ?>
                            <input type="text" name="data[<?php echo ($config['code']); ?>]" class="text" value="<?php echo ($config['value']); ?>">
                            <?php } elseif ($config['type'] == 'textarea') { ?>
                            <textarea name="data[<?php echo ($config['code']); ?>]" class="textarea" rows="5"><?php echo ($config['value']); ?></textarea>
                            <?php } elseif ($config['type'] == 'radio') { ?>
                            <div class="type-file-box">
                                <div class="checkbox_items">
                                    <div class="checkbox_item">
                                        <input type="radio" name="data[<?php echo ($config['code']); ?>]" value="1" <?php if($config['value'] == 1) { ?>checked<?php } ?>>
                                        <label  class=" <?php if($config['value'] == 1) { ?>active<?php } ?>">启用</label>
                                    </div>
                                    <div class="checkbox_item">
                                        <input type="radio" name="data[<?php echo ($config['code']); ?>]" value="0" <?php if($config['value'] == 0) { ?>checked<?php } ?>>
                                        <label class=" <?php if($config['value'] == 0) { ?>active<?php } ?>">禁用</label>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>

                            <p class="notic"><?php echo ($config['warning']); ?></p>
                        </div>
                    </div>
                    <?php } ?>
                    <?php $n++;}unset($n); ?>
                <div class="item">
                    <div class="label-t">&nbsp;</div>
                    <div class="lable_value info_btn">
                        <input type="submit" name="submit" value="确定" class="button btn-danger bg-red" style="margin:0 auto;" /></div>
                </div>
            </div>
            </div>
            </form>
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