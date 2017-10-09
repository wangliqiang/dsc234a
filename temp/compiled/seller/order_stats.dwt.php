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
                <div class="clear"></div>
                <div class="order_stats">
                    <div class="order_stats_top">
                        <div class="order_stats_items">
                            <div class="order_stats_item order_stats_item2">
                            	<i class="icon"><img src="images/icon2.png" /></i>
                                <div class="desc">
                                	<span class="tit"><?php echo $this->_var['lang']['overall_sum']; ?></span>
                                    <span class="value"><?php echo $this->_var['total_turnover']; ?></span>
                                </div>
                            </div>
                            <div class="order_stats_item order_stats_item3">
                            	<i class="icon"><img src="images/icon3.png" /></i>
                                <div class="desc">
                                	<span class="tit"><?php echo $this->_var['lang']['overall_choose']; ?></span>
                                    <span class="value"><?php echo $this->_var['click_count']; ?></span>
                                </div>
                            </div>
                            <div class="order_stats_item order_stats_item4">
                            	<i class="icon"><img src="images/icon4.png" /></i>
                                <div class="desc">
                                	<span class="tit"><?php echo $this->_var['lang']['kilo_buy_amount']; ?></span>
                                    <span class="value"><?php echo $this->_var['click_ordernum']; ?></span>
                                </div>
                            </div>
                            <div class="order_stats_item order_stats_item5">
                            	<i class="icon"><img src="images/icon5.png" /></i>
                                <div class="desc">
                                	<span class="tit"><?php echo $this->_var['lang']['kilo_buy_sum']; ?></span>
                                    <span class="value"><?php echo $this->_var['click_turnover']; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="order_stats_search">
                    	<div class="screeItme">
                            <form action="" method="post" id="selectForm" name="selectForm">
                                <strong class="fl lh mr10"><?php echo $this->_var['lang']['start_end_date']; ?>：</strong>
                                <div class="text_time" id="text_time1">
                                    <input name="start_date" id="start_date" value="<?php echo $this->_var['start_date']; ?>" class="text" readonly="readonly"/>
                                </div>
                                <div class="bolang">&nbsp;&nbsp;~&nbsp;&nbsp;</div>
                                <div class="text_time" id="text_time2">
                                    <input name="end_date" id="end_date" value="<?php echo $this->_var['end_date']; ?>" class="text" readonly="readonly"/>
                                </div>
                                <input type="submit" name="submit" value="<?php echo $this->_var['lang']['query']; ?>" class="sc-btn sc-blueBg-btn btn30 ml10" />
                            </form>
                        </div>
                        <div class="screeItme mt10">
                            <form method="post" id="selectForm" name="selectForm">
                                <strong class="fl lh mr10"><?php echo $this->_var['lang']['select_year_month']; ?>：</strong>
                                <!--<?php $_from = $this->_var['start_date_arr']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('k', 'start_date_0_98996100_1506919966');if (count($_from)):
    foreach ($_from AS $this->_var['k'] => $this->_var['start_date_0_98996100_1506919966']):
