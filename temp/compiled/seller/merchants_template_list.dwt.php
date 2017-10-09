<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><?php echo $this->fetch('library/seller_html_head.lbi'); ?></head>
<body>
<?php echo $this->fetch('library/seller_header.lbi'); ?>
<div class="ecsc-layout">
    <div class="site wrapper">
    	<?php echo $this->fetch('library/seller_menu_left.lbi'); ?>
		<div class="ecsc-layout-right">
            <div class="main-content" id="mainContent">
                <?php echo $this->fetch('library/url_here.lbi'); ?>
				<?php echo $this->fetch('library/seller_menu_tab.lbi'); ?>
                <div class="items-info">
                	<div class="ecsc-store-templet">
                        <div class="templet-thumb">
                            <img id="screenshot" src="<?php echo $this->_var['curr_template']['screenshot']; ?>"/>
                        </div>
                        <div class="templet-info">
                            <p>店铺模版名称：<strong><span id="templateName"><?php echo $this->_var['curr_template']['name']; ?></span>&nbsp;<span id="templateVersion"><?php echo $this->_var['curr_template']['version']; ?></strong></p>
                            <p>店铺描述：<strong><span id="templateDesc"><?php echo $this->_var['curr_template']['desc']; ?></span></strong></p>
                            <p>开发人员：<strong><a href="<?php echo $this->_var['curr_template']['uri']; ?>" class="nyroModalWzs"><?php echo $this->_var['curr_template']['author']; ?></a></span></strong></p>
                            <p><input class="sc-btn sc-blueBg-btn btn35" onclick="defaultTemplate()" value="<?php echo $this->_var['lang']['default_templates']; ?>" type="button" id="default" /></p>
                        	<div id="CurrTplStyleList">
                                <?php $_from = $this->_var['template_style'][$this->_var['curr_template']['code']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'curr_style');$this->_foreach['foo'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['foo']['total'] > 0):
    foreach ($_from AS $this->_var['curr_style']):
        $this->_foreach['foo']['iteration']++;
?>
                                    <?php if ($this->_foreach['foo']['total'] > 1): ?>
                                      <span style="cursor:pointer;" onMouseOver="javascript:onSOver('screenshot', '<?php echo $this->_var['curr_style']; ?>', this);" onMouseOut="onSOut('screenshot', this, '<?php echo $this->_var['curr_template']['screenshot']; ?>');" onclick="javascript:setupTemplateFG('<?php echo $this->_var['curr_template']['code']; ?>', '<?php echo $this->_var['curr_style']; ?>', '');" id="templateType_<?php echo $this->_var['curr_style']; ?>"><img src="../themes/<?php echo $this->_var['curr_template']['code']; ?>/images/type<?php echo $this->_var['curr_style']; ?>_<?php if ($this->_var['curr_style'] == $this->_var['curr_tpl_style']): ?>1<?php else: ?>0<?php endif; ?>.gif" border="0"></span>
                                    <?php endif; ?>
                                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                            </div>
                        </div>        
                    </div>
                    <div class="templet-list">
                        <h3><?php echo $this->_var['lang']['available_templates']; ?></h3>
                        <ul>
                            <!--<?php if ($this->_var['seller_temp'] > 0): ?>-->
                            <?php $_from = $this->_var['available_templates']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'template');$this->_foreach['template'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['template']['total'] > 0):
    foreach ($_from AS $this->_var['template']):
        $this->_foreach['template']['iteration']++;
?>
                            <!--<?php if (($this->_foreach['template']['iteration'] - 1) < $this->_var['seller_temp']): ?>-->
                            <li>
                                <div class="zhanshi">
                                    <div class="temp_img"><?php if ($this->_var['template']['screenshot']): ?><img src="<?php echo $this->_var['template']['screenshot']; ?>" data-src-wide="../seller_themes/<?php echo $this->_var['template']['code']; ?>/template.jpg" border="0" id="<?php echo $this->_var['template']['code']; ?>" onclick="javascript:setupTemplate('<?php echo $this->_var['template']['code']; ?>')" class="pic"/><?php endif; ?></div>
                                    <div class="t_img2">
                                        <?php $_from = $this->_var['template_style'][$this->_var['template']['code']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'style');$this->_foreach['foo1'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['foo1']['total'] > 0):
    foreach ($_from AS $this->_var['style']):
        $this->_foreach['foo1']['iteration']++;
