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
                    <div class="ecsc-form-goods">
                        <form action="seller_shop_bg.php?act=second" name="theForm" method="post" enctype="multipart/form-data">
                        <div class="wrapper-list">	
                            <dl>
                          		<dt><?php echo $this->_var['lang']['background_image']; ?>：</dt>
                                <dd>
                                     <div class="type-file-box">
                                     	<div class="input">
                                        <input type="text" name="textfile" class="type-file-text" <?php if ($this->_var['shop_bg']['bgimg']): ?>value="<?php echo $this->_var['shop_bg']['bgimg']; ?>"<?php endif; ?> id="textfield" readonly>
                                        <input type="button" name="button" id="button" class="type-file-button" value="上传...">
                                        <input type="file" class="type-file-file" name="bgimg" size="30" hidefocus="true" value="">
                                        </div>
                                        <?php if ($this->_var['shop_bg']['bgimg']): ?>
                                        <span class="show">
                                        <a href="<?php echo $this->_var['shop_bg']['bgimg']; ?>" target="_blank" class="nyroModal"><i class="icon icon-picture" onmouseover="toolTip('<img src=<?php echo $this->_var['shop_bg']['bgimg']; ?>>')" onmouseout="toolTip()"></i></a>
                                        </span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form_prompt"></div>
                                </dd>
                       		</dl>
                            <dl>
                            	<dt><?php echo $this->_var['lang']['background_repeat']; ?>：</dt>
                                <dd>
                                    <div id="bgrepeat_div" class="imitate_select select_w120">
                                        <div class="cite">请选择</div>
                                        <ul>
                                            <li><a href="javascript:;" data-value="no-repeat" class="ftx-01"><?php echo $this->_var['lang']['not_repeat']; ?></a></li>
                                            <li><a href="javascript:;" data-value="repeat" class="ftx-01"><?php echo $this->_var['lang']['repeat']; ?></a></li>
                                            <li><a href="javascript:;" data-value="repeat-x" class="ftx-01"><?php echo $this->_var['lang']['left_right_repeat']; ?></a></li>
                                            <li><a href="javascript:;" data-value="repeat-y" class="ftx-01"><?php echo $this->_var['lang']['vertical_repeat']; ?></a></li>
                                        </ul>
                                        <input name="bgrepeat" type="hidden" value="<?php echo $this->_var['shop_bg']['bgrepeat']; ?>" id="bgrepeat_val">
                                    </div>
                                </dd>
                            </dl>
                            <dl>
                            	<dt><?php echo $this->_var['lang']['shop_background_color']; ?>：</dt>
                                <dd class="relative">
                                	<input type="text" name="bgcolor" maxlength="40" size="10" value="<?php echo $this->_var['shop_bg']['bgcolor']; ?>" id="bgcolor" class="text w120 mr10" />
                                    <input type="button" value="<?php echo $this->_var['lang']['select_color']; ?>" class="sc-btn btn30 sc-blueBg-btn go_color" />
                                	<input type='text' id="full" style="display:none"/>
                                </dd>
                            </dl>
                            <dl>
                            	<dt><?php echo $this->_var['lang']['shop_background']; ?>：</dt>
                                <dd>
                                	<div class="checkbox_items">
                                        <div class="checkbox_item">
                                            <input type="radio" value="0" name="show_img" class="ui-radio" id="show_img_0" <?php if ($this->_var['shop_bg']['show_img'] == 0): ?> checked<?php endif; ?>/>
                                            <label class="ui-radio-label" for="show_img_0"><?php echo $this->_var['lang']['display_color']; ?></label>
                                        </div>
                                        <div class="checkbox_item">
                                            <input type="radio" value="1"  name="show_img" class="ui-radio" id="show_img_1" <?php if ($this->_var['shop_bg']['show_img']): ?> checked<?php endif; ?>/>
                                            <label class="ui-radio-label" for="show_img_1"><?php echo $this->_var['lang']['display_image']; ?></label>
                                        </div>
                                    </div>
                                </dd>
                            </dl>
                            <dl>
                            	<dt><?php echo $this->_var['lang']['enable_custom_background']; ?>：</dt>
                                <dd>
                                	<div class="checkbox_items">
                                        <div class="checkbox_item">
                                            <input type="radio" value="0" name="is_custom" class="ui-radio" id="is_custom_0" <?php if ($this->_var['shop_bg']['is_custom'] == 0): ?> checked<?php endif; ?>/>
                                            <label class="ui-radio-label" for="is_custom_0"><?php echo $this->_var['lang']['no']; ?></label>
                                        </div>
                                        <div class="checkbox_item">
                                            <input type="radio" value="1" name="is_custom" class="ui-radio" id="is_custom_1" <?php if ($this->_var['shop_bg']['is_custom']): ?> checked<?php endif; ?>/>
                                            <label class="ui-radio-label" for="is_custom_1"><?php echo $this->_var['lang']['yes']; ?></label>
                                        </div>
                                	</div>
                                </dd>
                            </dl>
                            <dl class="button_info">
                            	<dt>&nbsp;</dt>
                                <dd>
                                	<input type="hidden" name="data_op" value="<?php echo $this->_var['data_op']; ?>"/>
                                    <input type="submit" value="<?php echo $this->_var['lang']['confirm_background']; ?>" class="sc-btn sc-blueBg-btn btn35" />
                                </dd>    
                            </dl>
                        </div>    
                        </form>
                    </div>
                </div>				
            </div>
        </div>
    </div>    
