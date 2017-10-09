<div class="user-order-list">
<?php $_from = $this->_var['orders']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
<dl class="item">
    <dt class="item-t">
        <div class="t-statu"><?php if ($this->_var['item']['return_status'] == 6): ?><span class="red"><?php echo $this->_var['lang']['rf'][$this->_var['item']['return_status']]; ?></span><?php else: ?><?php echo $this->_var['item']['reimburse_status']; ?><?php endif; ?></div>
        <div class="t-info">
            <span class="info-item"><?php echo $this->_var['lang']['return_sn_user']; ?>：<?php echo $this->_var['item']['return_sn']; ?></span>
            <span class="info-item"><?php echo $this->_var['lang']['apply_time']; ?>：<?php echo $this->_var['item']['apply_time']; ?></span>
        </div>
        <?php if ($this->_var['item']['return_type'] == 1): ?><div class="t-price"><?php echo $this->_var['lang']['y_amount']; ?>：<span class="red"><?php echo $this->_var['item']['should_return']; ?></span></div><?php endif; ?>
    </dt>
    <dd class="item-c">
        <div class="c-left">
            <div class="c-goods">
                <div class="c-img"><a href="goods.php?id=<?php echo $this->_var['item']['goods_id']; ?>" target="_blank"><img src="<?php echo $this->_var['item']['goods_thumb']; ?>" alt=""></a></div>
                <div class="c-info">
                    <div class="info-name"><a href="goods.php?id=<?php echo $this->_var['item']['goods_id']; ?>" target="_blank"><?php echo $this->_var['item']['goods_name']; ?></a></div>
                    <!--<div class="info-price"><b>￥70.5</b><i>×</i><span>2</span></div>-->
                </div>
            </div>
        </div>
        <div class="c-handle">
            <a href="user.php?act=return_detail&ret_id=<?php echo $this->_var['item']['ret_id']; ?>&order_id=<?php echo $this->_var['item']['order_id']; ?>" class="sc-btn">查看</a>
            <?php if ($this->_var['item']['return_status'] == 3): ?><a href="user.php?act=return_delivery&order_id=<?php echo $this->_var['item']['order_id']; ?>" class="sc-btn" onclick="if (!confirm('."'你确认已经收到货物了吗？否则财物两空哦！'".')) return false;">确认收货</a><?php endif; ?>
            <?php if ($this->_var['item']['return_status'] == 0 && $this->_var['item']['refound_status'] == 0): ?>
            <a href="user.php?act=cancel_return&ret_id=<?php echo $this->_var['item']['ret_id']; ?>" onclick="if (!confirm('."'你确认取消该退换货申请吗？'".')) return false;" class="sc-btn">取消</a>
            <?php endif; ?>
            <?php if ($this->_var['item']['return_status'] == 4): ?><a href="javascript:get_order_delete_return(<?php echo $this->_var['item']['ret_id']; ?>);" class="sc-btn">删除</a><?php endif; ?>
        </div>
    </dd>
</dl>
<?php endforeach; else: ?>
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
<?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
</div>