?>-->
                                <?php if ($this->_var['k'] > 0): ?>
                                <span class="bolang">&nbsp;&nbsp;+&nbsp;&nbsp;</span>
                                <?php endif; ?>
                                <div class="text_time" id="text_time_start">
                                    <input type="text" class="text text_2 mr0" name="year_month[]" id="year_month_<?php echo $this->_var['k']; ?>" value="<?php echo $this->_var['start_date_0_98996100_1506919966']; ?>" autocomplete="off" readonly>
                                </div>
                                <!--<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>-->
                                <input type="hidden" name="is_multi" value="1" />
                                <input type="submit" name="submit" value="<?php echo $this->_var['lang']['query']; ?>" class="sc-btn sc-blueBg-btn btn30 ml10" />
                            </form>
                        </div>
                    </div>
                    <div class="main-content p0 mt20">
                    	<div class="tabmenu">
                            <ul class="tab">
                                <li class="active" id="order_circs-tab" data-tab="order_circs"><a href="javascript:void(0);"><?php echo $this->_var['lang']['order_circs']; ?></a></li>
                                <li id="shipping-tab" data-tab="shipping"><a href="javascript:void(0);"><?php echo $this->_var['lang']['shipping_method']; ?></a></li>
                                <li id="pay-tab" data-tab="pay"><a href="javascript:void(0);"><?php echo $this->_var['lang']['pay_method']; ?></a></li>
                            </ul>
                        </div>
                        <div class="items-info">
                            <div class="wrapper-list">
                                <?php if ($this->_var['is_multi'] == '0'): ?>
                                <OBJECT classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" WIDTH="970" HEIGHT="400" id="OrderGeneral" ALIGN="middle">
                                    <PARAM NAME="FlashVars" value="&dataXML=<?php echo $this->_var['order_general_xml']; ?>">
                                    <PARAM NAME="movie" VALUE="images/charts/pie3d.swf?chartWidth=970&chartHeight=400">
                                    <PARAM NAME="quality" VALUE="high">
                                    <PARAM NAME=bgcolor VALUE="#FFFFFF">
                                    <param name="wmode" value="opaque" />
                                    <EMBED src="images/charts/pie3d.swf?chartWidth=970&chartHeight=400" FlashVars="&dataXML=<?php echo $this->_var['order_general_xml']; ?>" quality="high" bgcolor="#FFFFFF" WIDTH="970" HEIGHT="400" wmode="opaque" NAME="OrderGeneral" ALIGN="middle" TYPE="application/x-shockwave-flash" PLUGINSPAGE="http://www.macromedia.com/go/getflashplayer"></EMBED>
                                </OBJECT>
                                <?php else: ?>
                                <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" width="565" height="420" id="FCColumn2" align="middle">
                                    <PARAM NAME="FlashVars" value="&dataXML=<?php echo $this->_var['order_general_xml']; ?>">
                                    <PARAM NAME=movie VALUE="images/charts/MSColumn3D.swf?chartWidth=970&chartHeight=400">
                                    <param NAME="quality" VALUE="high">
                                    <param NAME="bgcolor" VALUE="#FFFFFF">
                                    <param name="wmode" value="opaque" />
                                    <embed src="images/charts/MSColumn3D.swf?chartWidth=970&chartHeight=400" FlashVars="&dataXML=<?php echo $this->_var['order_general_xml']; ?>" quality="high" bgcolor="#FFFFFF"  width="970" height="400" name="FCColumn2" wmode="opaque" align="middle" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer"></embed>
                                </object>
                                <?php endif; ?>
                            </div>
                            <div class="wrapper-list" style="display:none;">
                                <?php if ($this->_var['is_multi'] == '0'): ?>
                                <OBJECT classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" WIDTH="970" HEIGHT="400" id="ShipType" ALIGN="middle">
                                    <PARAM NAME="FlashVars" value="&dataXML=<?php echo $this->_var['ship_xml']; ?>">
                                    <PARAM NAME="movie" VALUE="images/charts/pie3d.swf?chartWidth=970&chartHeight=400">
                                    <PARAM NAME="quality" VALUE="high">
                                    <param name="wmode" value="opaque" />
                                    <PARAM NAME="bgcolor" VALUE="#FFFFFF">
                                    <EMBED src="images/charts/pie3d.swf?chartWidth=970&chartHeight=400" FlashVars="&dataXML=<?php echo $this->_var['ship_xml']; ?>" quality="high" bgcolor="#FFFFFF" WIDTH="970" HEIGHT="400" NAME="ShipType" ALIGN="middle" TYPE="application/x-shockwave-flash" PLUGINSPAGE="http://www.macromedia.com/go/getflashplayer" wmode="opaque"></EMBED>
                                </OBJECT>
                                <?php else: ?>
                                <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" width="565" height="420" id="FCColumn2" align="middle">
                                    <PARAM NAME="FlashVars" value="&dataXML=<?php echo $this->_var['ship_xml']; ?>">
                                    <PARAM NAME="movie" VALUE="images/charts/MSColumn3D.swf?chartWidth=970&chartHeight=400">
                                    <param NAME="quality" VALUE="high">
                                    <param NAME="bgcolor" VALUE="#FFFFFF">
                                    <param name="wmode" value="opaque" />
                                    <embed src="images/charts/MSColumn3D.swf?chartWidth=970&chartHeight=400" FlashVars="&dataXML=<?php echo $this->_var['ship_xml']; ?>" quality="high" bgcolor="#FFFFFF"  width="970" height="400" name="FCColumn2" wmode="opaque" align="middle" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer"></embed>
                                </object>
                                <?php endif; ?>
                            </div>
                            <div class="wrapper-list" style="display:none;">
                                <?php if ($this->_var['is_multi'] == '0'): ?>
                                <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" width="970" height="400" id="PayMethod" align="middle">
                                    <PARAM NAME="FlashVars" value="&dataXML=<?php echo $this->_var['pay_xml']; ?>">
                                    <PARAM NAME="movie" VALUE="images/charts/pie3d.swf?chartWidth=970&chartHeight=400">
                                    <PARAM NAME="quality" VALUE="high">
                                    <PARAM NAME="bgcolor" VALUE="#FFFFFF">
                                    <param name="wmode" value="opaque" />
                                    <embed src="images/charts/pie3d.swf?chartWidth=970&chartHeight=400" FlashVars="&dataXML=<?php echo $this->_var['pay_xml']; ?>" quality="high" bgcolor="#FFFFFF" WIDTH="970" HEIGHT="400" NAME="PayMethod" wmode="opaque" ALIGN="middle" TYPE="application/x-shockwave-flash" PLUGINSPAGE="http://www.macromedia.com/go/getflashplayer"></embed>
                                </object>
                                <?php else: ?>
                                <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" width="565" height="420" id="FCColumn2" align="middle">
                                    <PARAM NAME="FlashVars" value="&dataXML=<?php echo $this->_var['pay_xml']; ?>">
                                    <PARAM NAME=movie VALUE="images/charts/MSColumn3D.swf?chartWidth=970&chartHeight=400">
                                    <param NAME="quality" VALUE="high">
                                    <param NAME="bgcolor" VALUE="#FFFFFF">
                                    <param name="wmode" value="opaque" />
                                    <embed src="images/charts/MSColumn3D.swf?chartWidth=970&chartHeight=400" FlashVars="&dataXML=<?php echo $this->_var['pay_xml']; ?>" quality="high" bgcolor="#FFFFFF"  width="970" height="400" name="FCColumn2" wmode="opaque" align="middle" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer"></embed>
                                </object>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $this->fetch('library/seller_footer.lbi'); ?>
