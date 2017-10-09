<div class="grid-sizer"></div>
<div class="gutter-sizer"></div>
<?php if ($this->_var['store_shop_list']): ?>
<?php $_from = $this->_var['store_shop_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'shop');if (count($_from)):
    foreach ($_from AS $this->_var['shop']):
?>
<div class="street-list-item">
    <a href="<?php echo $this->_var['shop']['shop_url']; ?>" target="_blank" class="cover"><img src="<?php echo $this->_var['shop']['street_thumb']; ?>" alt="<?php echo $this->_var['shop']['shopName']; ?>"></a>
    <div class="info">
        <a href="javascript:void(0);" ectype="collect_store" data-value='{"userid":<?php echo $this->_var['user_id']; ?>,"storeid":<?php echo $this->_var['shop']['ru_id']; ?>}' data-url="store_street.php" class="s-follow<?php if ($this->_var['shop']['collect_store'] != 0): ?> selected<?php endif; ?>"><i class="iconfont<?php if ($this->_var['shop']['collect_store'] != 0): ?> icon-zan-alts<?php else: ?> icon-zan-alt<?php endif; ?>"></i></a>
        <div class="s-logo"><a href="<?php echo $this->_var['shop']['shop_url']; ?>" target="_blank"><img src="<?php echo $this->_var['shop']['brand_thumb']; ?>" alt="<?php echo $this->_var['shop']['shopName']; ?>"></a></div>
        <div class="s-name"><a href="<?php echo $this->_var['shop']['shop_url']; ?>" target="_blank" class="name"><?php echo $this->_var['shop']['shopName']; ?></a></div>
        <?php if ($this->_var['shop']['self_run']): ?>
        <div class="seller-sr"><?php echo $this->_var['lang']['platform_self']; ?></div>
        <?php endif; ?>
        <p><?php if ($this->_var['shop']['shoprz_brandName']): ?>主营品牌： <?php echo $this->_var['shop']['shoprz_brandName']; ?><?php else: ?>&nbsp;<?php endif; ?></p>
        <p><?php if ($this->_var['shop']['grade_img']): ?>商家等级： <!--<span class="shop-level-icon level-1"></span>--><img src="<?php echo $this->_var['shop']['grade_img']; ?>" title="<?php echo $this->_var['shop']['grade_name']; ?>" width="20"/><?php else: ?>&nbsp;<?php endif; ?></p>
    </div>
</div>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
<?php endif; ?>