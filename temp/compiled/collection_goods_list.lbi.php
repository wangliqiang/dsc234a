<?php if ($this->_var['goods_list']): ?>
	<ul class="list-ul">
	<?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['goods_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['goods_list']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['goods_list']['iteration']++;
?>
		<li<?php if ($this->_foreach['goods_list']['iteration'] % 4 == 0): ?> class="last"<?php endif; ?>>
			<div class="coll-goods">
				<div class="p-img"><a href="<?php echo $this->_var['goods']['url']; ?>" target="_blank"><img src="<?php echo $this->_var['goods']['goods_thumb']; ?>"></a></div>
				<div class="p-name"><a href="<?php echo $this->_var['goods']['url']; ?>" target="_blank"><?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?></a></div>
				<div class="p-price">
                    <?php if ($this->_var['goods']['promote_price'] != ""): ?>
                    <?php echo $this->_var['lang']['promote_price']; ?><?php echo $this->_var['goods']['promote_price']; ?>
                    <?php else: ?>
					<?php echo $this->_var['goods']['shop_price']; ?>
                    <?php endif; ?>
				</div>
				<div class="p-btn"><a href="<?php echo $this->_var['goods']['url']; ?>" class="sc-btn">查看详情</a></div>
				<div class="p-oper">
					<?php if ($this->_var['goods']['user_id']): ?>
					<a href="merchants_store.php?merchant_id=<?php echo $this->_var['goods']['user_id']; ?>" target="_blank">进入店铺</a>
					<?php else: ?>
					<a href="index.php" target="_blank">进入首页</a>
					<?php endif; ?>
					<a href="javascript:void(0);" id="delete_goods_collect"  data-dialog="goods_collect_dialog" data-divid="delete_goods_collect" data-url="user.php?act=delete_collection&collection_id=<?php echo $this->_var['goods']['rec_id']; ?>&type=1" data-goodsid="0" data-width="455" data-height="58" data-title="<?php echo $this->_var['lang']['Prompt']; ?>">取消关注</a>
				</div>
			</div>
		</li>
	<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
	</ul>
<?php else: ?>
<div class="no_records">
	<i class="no_icon"></i>
    <div class="no_info"><h3><?php 
$k = array (
  'name' => 'get_page_no_records',
  'filename' => $this->_var['filename'],
  'act' => $this->_var['action'],
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?></h3></div>
</div>
<?php endif; ?>