</div>
<?php echo $this->fetch('library/seller_footer.lbi'); ?>
<?php echo $this->smarty_insert_scripts(array('files'=>'spectrum-master/spectrum.js')); ?>
<link rel="stylesheet" type="text/css" href="js/spectrum-master/spectrum.css">
<script type="text/javascript" src="js/jquery.picTip.js"></script>
<script type="text/javascript">
//选色 start
$(function(){
	$('.go_color').click(function(){
		$('.sp-palette-buttons-disabled').show();
	});
	
	$('.sp-choose').click(function(){
		$('.sp-palette-buttons-disabled').hide();
		var sp_color = $('.sp-input').val();
		$('#bgcolor').val(sp_color);
	});
})

$("#update").click (function() {
	console.log($("#full").spectrum("option", "palette"));
	$("#full").spectrum("option", "palette", [
		["red", "green", "blue"]    
	]);
});

$("#full").spectrum({
	color: "#FFF",
	flat: true,
	showInput: true,
	className: "full-spectrum",
	showInitial: true,
	showPalette: true,
	showSelectionPalette: true,
	maxPaletteSize: 10,
	preferredFormat: "hex",
	localStorageKey: "spectrum.demo",
	move: function (color) {
		
	},
	palette: [
		["rgb(0, 0, 0)", "rgb(67, 67, 67)", "rgb(102, 102, 102)",
		"rgb(204, 204, 204)", "rgb(217, 217, 217)","rgb(255, 255, 255)"],
		["rgb(152, 0, 0)", "rgb(255, 0, 0)", "rgb(255, 153, 0)", "rgb(255, 255, 0)", "rgb(0, 255, 0)",
		"rgb(0, 255, 255)", "rgb(74, 134, 232)", "rgb(0, 0, 255)", "rgb(153, 0, 255)", "rgb(255, 0, 255)"], 
		["rgb(230, 184, 175)", "rgb(244, 204, 204)", "rgb(252, 229, 205)", "rgb(255, 242, 204)", "rgb(217, 234, 211)", 
		"rgb(208, 224, 227)", "rgb(201, 218, 248)", "rgb(207, 226, 243)", "rgb(217, 210, 233)", "rgb(234, 209, 220)", 
		"rgb(221, 126, 107)", "rgb(234, 153, 153)", "rgb(249, 203, 156)", "rgb(255, 229, 153)", "rgb(182, 215, 168)", 
		"rgb(162, 196, 201)", "rgb(164, 194, 244)", "rgb(159, 197, 232)", "rgb(180, 167, 214)", "rgb(213, 166, 189)", 
		"rgb(204, 65, 37)", "rgb(224, 102, 102)", "rgb(246, 178, 107)", "rgb(255, 217, 102)", "rgb(147, 196, 125)", 
		"rgb(118, 165, 175)", "rgb(109, 158, 235)", "rgb(111, 168, 220)", "rgb(142, 124, 195)", "rgb(194, 123, 160)",
		"rgb(166, 28, 0)", "rgb(204, 0, 0)", "rgb(230, 145, 56)", "rgb(241, 194, 50)", "rgb(106, 168, 79)",
		"rgb(69, 129, 142)", "rgb(60, 120, 216)", "rgb(61, 133, 198)", "rgb(103, 78, 167)", "rgb(166, 77, 121)",
		"rgb(91, 15, 0)", "rgb(102, 0, 0)", "rgb(120, 63, 4)", "rgb(127, 96, 0)", "rgb(39, 78, 19)", 
		"rgb(12, 52, 61)", "rgb(28, 69, 135)", "rgb(7, 55, 99)", "rgb(32, 18, 77)", "rgb(76, 17, 48)"]
	]
});
//选色 end
</script>
</body>