<script language="JavaScript">
	//日期选择插件调用start sunle
	var opts1 = {
		'targetId':'start_date',//时间写入对象的id
		'triggerId':['start_date'],//触发事件的对象id
		'alignId':'text_time1',//日历对齐对象
		'format':'-',//时间格式 默认'YYYY-MM-DD HH:MM:SS'
		'hms':'off'
	},opts2 = {
		'targetId':'end_date',
		'triggerId':['end_date'],
		'alignId':'text_time2',
		'format':'-',
		'hms':'off'
	},opts3 = {
		'targetId':'year_month_0',
		'triggerId':['year_month_0'],
		'alignId':'year_month_0',
		'format':'-',
		'hms':'off'
	},opts4 = {
		'targetId':'year_month_1',
		'triggerId':['year_month_1'],
		'alignId':'year_month_1',
		'format':'-',
		'hms':'off'
	},opts5 = {
		'targetId':'year_month_2',
		'triggerId':['year_month_2'],
		'alignId':'year_month_2',
		'format':'-',
		'hms':'off'
	},opts6 = {
		'targetId':'year_month_3',
		'triggerId':['year_month_3'],
		'alignId':'year_month_3',
		'format':'-',
		'hms':'off'
	},opts7 = {
		'targetId':'year_month_4',
		'triggerId':['year_month_4'],
		'alignId':'year_month_4',
		'format':'-',
		'hms':'off'
	}

	xvDate(opts1);
	xvDate(opts2);
	xvDate(opts3);
	xvDate(opts4);
	xvDate(opts5);
	xvDate(opts6);
	xvDate(opts7);
	//日期选择插件调用end sunle
</script>
</body>
</html>