?>
                                            <?php if ($this->_foreach['foo1']['total'] > 1): ?>
                                                <img src="../themes/<?php echo $this->_var['template']['code']; ?>/images/type<?php echo $this->_var['style']; ?>_0.gif" border="0" onMouseOver="javascript:onSOver('<?php echo $this->_var['template']['code']; ?>', '<?php echo $this->_var['style']; ?>', this);" onMouseOut="onSOut('<?php echo $this->_var['template']['code']; ?>', this, '');" onclick="javascript:setupTemplateFG('<?php echo $this->_var['template']['code']; ?>', '<?php echo $this->_var['style']; ?>', this);">
                                            <?php endif; ?>
                                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                    </div>
                                    <p>模版名称：<?php echo $this->_var['template']['name']; ?></p>
                                    <p>店铺描述：<?php echo $this->_var['template']['desc']; ?></p>
                                    <p class="btn">
                                        <a href="#" onclick="javascript:setupTemplate('<?php echo $this->_var['template']['code']; ?>')" class="ecsc-btn"><i class="icon-cogs"></i>使用模板</a>
                                        <a href="javascript:void(0);" class="ecsc-btn portrait"><i class="icon-cogs"></i>查看大图</a>
                                    </p>
                                </div>
                            </li>
                            <!--<?php endif; ?>-->
                            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                            <!--<?php else: ?>-->
                            <?php $_from = $this->_var['available_templates']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'template');$this->_foreach['template'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['template']['total'] > 0):
    foreach ($_from AS $this->_var['template']):
        $this->_foreach['template']['iteration']++;
?>
                            <li>
                                <div class="zhanshi">
                                    <div class="temp_img"><?php if ($this->_var['template']['screenshot']): ?><img src="<?php echo $this->_var['template']['screenshot']; ?>" data-src-wide="../seller_themes/<?php echo $this->_var['template']['code']; ?>/template.jpg" border="0" id="<?php echo $this->_var['template']['code']; ?>" onclick="javascript:setupTemplate('<?php echo $this->_var['template']['code']; ?>')" class="pic"/><?php endif; ?></div>
                                    <div class="t_img2">
                                        <?php $_from = $this->_var['template_style'][$this->_var['template']['code']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'style');$this->_foreach['foo1'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['foo1']['total'] > 0):
    foreach ($_from AS $this->_var['style']):
        $this->_foreach['foo1']['iteration']++;
?>
                                            <?php if ($this->_foreach['foo1']['total'] > 1): ?>
                                                <img src="../themes/<?php echo $this->_var['template']['code']; ?>/images/type<?php echo $this->_var['style']; ?>_0.gif" border="0" onMouseOver="javascript:onSOver('<?php echo $this->_var['template']['code']; ?>', '<?php echo $this->_var['style']; ?>', this);" onMouseOut="onSOut('<?php echo $this->_var['template']['code']; ?>', this, '');" onclick="javascript:setupTemplateFG('<?php echo $this->_var['template']['code']; ?>', '<?php echo $this->_var['style']; ?>', this);">
                                            <?php endif; ?>
                                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                    </div>
                                    <p>模版名称：<?php echo $this->_var['template']['name']; ?></p>
                                    <p>店铺描述：<?php echo $this->_var['template']['desc']; ?></p>
                                    <p class="btn">
                                        <a href="#" onclick="javascript:setupTemplate('<?php echo $this->_var['template']['code']; ?>')" class="ecsc-btn"><i class="icon-cogs"></i>使用模板</a>
                                        <a href="javascript:void(0);" class="ecsc-btn portrait"><i class="icon-cogs"></i>查看大图</a>
                                    </p>
                                </div>
                            </li>
                            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                            <!--<?php endif; ?>-->
                            
                        </ul>        
                        <div class="carrousel">
                            <span class="carr_close">✕</span> 
                            <div class="wrapper"><img src="images/" alt="BINGOO" /></div>
                        </div>
                    </div>
                </div>
    		</div>
    	</div>                    
	</div>
</div>
<!-- end templates list -->
<?php echo $this->fetch('library/seller_footer.lbi'); ?>
<script type="text/javascript">
<!--

/**
 * 模板风格 全局变量
 */
var T = 0;
var StyleSelected = '<?php echo $this->_var['curr_tpl_style']; ?>';
var StyleCode = '';
var StyleTem = '';

/**
 * 安装模版
 */
