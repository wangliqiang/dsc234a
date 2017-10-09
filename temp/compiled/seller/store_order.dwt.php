<?php if ($this->_var['full_page']): ?>
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
                <div class="search-info">
                    <div class="search-form">
                    <form action="javascript:searchOrder()" name="searchForm">
                        <div id="status" class="imitate_select select_w145">
                            <div class="cite"><?php echo $this->_var['lang']['select_please']; ?></div>
                            <ul>
                                <li><a href="javascript:;" data-value="-1" class="ftx-01"><?php echo $this->_var['lang']['select_please']; ?></a></li>
                                <?php $_from = $this->_var['status_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'list');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['list']):
?>
                                <li><a href="javascript:;" data-value="<?php echo $this->_var['key']; ?>" class="ftx-01"><?php echo $this->_var['list']; ?></a></li>
                                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                            </ul>
                            <input name="status" type="hidden" value="-1"/>
                        </div>
                        <input type="text" class="text w140 mr10" name="consignee" value="" placeholder="<?php echo $this->_var['lang']['consignee']; ?>">
                        <input type="text" class="text w140 mr10" name="order_sn" value="" placeholder="<?php echo $this->_var['lang']['order_sn']; ?>">
                        <div class="search-key">
                        <input type="text" class="text w140" name="keywords" value="" placeholder="商品编号/商品关键字">
                        <input type="submit" class="submit" value="搜索">
                        </div>
                    </form>
                    </div>
                </div>
                <div class="btn-info">
                	<a href="javascript:void(0);" class="sc-btn sc-blue-btn" ectype="merge_order"><i class="icon icon-copy"></i>合并订单</a>
                        <a href="javascript:download_orderlist();" class="sc-btn sc-blue-btn"><i class="icon-download-alt"></i>导出订单</a>
                </div>
                <div class="clear"></div>
                <?php endif; ?>
                <form method="post" action="order.php?act=operate" name="listForm" onsubmit="return check()">
                <div class="table_list" id="listDiv">
                    <table class="ecsc-default-table order">
                        <thead>
                            <tr>
                            	<th class="w50 frist">编号</th>
                                <th class="w500 tl">商品信息</th>
                                <th class="w100"><a href="javascript:listTable.sort('consignee', 'DESC'); "><?php echo $this->_var['lang']['consignee']; ?></a><?php echo $this->_var['sort_consignee']; ?></th>
                                <th class="w100"><a href="javascript:listTable.sort('total_fee', 'DESC'); "><?php echo $this->_var['lang']['total_fee']; ?></a><?php echo $this->_var['sort_total_fee']; ?></th>
                                <th class="w100"><?php echo $this->_var['lang']['label_order_amount']; ?></th>
                                <th class="w100">交易状态</th>
                                <th class="w150">交易操作</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php $_from = $this->_var['order_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('okey', 'order');if (count($_from)):
    foreach ($_from AS $this->_var['okey'] => $this->_var['order']):
?>
                        	<tr><td colspan="8" class="sep-row">&nbsp;</td></tr>
                            <tr>
                                <th colspan="8">
                                	<div class="order-sku">
                                        <div class="item"><span><?php echo $this->_var['lang']['order_sn']; ?>：</span><a href="order.php?act=info&order_id=<?php echo $this->_var['order']['order_id']; ?>" id="order_<?php echo $this->_var['okey']; ?>"><?php echo $this->_var['order']['order_sn']; ?></a></div>
                                        <div class="item"><span><?php echo $this->_var['lang']['order_time']; ?>：</span><span><?php echo $this->_var['order']['short_order_time']; ?></span></div>
                                        <div class="item"><span><?php echo $this->_var['lang']['from_order']; ?></span>
                                            <span>
                                                <?php if ($this->_var['order']['referer'] == 'mobile'): ?>
                                                    APP
                                                <?php elseif ($this->_var['order']['referer'] == 'touch'): ?>
                                                    WAP
                                                <?php elseif ($this->_var['order']['referer'] == 'ecjia-cashdesk'): ?>    
                                                    收银台
                                                <?php else: ?>
                                                    PC
                                                <?php endif; ?>
                                            </span>
                                        </div>
                                        <div class="item"><a href="javascript:void();" onclick="window.open('order.php?act=info&order_id=<?php echo $this->_var['order']['order_id']; ?>&print=1')" class="sc-btn sc-org-btn" title="打印发货单"><i class="icon-print"></i>打印发货单</a></div>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                            	<td class="bdl frist trigger">
                                    <div class="checkbox-info">
                                        <input type="checkbox" class="ui-checkbox" value="<?php echo $this->_var['order']['order_sn']; ?>" id="checkbox_<?php echo $this->_var['order']['order_sn']; ?>" name="checkboxes[]"><label for="checkbox_<?php echo $this->_var['order']['order_sn']; ?>" class="ui-label"></label>
                                    </div>
                                    <div class="number"><?php echo $this->_var['order']['order_id']; ?></div>
                                </td>
                                <td class="bdl order-goods-list">
                                    <?php $_from = $this->_var['order']['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['goodsList'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['goodsList']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['goodsList']['iteration']++;
?>
                                        <div class="product_info <?php if (($this->_foreach['goodsList']['iteration'] == $this->_foreach['goodsList']['total'])): ?>last<?php endif; ?>">
                                            <div class="ecsc-goods-thumb" ><a href="../goods.php?id=<?php echo $this->_var['goods']['goods_id']; ?>" target="_blank"><img src="<?php echo $this->_var['goods']['goods_thumb']; ?>" onmouseover="toolTip('<img src=<?php echo $this->_var['goods']['goods_thumb']; ?>>')" onmouseout="toolTip()"></a></div>
                                            <div class="goods-info">
                                                <div class="goods-name"><a target="_blank" href="../goods.php?id=<?php echo $this->_var['goods']['goods_id']; ?>"><?php echo $this->_var['goods']['goods_name']; ?><?php if ($this->_var['goods']['trade_url']): ?><a href="<?php echo $this->_var['goods']['trade_url']; ?>" target="_blank"><span class="org">[<?php echo $this->_var['lang']['trade_snapshot']; ?>]</span></a><?php endif; ?></a></div>
                                                <div class="price">￥<?php echo $this->_var['goods']['goods_price']; ?></div>
                                                <div class="num">* <?php echo $this->_var['goods']['goods_number']; ?></div>
                                            </div>
                                        </div>
                                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                </td>
                                <td class="bdl" rowspan="1">
                                    <div class="buyer">
                                        <?php echo $this->_var['order']['consignee']; ?><p member_id="1"></p>
                                        <div class="buyer-info"><em></em>
                                            <div class="con">
                                                <h3><i></i><span>联系信息</span></h3>
                                                <dl>
                                                    <dt>姓名：</dt>
                                                    <dd><?php echo $this->_var['order']['consignee']; ?></dd>
                                                </dl>
                                                <dl>
                                                    <dt>电话：</dt>
                                                    <dd><?php echo $this->_var['order']['mobile']; ?></dd>
                                                </dl>
                                                <dl>
                                                    <dt>地址：</dt>
                                                    <dd><?php echo $this->_var['order']['region']; ?><?php echo $this->_var['order']['address']; ?></dd>
                                                </dl>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="bdl" rowspan="1">
                                    <!--<p class="ecsc-order-amount">应付金额：<?php echo $this->_var['order']['formated_order_amount']; ?></p>-->
                                    <p class="ecsc-order-amount"><?php echo $this->_var['order']['formated_total_fee']; ?></p>
                                    <p class="goods-pay"><?php echo $this->_var['order']['pay_name']; ?></p>
                                </td>
                                <td class="bdl" rowspan="1">
                                    <p class="ecsc-order-amount"><?php echo $this->_var['order']['formated_total_fee_order']; ?></p>
                                </td>
                                <td class="bdl bdr" rowspan="1">
                                    <p><span><?php echo $this->_var['lang']['os'][$this->_var['order']['order_status']]; ?><br><?php echo $this->_var['lang']['ps'][$this->_var['order']['pay_status']]; ?><br><?php echo $this->_var['lang']['ss'][$this->_var['order']['shipping_status']]; ?></span></p>
                                    <!-- 订单查看 -->
                                    <p></p>
                                    <!-- 物流跟踪 -->
                                    <p></p>
                                </td>
                                <!-- 取消订单 -->
                                <td class="bdl bdr" rowspan="1"><a href="order.php?act=info&order_id=<?php echo $this->_var['order']['order_id']; ?>">订单详情</a>
                                    <?php if ($this->_var['order']['can_remove'] && $this->_var['order_os_remove']): ?>
                                    <p><a href="javascript:;" onclick="listTable.remove(<?php echo $this->_var['order']['order_id']; ?>, remove_confirm, 'remove_order')" class="red"><?php echo $this->_var['lang']['remove']; ?></a></p>
                                    <?php endif; ?>
                                    <?php if ($this->_var['order']['is_delete'] == 1): ?>
                                    <p><font class="red" title="<?php echo $this->_var['lang']['notice_trash_order']; ?>"><?php echo $this->_var['lang']['order_not_operable']; ?></font></p>
                                    <?php endif; ?>
                               </td>
                            </tr>
                            <?php if ($this->_var['order']['chargeoff_status'] == 1 || $this->_var['order']['chargeoff_status'] == 2): ?>
                            <tr>
                                <th colspan="8">
                                	<div class="order-sku">
                                        <div class="item fl">
                                            <?php if ($this->_var['order']['chargeoff_status'] == 1): ?>
                                            <br/>
                                            <em class="red">【已出佣金账单：<?php echo $this->_var['order']['bill_sn']; ?>】</em>
                                            <?php else: ?>
                                            <em class="red">【已结佣金账单：<?php echo $this->_var['order']['bill_sn']; ?>】</em>
                                            <?php endif; ?>
                                            <a href="merchants_commission.php?act=bill_detail&bill_id=<?php echo $this->_var['order']['bill_id']; ?>&seller_id=<?php echo $this->_var['order']['seller_id']; ?>&proportion=<?php echo $this->_var['order']['proportion']; ?>&commission_model=<?php echo $this->_var['order']['commission_model']; ?>" target="_blank">【查看账单】</a>
                                        </div>
                                    </div>
                                </th>
                            </tr>
                            <?php endif; ?>
							<?php endforeach; else: ?>
							<tr><td class="no-records" colspan="11"><?php echo $this->_var['lang']['no_records']; ?></td></tr>
                        	<?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
                        </tbody>
                        <tfoot>
                        	<tr><td colspan="8"></td></tr>
                            <tr class="head">
                                <td class="frist tc"><input type="checkbox" id="all" class="ui-checkbox" name="checkboxes[]" value='' onclick='listTable.selectAll(this, "checkboxes")'><label for="all" class="ui-label"></label></td>
                                <td class="batch-operation" colspan="20">
                                    <input name="confirm" type="submit" id="btnSubmit" value="<?php echo $this->_var['lang']['op_confirm']; ?>" class="sc-btn btn_disabled" disabled="true" onclick="this.form.target = '_self'" />
                                    <input name="invalid" type="submit" id="btnSubmit1" value="<?php echo $this->_var['lang']['op_invalid']; ?>" class="sc-btn btn_disabled" disabled="true" onclick="this.form.target = '_self'" />
                                    <input name="cancel" type="submit" id="btnSubmit2" value="<?php echo $this->_var['lang']['op_cancel']; ?>" class="sc-btn btn_disabled" disabled="true" onclick="this.form.target = '_self'" />
                                    <?php if ($this->_var['order_os_remove']): ?>
                                    <input name="remove" type="submit" id="btnSubmit3" value="<?php echo $this->_var['lang']['remove']; ?>" class="sc-btn btn_disabled" disabled="true" onclick="this.form.target = '_self'" />
                                    <?php endif; ?>
                                    <input name="print" type="submit" id="btnSubmit4" value="<?php echo $this->_var['lang']['print_order']; ?>" class="sc-btn btn_disabled" disabled="true" onclick="this.form.target = '_blank'" />
                                    <input type="button" id="btnSubmit5" value="<?php echo $this->_var['lang']['print_shipping']; ?>" class="sc-btn btn_disabled" disabled="true" print-data="print_shipping" />
                                    <input name="batch" type="hidden" value="1" />
                                    <input name="order_id" type="hidden" value="" />
                                    <span><?php if ($this->_var['record_count']): ?>共<?php echo $this->_var['record_count']; ?>条记录<?php endif; ?></span> 
                                    <span class="page page_3">
                                    	<i>每页</i> <input type='text' size='3' id='pageSize' style=" border:1px solid #e5e5e5; background:#FFF; text-align:center; padding:3px; border-radius:4px;" value="<?php echo $this->_var['filter']['page_size']; ?>" onkeypress="return listTable.changePageSize(event)" />
                                    </span>
                                </td>
                            </tr>
                            <tr>
                            	<td colspan="8"><?php echo $this->fetch('page.dwt'); ?></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                </form>
                <?php if ($this->_var['full_page']): ?>
            </div>
        </div>
    </div>
</div>
<?php echo $this->fetch('library/seller_footer.lbi'); ?>
<?php echo $this->smarty_insert_scripts(array('files'=>'ToolTip.js,jquery.purebox.js')); ?>
<?php echo $this->smarty_insert_scripts(array('files'=>'../js/utils.js')); ?>
<script type="text/javascript">
	listTable.recordCount = <?php echo $this->_var['record_count']; ?>;
	listTable.pageCount = <?php echo $this->_var['page_count']; ?>;
	
	<?php $_from = $this->_var['filter']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
	listTable.filter.<?php echo $this->_var['key']; ?> = '<?php echo $this->_var['item']; ?>';
	<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

	
    /**
     * 搜索订单
     */
    function searchOrder()
    {
		listTable.filter['keywords'] = Utils.trim(document.forms['searchForm'].elements['keywords'].value);
        listTable.filter['order_sn'] = Utils.trim(document.forms['searchForm'].elements['order_sn'].value);
        listTable.filter['consignee'] = Utils.trim(document.forms['searchForm'].elements['consignee'].value);
        listTable.filter['composite_status'] = document.forms['searchForm'].elements['status'].value;
        listTable.filter['page'] = 1;
        listTable.loadList();
    }

    function check()
    {
      var snArray = new Array();
      var eles = document.forms['listForm'].elements;
      for (var i=0; i<eles.length; i++)
      {
        if (eles[i].tagName == 'INPUT' && eles[i].type == 'checkbox' && eles[i].checked && eles[i].value != 'on')
        {
          snArray.push(eles[i].value);
        }
      }
	  
      if (snArray.length == 0)
      {
        return false;
      }
      else
      {
        //eles['order_id'].value = snArray.toString();
		$("input[name='order_id']").val(snArray.toString());
        return true;
      }
    }

	//导出订单列表
	function download_orderlist()
	{
		var args = '';
		for (var i in listTable.filter)
		{
			if (typeof(listTable.filter[i]) != "function" && typeof(listTable.filter[i]) != "undefined")
			{
			  args += "&" + i + "=" + encodeURIComponent(listTable.filter[i]);
			}
		}
		location.href = "order.php?act=order_export" + args;
	}
	
	//列表批量处理
	/*$(document).on("click",".batch-operation a.sc-btn",function(){
		var _this = $(this),
			table = _this.parents(".ecsc-default-table"),
			checked = table.find("input[name='checkboxes[]']").is(":checked"),
			type = _this.data("type");
		if(checked){
			$("form[name='listForm']").submit();
		}else{
			alert("请勾选商品");
		}
	});*/
	
	$(document).on("click", "a[ectype='merge_order']", function () {
		Ajax.call('order.php', 'act=merge', function(data){
			var content = data.content;
			pb({
				id:"merge_order",
				title:"合并订单",
				width:680,
				content:content,
				ok_title:"合并",
				cl_title:"取消",
				drag:false,
				foot:true,
				cl_cBtn:true,
				onOk:function(){
					if (confirm('您确定合并这两个订单么？ ')) {
						var fromOrderSn = document.getElementById('from_order_sn').value;
						var toOrderSn = document.getElementById('to_order_sn').value;
						Ajax.call('order.php?is_ajax=1&act=ajax_merge_order','from_order_sn=o' + fromOrderSn + '&to_order_sn=o' + toOrderSn, merge_orderResponse, 'POST', 'JSON');
					}
				}
			});
		}, 'POST', 'JSON');
	})
	function merge_orderResponse(result)
	{
		if (result.message.length > 0)
		{
			alert(result.message);
		}
	}
        $(document).on('click',"*[print-data='print_shipping']",function(){
            var frm = $("form[name='listForm']");
            var checkboxes = [];
            frm.find("input[name='checkboxes[]']:checkbox:checked").each(function(){
                var val = $(this).val();
                if(val){
                    checkboxes.push(val);
                }
            });
            if(checkboxes){
                window.open("print_batch.php?act=print_batch&checkboxes="+checkboxes);
            }
        })
</script>
</body>
</html>
<?php endif; ?>
