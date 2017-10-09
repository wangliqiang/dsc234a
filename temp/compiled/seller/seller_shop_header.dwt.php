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
                <div class="ecsc-form-goods">
                    <form method="post" action="index.php" name="theForm" enctype="multipart/form-data">
                    <div class="wrapper-list">
                    <dl>
                        <dt><?php echo $this->_var['lang']['top_color']; ?>：</dt>
                        <dd>
                        	<div class="checkbox_items">
                                <div class="checkbox_item">
                                    <input name="headtype" type="radio" value="0" class="ui-radio" id="headtype_0" <?php if ($this->_var['shopheader_info']['headtype'] == 0): ?>checked="checked"<?php endif; ?> onchange="get_headtype(this.value)" />
                                    <label class="ui-radio-label" for="headtype_0"><?php echo $this->_var['lang']['imgage']; ?></label>
                                </div>
                                <div class="checkbox_item">
                                    <input name="headtype" type="radio" value="1" class="ui-radio" id="headtype_1" <?php if ($this->_var['shopheader_info']['headtype'] == 1): ?>checked="checked"<?php endif; ?> onchange="get_headtype(this.value)" />
                                    <label class="ui-radio-label" for="headtype_1"><?php echo $this->_var['lang']['color']; ?></label>
                                </div>
                            </div>
                        </dd>
                    </dl>
                    <dl style="display:<?php if ($this->_var['shopheader_info']['headtype'] == 1): ?>none<?php endif; ?>" id="headbgImg">
                        <dt>&nbsp;</dt>
                        <dd>
                            <div class="type-file-box">
                            	<div class="input">
                                    <input type="text" name="textfile" class="type-file-text" <?php if ($this->_var['shopheader_info']['headbg_img']): ?>value="<?php echo $this->_var['shopheader_info']['headbg_img']; ?>"<?php endif; ?> id="textfield" readonly>
                                    <input type="button" name="button" id="button" class="type-file-button" value="上传...">
                                    <input type="file" class="type-file-file" name="img_url" size="30" hidefocus="true" value="">
                                </div>
                                <?php if ($this->_var['shopheader_info']['headbg_img']): ?>
                                <span class="show">
                                <a href="<?php echo $this->_var['shopheader_info']['headbg_img']; ?>" target="_blank" class="nyroModal"><i class="icon icon-picture" onmouseover="toolTip('<img src=<?php echo $this->_var['shopheader_info']['headbg_img']; ?>>')" onmouseout="toolTip()"></i></a>
                                </span>
                                <?php endif; ?>
                            </div>
                            <div class="form_prompt"></div>
                        </dd>
                    </dl>
                    <dl style="display:<?php if ($this->_var['shopheader_info']['headtype'] == 0): ?>none<?php endif; ?>" id="shopColor">
                        <dt>&nbsp;</dt>
                        <dd class="relative">
                            <input type="text" name="shop_color" maxlength="40" size="15" value="<?php echo $this->_var['shopheader_info']['shop_color']; ?>" id="wincolor" class="text w120 mr10" />
                            <input type="button" value="<?php echo $this->_var['lang']['select_color']; ?>" class="sc-btn btn30 sc-blueBg-btn go_color" />
                            <input type='text' id="full" style="display:none"/>
                        </dd>
                    </dl>
                    <dl class="notBg">
                        <dt><?php echo $this->_var['lang']['top_content']; ?>：</dt>
                        <dd><div style="height:520px;"><?php echo $this->_var['FCKeditor']; ?></div></dd>
                    </dl>
                    <div class="button-bottom">
                        <div class="button_info">
                        <input type="submit" class="sc-btn sc-blueBg-btn btn35" value="<?php echo $this->_var['lang']['button_submit']; ?>" />
                        <input type="hidden" name="act" value="<?php echo $this->_var['form_action']; ?>" />
                        <input type="hidden" name="id" value="<?php echo $this->_var['shop_info']['id']; ?>" />
                        <input type="hidden" name="seller_theme" value="<?php echo $this->_var['shop_info']['seller_theme']; ?>" />
                        </div>
                    </div>
                    </div>
                </form>
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
	$('.sp-palette-buttons-disabled').hide();
	
	$('.go_color').click(function(){
		$('.sp-palette-buttons-disabled').show();
	});
	
	$('.sp-choose').click(function(){
		
		$('.sp-palette-buttons-disabled').hide();
		var sp_color = $('.sp-input').val();
		$('#wincolor').val(sp_color);
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

function get_headtype(val){
	if(val == 1){
		$('#headbgImg').hide();
		$('#shopColor').show();
	}else{
		$('#headbgImg').show();
		$('#shopColor').hide();
	}
}
</script>
</body>