function setupTemplate(tpl)
{
  if (tpl != StyleTem)
  {
    StyleCode = '';
  }
  if (confirm(setupConfirm))
  {
    Ajax.call('merchants_template.php?is_ajax=1&act=install', 'tpl_name=' + tpl + '&tpl_fg='+ StyleCode, setupTemplateResponse, 'GET', 'JSON');
  }
}

/**
 * 处理安装模版的反馈信息
 */
function setupTemplateResponse(result)
{
    StyleCode = '';
  if (result.message.length > 0)
  {
    alert(result.message);
  }
  if (result.error == 0)
  {
    //showTemplateInfo(result.content);
	location.reload();
  }
}

/**
 * 备份当前模板
 */
function defaultTemplate(tpl)
{
	if(confirm("您确认要使用默认店铺模板吗？")){
		Ajax.call('merchants_template.php?is_ajax=1&act=user_default', '', defaultTemplateResponse, "GET", "JSON");
	}
}

function defaultTemplateResponse(result)
{
  if (result.error == 0)
  {
    location.reload();
  }
}

/**
 * 显示模板信息
 */
function showTemplateInfo(res)
{
  document.getElementById("CurrTplStyleList").innerHTML = res.tpl_style;

  StyleSelected = res.stylename;

  document.getElementById("screenshot").src = res.screenshot;
  document.getElementById("templateName").innerHTML    = res.name;
  document.getElementById("templateDesc").innerHTML    = res.desc;
  document.getElementById("templateVersion").innerHTML = res.version;
  document.getElementById("templateAuthor").innerHTML  = '<a href="' + res.uri + '" target="_blank">' + res.author + '</a>';
  document.getElementById("backup").onclick = function () {backupTemplate(res.code);};
}

/**
 * 模板风格 切换
 */
function onSOver(tplid, fgid, _self)
{
  var re = /(\/|\\)([^\/\\])+\.png$/;
  var img_url = document.getElementById(tplid).src;
  StyleCode = fgid;
  StyleTem = tplid;
    
  T = 0;

  // 模板切换
  if ( tplid != '' && fgid != '')
  {
    document.getElementById(tplid).src = img_url.replace(re, '/screenshot_' + fgid + '.png');
  }
  else 
  {
    document.getElementById(tplid).src = img_url.replace(re, '/screenshot.png');
  }

  return true;
}
//
function onSOut(tplid, _self, def)
{
  if (T == 1)
  {
    return true;
  }

  var re = /(\/|\\)([^\/\\])+\.png$/;
  var img_url = document.getElementById(tplid).src;

  // 模板切换为默认风格
  if ( def != '' )
 {
    document.getElementById(tplid).src = def; 
  }
  else
  {
 //  document.getElementById(tplid).src = img_url.replace(re, '/screenshot.png');
  }

  return true;
}
//
function onTempSelectClear(tplid, _self)
{
  var re = /(\/|\\)([^\/\\])+\.png$/;
  var img_url = document.getElementById(tplid).src;

  // 模板切换为默认风格
  document.getElementById(tplid).src = img_url.replace(re, '/screenshot.png');
    
  T = 0;

  return true;
}

/**
 * 模板风格 AJAX安装
 */
function setupTemplateFG(tplNO, TplFG, _self)
{
  T = 1;

  if ( confirm(setupConfirm) )
  {
    Ajax.call('merchants_template.php?is_ajax=1&act=install', 'tpl_name=' + tplNO + '&tpl_fg=' + TplFG, setupTemplateResponse, 'GET', 'JSON');
  }

  if (_self)
  {
    onTempSelectClear(tplNO, _self);
  }

  return true;
}

//查看模板演示大图
function maxImg(){
	var carrousel = $(".carrousel");
	var width = $(window).width();
	var height = $(window).innerHeight();
	$(".portrait").click(function(e){
		var parent = $(this).parents('.zhanshi');
		var src = parent.find(".pic").attr("data-src-wide");
		carrousel.find("img").attr("src",src);
		carrousel.fadeIn(200);
	});
	
	carrousel.find(".carr_close").click(function(e){
		carrousel.find("img").attr("src",'');
		carrousel.fadeOut(200);
	});
	$(".carrousel .wrapper").css({'width':(width*0.6),'height':(height*0.8)});
}
maxImg();
//-->
$(function(){
	$('.nyroModalWzs').nyroModal();
});

</script>
</body>