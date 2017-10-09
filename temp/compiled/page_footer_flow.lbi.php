
<div class="footer<?php if ($this->_var['footer'] == 1): ?> user-footer<?php else: ?> settled-footer<?php endif; ?>">
	<div class="dsc-copyright">
		<div class="w w1200">
			<?php if ($this->_var['navigator_list']['bottom']): ?> 
			<p class="footer-ecscinfo pb10">
				<?php $_from = $this->_var['navigator_list']['bottom']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'nav');$this->_foreach['nav_bottom_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['nav_bottom_list']['total'] > 0):
    foreach ($_from AS $this->_var['nav']):
        $this->_foreach['nav_bottom_list']['iteration']++;
?> 
				<a href="<?php echo $this->_var['nav']['url']; ?>" <?php if ($this->_var['nav']['opennew'] == 1): ?> target="_blank" <?php endif; ?>><?php echo $this->_var['nav']['name']; ?></a> 
				<?php if (! ($this->_foreach['nav_bottom_list']['iteration'] == $this->_foreach['nav_bottom_list']['total'])): ?> 
				| 
				<?php endif; ?> 
				<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
			</p>
			<?php endif; ?> 
			<?php if ($this->_var['img_links'] || $this->_var['txt_links']): ?>
			<p class="footer-otherlink">	
				<?php $_from = $this->_var['img_links']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'link');if (count($_from)):
    foreach ($_from AS $this->_var['link']):
?>
				<a href="<?php echo $this->_var['link']['url']; ?>" target="_blank" title="<?php echo $this->_var['link']['name']; ?>"><img src="<?php echo $this->_var['link']['logo']; ?>" alt="<?php echo $this->_var['link']['name']; ?>" border="0" /></a>
				<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
				<?php if ($this->_var['txt_links']): ?>
				<?php $_from = $this->_var['txt_links']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'link');$this->_foreach['nolink'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['nolink']['total'] > 0):
    foreach ($_from AS $this->_var['link']):
        $this->_foreach['nolink']['iteration']++;
?>
				<a href="<?php echo $this->_var['link']['url']; ?>" target="_blank" title="<?php echo $this->_var['link']['name']; ?>"><?php echo $this->_var['link']['name']; ?></a>
				<?php if (! ($this->_foreach['nolink']['iteration'] == $this->_foreach['nolink']['total'])): ?> 
				| 
				<?php endif; ?> 
				<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
				<?php endif; ?>
			</p>
			<?php endif; ?>
			<?php if ($this->_var['icp_number']): ?> 
			<p class="copyright_info"><?php echo $this->_var['lang']['icp_number']; ?>:<a href="http://www.miibeian.gov.cn/" target="_blank"><?php echo $this->_var['icp_number']; ?></a> <a href="http://www.dscmall.cn/" target="_blank">POWERED BY大商创2.0</a></p>
			<?php endif; ?>
		</div>
	</div>
</div>
<?php echo $this->smarty_insert_scripts(array('files'=>'scroll_city.js')); ?>
<script type="text/javascript">
	//IM
    function openWin(obj) {
        var where_goods = "";
		if($(obj).attr('goods_id')){
			where_goods = '&goods_id=' + $(obj).attr('goods_id');
		}
		
		var where_seller = "";
		if($(obj).attr('ru_id')){
			where_seller = '&ru_id=' + $(obj).attr('ru_id');
		}

        if($(obj).attr('IM_type') != 'dsc'){
            var where = where_goods + where_seller;
        }else{
            var where = '';
        }
        var url='online.php?act=service' + where                   //转向网页的地址;
        var name='webcall';                         //网页名称，可为空;
        var iWidth=700;                          //弹出窗口的宽度;
        var iHeight=500;                         //弹出窗口的高度;
        //获得窗口的垂直位置
        var iTop = (window.screen.availHeight - 30 - iHeight) / 2;
        //获得窗口的水平位置
        var iLeft = (window.screen.availWidth - 10 - iWidth) / 2;
        window.open(url, name, 'height=' + iHeight + ',,innerHeight=' + iHeight + ',width=' + iWidth + ',innerWidth=' + iWidth + ',top=' + iTop + ',left=' + iLeft + ',status=no,toolbar=no,menubar=no,location=no,resizable=no,scrollbars=0,titlebar=no');
    }
</script>