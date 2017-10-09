<?php if ($this->_var['ad_child']): ?>
<?php $_from = $this->_var['ad_child']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'ad');$this->_foreach['noad'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['noad']['total'] > 0):
    foreach ($_from AS $this->_var['key'] => $this->_var['ad']):
        $this->_foreach['noad']['iteration']++;
?>
<div class="banner" style="background:<?php echo $this->_var['ad']['link_color']; ?>;">
    <div class="w w1200 relative">
        <div class="act-banner-wp">
            <a href="<?php echo $this->_var['ad']['ad_link']; ?>" target="_blank"><img src="<?php echo $this->_var['ad']['ad_code']; ?>" style="max-width:<?php echo $this->_var['ad']['ad_width']; ?>px; max-height:<?php echo $this->_var['ad']['ad_height']; ?>px;"></a>
        </div>
    </div>
</div>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
<?php endif; ?>