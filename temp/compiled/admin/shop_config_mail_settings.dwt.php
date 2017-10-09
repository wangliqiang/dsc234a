<!doctype html>
<html>
<head><?php echo $this->fetch('library/admin_html_head.lbi'); ?></head>

<body class="iframe_body">
	<div class="warpper">
    	<div class="title">系统设置 - <?php echo $this->_var['ur_here']; ?></div>
        <div class="content">
        	<div class="explanation" id="explanation">
            	<div class="ex_tit">
					<i class="sc_icon"></i><h4>操作提示</h4><span id="explanationZoom" title="收起提示"></span>
                    <?php if ($this->_var['open'] == 1): ?>
                    <div class="view-case">
                    	<div class="view-case-tit"><i></i>查看教程</div>
                        <div class="view-case-info">
                        	<a href="http://help.ecmoban.com/article-6879.html" target="_blank">商城邮件服务器设置</a>
                        </div>
                    </div>			
                    <?php endif; ?>	
				</div>
                <ul><?php echo $this->_var['lang']['mail_settings_note']; ?></ul>
            </div>
            <div class="flexilist">
                <div class="common-content">
                    <div class="mian-info">
                        <form method="POST" action="shop_config.php?act=post" id="email_form">
                    	<div class="switch_info shopConfig_switch">
                            <div class="items">
                                <?php $_from = $this->_var['cfg']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'var');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['var']):
?>
                                    <?php echo $this->fetch('library/shop_config_form.lbi'); ?>
                                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                <div class="item">
                                    <div class="label"><?php echo $this->_var['lang']['cfg_name']['test_mail_address']; ?>：</div>
                                    <div class="label_value">
                                        <input name="test_mail_address" type="text" id="tag_name" value="<?php echo $this->_var['tag']['tag_words']; ?>" maxlength="60" class="text" />
                                        <input type="button" value="<?php echo $this->_var['lang']['cfg_name']['send']; ?>" onclick="sendTestEmail();" class="btn btn30 red_btn" />
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="label">&nbsp;</div>
                                    <div class="label_value info_btn">
                                        <input name="submit" type="submit" value="<?php echo $this->_var['lang']['button_submit']; ?>" class="button" />
                                        <input type="reset" value="<?php echo $this->_var['lang']['button_reset']; ?>" class="button button_reset">
                                        <input name="type" type="hidden" value="mail_setting" class="button" />
                                    </div>
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
    <script language="javascript">
     /**
	 * 测试邮件的发送
	 */
	function sendTestEmail()
	{
	
	  var smtp_host         =$("input[name='value[501]']").val();
	  var smtp_port         = $("input[name='value[502]']").val();
	  var smtp_user         = $("input[name='value[503]']").val();
	  var smtp_pass         = $("input[name='value[504]']").val();
	  var reply_email       = $("input[name='value[505]']").val();
	  var test_mail_address       = $("input[name='test_mail_address']").val();
	  var coding = $("input[name='value[506]']");
	  var res = $("input[name='value[507]']");
		
	  var mail_charset = 0;
	
	  for (i = 0; i < coding.length; i++)
	  {
		if (coding[i].checked)
		{
			mail_charset = coding[i].value;
		}
	  }
	
	  var mail_service = 0;
	
	  for (i = 0; i < res.length; i++)
	  {
		if (res[i].checked)
		{
		  mail_service = res[i].value;
		}
	  }
	  
	  $.jqueryAjax('shop_config.php', 'is_ajax=1&act=send_test_email&email='+test_mail_address+'&mail_service='+mail_service+"&smtp_host="+smtp_host+"&smtp_port="+smtp_port+
			  '&smtp_user=' + smtp_user + '&smtp_pass=' + encodeURIComponent(smtp_pass) + '&reply_email=' + reply_email + '&mail_charset=' + mail_charset,function(result){
				alert(result.message);
		}, 'POST', 'JSON');
	//  Ajax.call('shop_config.php?is_ajax=1&act=send_test_email',
	//    'email=' + test_mail_address + '&mail_service=' + mail_service + '&smtp_host=' + smtp_host + '&smtp_port=' + smtp_port +
	//    '&smtp_user=' + smtp_user + '&smtp_pass=' + encodeURIComponent(smtp_pass) + '&reply_email=' + reply_email + '&mail_charset=' + mail_charset,
	//    emailResponse, 'POST', 'JSON');
	}
	
	/**
	 * 邮件发送的反馈信息
	 */
	function emailResponse(result)
	{
	  alert(result.message);
	}
    </script>
</body>
</html>
