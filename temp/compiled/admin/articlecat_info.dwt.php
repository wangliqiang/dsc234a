<!doctype html>
<html>
<head><?php echo $this->fetch('library/admin_html_head.lbi'); ?></head>

<body class="iframe_body">
	<div class="warpper">
    	<div class="title"><a href="<?php echo $this->_var['action_link']['href']; ?>" class="s-back"><?php echo $this->_var['lang']['back']; ?></a>文章-<?php echo $this->_var['ur_here']; ?></div>
        <div class="content">
        	<div class="explanation" id="explanation">
            	<div class="ex_tit"><i class="sc_icon"></i><h4>操作提示</h4><span id="explanationZoom" title="收起提示"></span></div>
                <ul>
                    <li>请注意选择上级分类。</li>
                    <li>标识“<em>*</em>”的选项为必填项，其余为选填项。</li>
                </ul>
            </div>
            <div class="flexilist">
                <div class="common-content">
                    <div class="mian-info">
                        <form method="post" action="articlecat.php" name="theForm" id="articlecat_form" >
                            <div class="switch_info">
                                <div class="item">
                                    <div class="label"><?php echo $this->_var['lang']['require_field']; ?><?php echo $this->_var['lang']['cat_name']; ?>：</div>
                                    <div class="label_value">
                                        <input type="text" id="username" name="cat_name" class="text" value="<?php echo htmlspecialchars($this->_var['cat']['cat_name']); ?>" id="cat_name" autocomplete="off" />
                                        <div class="form_prompt"></div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="label"><?php echo $this->_var['lang']['parent_cat']; ?>：</div>
                                    <div class="label_value">
                                        <div id="parent_cat" class="imitate_select select_w320">
                                          <div class="cite"><?php if ($this->_var['cat_name']): ?><?php echo $this->_var['cat_name']; ?><?php else: ?><?php echo $this->_var['lang']['cat_top']; ?><?php endif; ?></div>
                                          <ul>
                                          	<li><a href="javascript:;" data-value="0" cat_type="0" class="ftx-01"><?php echo $this->_var['lang']['cat_top']; ?></a></li>
                                          	<?php echo $this->_var['cat_select']; ?>
                                          </ul>
                                          <input name="parent_id" type="hidden" value="<?php echo empty($this->_var['cat']['parent_id']) ? $this->_var['cat_id'] : $this->_var['cat']['parent_id']; ?>" id="parent_cat_val">
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="label"><?php echo $this->_var['lang']['sort_order']; ?>：</div>
                                    <div class="label_value">
                                        <input type="text" name="sort_order" class="text" autocomplete="off" <?php if ($this->_var['cat']['sort_order']): ?>value='<?php echo $this->_var['cat']['sort_order']; ?>'<?php else: ?> value="50"<?php endif; ?> />
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="label"><?php echo $this->_var['lang']['show_in_nav']; ?>：</div>
                                    <div class="label_value">
                                        <div class="checkbox_items">
                                            <div class="checkbox_item">
                                                <input type="radio" class="ui-radio" name="show_in_nav" id="sex_1" value="1" <?php if ($this->_var['cat']['show_in_nav'] != 1): ?> checked="true"<?php endif; ?> />
                                                <label for="sex_1" class="ui-radio-label"><?php echo $this->_var['lang']['yes']; ?></label>
                                            </div>
                                            <div class="checkbox_item">
                                                <input type="radio" class="ui-radio" name="show_in_nav" id="sex_2" value="0" <?php if ($this->_var['cat']['show_in_nav'] != 0): ?> checked="true"<?php endif; ?> checked/>
                                                <label for="sex_2" class="ui-radio-label"><?php echo $this->_var['lang']['no']; ?></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="label"><?php echo $this->_var['lang']['cat_keywords']; ?>：</div>
                                    <div class="label_value">
                                        <input type="text" name="keywords" class="text" value='<?php echo htmlspecialchars($this->_var['cat']['keywords']); ?>' autocomplete="off" />
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="label"><?php echo $this->_var['lang']['cat_desc']; ?>：</div>
                                    <div class="label_value">
                                        <textarea name="cat_desc" cols="60" rows="4" class="textarea"><?php echo htmlspecialchars($this->_var['cat']['cat_desc']); ?></textarea>
                                    </div>
                                </div>
                                
                                <div class="item">
                                    <div class="label">&nbsp;</div>
                                    <div class="label_value info_btn">
                                        <a href="javascript:;" class="button" id="submitBtn"><?php echo $this->_var['lang']['button_submit']; ?></a>
                                        <input type="hidden" name="act" value="<?php echo $this->_var['form_action']; ?>" />
                                        <input type="hidden" name="id" value="<?php echo $this->_var['cat']['cat_id']; ?>" />
                                        <input type="hidden" name="old_catname" value="<?php echo $this->_var['cat']['cat_name']; ?>" />
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
	</div>
    </div>
 <?php echo $this->fetch('library/pagefooter.lbi'); ?>
    <script type="text/javascript">
        //会员基本信息 div仿select 
        $.divselect("#parent_cat","#parent_cat_val",function(obj){
            var select = obj.parents("#parent_cat");
            var val = obj.attr("cat_type");
            catChanged(val);
        });
        
		$(function(){
			$("#submitBtn").click(function(){
					if($("#articlecat_form").valid()){
							$("#articlecat_form").submit();
					}
			});
		
			$('#articlecat_form').validate({
					errorPlacement:function(error, element){
						var error_div = element.parents('div.label_value').find('div.form_prompt');
						element.parents('div.label_value').find(".notic").hide();
						error_div.append(error);
					},
					rules : {
							cat_name : {
									required : true
							}
							
					},
					messages : {
							cat_name : {
									required : '<i class="icon icon-exclamation-sign"></i>'+no_catname
							}
					}
			});
		});
		
		/**
		 * 选取上级分类时判断选定的分类是不是底层分类
		 */
		function catChanged(cat_type)
		{
		
			<?php if ($this->_var['cat_name']): ?>
			var text = "<?php echo $this->_var['cat_name']; ?>";
			<?php else: ?>
			 var text = "<?php echo $this->_var['lang']['cat_top']; ?>";
			<?php endif; ?>
		
		  if (cat_type == '')
		  {
			cat_type = 1;
		  }
		  if (cat_type == 2 || cat_type == 3 || cat_type == 5)
		  {
			alert(sys_hold);
			$("#parent_cat_val").val(0);
			$("#parent_cat .cite").html(text);
			return false;
		  }
		
		  return true;
		}
    </script>     
</body>
</html>
