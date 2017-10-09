<?php if ($this->_var['full_page']): ?>
<!doctype html>
<html>
<?php echo $this->fetch('pageheader.dwt'); ?>
<div class="content">
	<div class="title"><?php echo $this->_var['page_title']; ?></div>
    <div class="explanation" id="explanation">
        <i class="sc_icon"></i>
        <ul>
            <li>通过前台门店自提的商品订单，可验证提货码进行付款自提操作。</li>
            <li>平台设置该门店为抢单门店，可操作订单抢单，请及时操作，以免耽误发货。</li>
        </ul>
    </div>
    <div class="common-head">
    	<div class="search">
        	<input type="text" class="text mr10" name="mobile" placeholder="手机号码" />
        	<input type="text" class="text mr10" name="pick_code" placeholder="提货码" />
        	<input type="text" class="text" name="order_sn" placeholder="请输入订单号" />
            <button class="btn" name="search" onclick="searchOrder()">搜索</button>
        </div>
    </div>
    <div class="list-div" id="listDiv">
    <?php endif; ?>
    <table class="table">
        <thead>
            <tr>
            	<th width="78" class="first">编号</th>
                <th width="443" class="tl"><?php echo $this->_var['lang']['goods_name']; ?></th>
                <th width="116"><?php echo $this->_var['lang']['goods_price']; ?></th>
                <th width="50"><?php echo $this->_var['lang']['goods_number']; ?></th>
                <th width="116"><?php echo $this->_var['lang']['order_fee']; ?></th>
                <th width="116"><?php echo $this->_var['lang']['consignee']; ?></th>
                <th width="147"><?php echo $this->_var['lang']['order_status']; ?></th>
                <th width="116" class="last"><?php echo $this->_var['lang']['handler']; ?></th>
            </tr>
        </thead>
        <?php $_from = $this->_var['order_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'order');$this->_foreach['sn'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['sn']['total'] > 0):
    foreach ($_from AS $this->_var['order']):
        $this->_foreach['sn']['iteration']++;
?>
        <tbody>
        	<tr class="sep-row">
                <td colspan="10"></td>
            </tr>
            <tr class="order-hd">
            	<td class="first"><?php echo $this->_foreach['sn']['iteration']; ?></td>
                <td colspan="7" class="hd-info last"><span><?php echo $this->_var['lang']['order_sn']; ?>：<?php echo $this->_var['order']['order_sn']; ?></span><span style="margin-left:50px;"><?php echo $this->_var['lang']['add_time']; ?>：<?php echo $this->_var['order']['add_time']; ?></span></td>
            </tr>
            <?php $_from = $this->_var['order']['order_goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['goods'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['goods']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['goods']['iteration']++;
?>
            <tr>
            	<td class="first">&nbsp;</td>
                <td>
                	<div class="order_product">
                        <div class="img"><img src="<?php echo $this->_var['goods']['goods_thumb']; ?>" width="50" height="50"></div>
                        <div class="name"><a href="../goods.php?id=<?php echo $this->_var['goods']['goods_id']; ?>" target="_blank"><?php echo $this->_var['goods']['goods_name']; ?></a></div>
                    </div>
                </td>
                <td><?php echo $this->_var['goods']['formated_goods_price']; ?></td>
                <td><?php echo $this->_var['goods']['goods_number']; ?></td>
            	<?php if ($this->_foreach['goods']['iteration'] == 1): ?>
                    <td rowspan="<?php echo $this->_var['order']['rowspan']; ?>" <?php if ($this->_var['order']['rowspan'] > 1): ?>class="border-left"<?php endif; ?>><?php echo $this->_var['order']['formated_total_fee']; ?></a></td>
                    <td rowspan="<?php echo $this->_var['order']['rowspan']; ?>"><?php echo $this->_var['order']['consignee']; ?></a></td>
                    <td rowspan="<?php echo $this->_var['order']['rowspan']; ?>"><?php echo $this->_var['lang']['os'][$this->_var['order']['order_status']]; ?>,<?php echo $this->_var['lang']['ps'][$this->_var['order']['pay_status']]; ?>,<?php echo $this->_var['lang']['ss'][$this->_var['order']['shipping_status']]; ?></a></td>
                    <td rowspan="<?php echo $this->_var['order']['rowspan']; ?>" class="handle last">
                    <?php if ($this->_var['order']['order_status'] == 2): ?>
                    <strong>已取消</strong>
                    <?php elseif ($this->_var['order']['order_status'] == 3): ?>
                    <strong>无效</strong>
                    <?php elseif ($this->_var['order']['order_status'] == 3): ?>
                    <strong>退换货</strong>
                    <?php else: ?>
                        <?php if ($this->_var['order']['store_id'] == 0): ?>
                            <a href="javascript:deal_store_order(<?php echo $this->_var['order']['id']; ?>, 'grab_order');"><?php echo $this->_var['lang']['grab_order']; ?></a>
                        <?php else: ?>
                            <?php if ($this->_var['order']['is_grab_order'] == 1): ?>
                                <?php if ($this->_var['order']['shipping_status'] > 0): ?>
                                    <!--<strong><?php echo $this->_var['lang']['delivery_finished']; ?></strong>-->
                                    <a href="javascript:deal_store_order(<?php echo $this->_var['order']['id']; ?>, 'achieve');">查看订单</a>
                                <?php else: ?>
                                    <a href="javascript:deal_store_order(<?php echo $this->_var['order']['id']; ?>, 'delivery');"><?php echo $this->_var['lang']['store_delivery']; ?></a>
                                <?php endif; ?>
                            <?php else: ?>
                                <?php if ($this->_var['order']['shipping_status'] > 0): ?>
                                    <strong><?php echo $this->_var['lang']['pick_finished']; ?></strong>
                                <?php else: ?>
                                    <a href="javascript:deal_store_order(<?php echo $this->_var['order']['id']; ?>, 'pick_goods');"><?php echo $this->_var['lang']['pay_pick']; ?></a>
                                <?php endif; ?>
                            <?php endif; ?>	
                        <?php endif; ?>
                    <?php endif; ?>
                    </td>
            	<?php endif; ?>		  
            </tr>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </tbody>
        <?php endforeach; else: ?>
        <tbody>
			<tr class="tfoot"><td class="no-records" colspan="10"><?php echo $this->_var['lang']['no_records']; ?></td></tr>
        </tbody>  
		<?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
        <tfoot>
            <tr>
                <td colspan="10"><?php echo $this->fetch('page.dwt'); ?></td>
            </tr>
        </tfoot>
    </table>
    <?php if ($this->_var['full_page']): ?>
    </div>
</div>

<script type="text/javascript">
listTable.recordCount = <?php echo $this->_var['record_count']; ?>;
listTable.pageCount = <?php echo $this->_var['page_count']; ?>;

<?php $_from = $this->_var['filter']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
listTable.filter.<?php echo $this->_var['key']; ?> = '<?php echo $this->_var['item']; ?>';
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

function searchOrder()
{
	var order_sn = $("input[name='order_sn']").val();
	var pick_code = $("input[name='pick_code']").val();
	var mobile = $("input[name='mobile']").val();
	listTable.filter['order_sn'] = Utils.trim(order_sn);
	listTable.filter['pick_code'] = Utils.trim(pick_code);
	listTable.filter['mobile'] = Utils.trim(mobile);
	listTable.filter['page'] = 1;
	listTable.loadList();	  
}

/*门店订单操作*/
function deal_store_order(id, operate)
{
	$.ajax({
		type:'get',
		url:'order.php',
		data:'act=deal_store_order&id='+id+'&operate='+operate,
		dataType:'json',
		success:function(data){
			pb({
			 id:operate,
			 title:"",
			 content:data.content,
			 drag:false,
			 foot:false
		  });
		}
	});
}
function resize(){
	var height = $(".content").height();
	var wheight = $(window).height();
	if(wheight>height){
		$(".footer").css({"position":"absolute","bottom":0});
	}else{
		$(".footer").css({"position":"static","bottom":0});
	}
}
</script>
<?php echo $this->fetch('pagefooter.dwt'); ?>
<?php endif; ?>