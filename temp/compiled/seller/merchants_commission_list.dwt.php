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
                
                <div class="explanation clear mb20" id="explanation">
                    <div class="ex_tit"><i class="sc_icon"></i><h4>温馨提示</h4></div>
                    <ul>
                    	<li>商城所有店铺结算订单相关信息管理。</li>
                    	<li>【订单】：表示是按店铺佣金比例或者分类佣金比例</li>
                    	<li>【商品】：表示是商品单独设置佣金比例</li>
                    </ul>
                </div>
                
                <form method="post" action="" name="listForm" onsubmit="return confirm(batch_drop_confirm);">
                <div class="list-div" id="listDiv">
                <?php endif; ?>
                  <table class="ecsc-default-table mt20">	
                    <thead>
                    <tr>
                      <th width="6%">
                        <div class="first_all">
                            <input onclick='listTable.selectAll(this, "checkboxes")' type="checkbox" id="all" class="ui-checkbox" /><label class="ui-label" for="all"><?php echo $this->_var['lang']['record_id']; ?></label>
                        </div>
                      </th>
                      <th width="6%"><?php echo $this->_var['lang']['suppliers_name']; ?></th>
                      <th width="18%"><?php echo $this->_var['lang']['suppliers_company']; ?></th>
                      <th width="20%" class="tl"><?php echo $this->_var['lang']['suppliers_address']; ?></th>
                      <th width="12%"><?php echo $this->_var['lang']['order_valid_total']; ?></th>
                      <th width="8%"><?php echo $this->_var['lang']['order_refund_total']; ?></th>
                      <th width="9%"><?php echo $this->_var['lang']['is_settlement_amount']; ?></th>
                      <th width="9%"><?php echo $this->_var['lang']['no_settlement_amount']; ?></th>
                      <th width="8%"><?php echo $this->_var['lang']['handler']; ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $_from = $this->_var['merchants_commission_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'commission');if (count($_from)):
    foreach ($_from AS $this->_var['commission']):
?>
                    <tr>
                      <td class="first_td_checkbox">
                        <div class="first_all">
                            <input type="checkbox" name="checkboxes[]" value="<?php echo $this->_var['commission']['server_id']; ?>" id="checkbox_<?php echo $this->_var['commission']['server_id']; ?>" class="ui-checkbox" /><label class="ui-label" for="checkbox_<?php echo $this->_var['commission']['server_id']; ?>"><?php echo $this->_var['commission']['server_id']; ?></label>
                        </div>
                      </td>
                      <td class="first-cell"><?php echo $this->_var['commission']['user_name']; ?></td>
                      <td><?php echo $this->_var['commission']['companyName']; ?></td>  
                      <td class="tl"><?php echo $this->_var['commission']['company_adress']; ?><br /><?php echo $this->_var['lang']['suppliers_contact']; ?>：<?php echo empty($this->_var['commission']['company_contactTel']) ? $this->_var['lang']['n_a'] : $this->_var['commission']['company_contactTel']; ?></td>
                      <td style="color:#C00">
                      	<?php if ($this->_var['commission']['is_goods_rate']): ?>
                            <p> + <?php echo $this->_var['commission']['order_total_fee']; ?>【订单】</p>
                            <p> + <?php echo $this->_var['commission']['goods_total_fee']; ?>【商品】</p>
                            <p>=<?php echo $this->_var['commission']['order_valid_total']; ?></p>
                        <?php else: ?>
                            <?php echo $this->_var['commission']['order_valid_total']; ?>
                        <?php endif; ?>
                      </td>
                      <td style="color:#1b9ad5"><?php echo $this->_var['commission']['order_refund_total']; ?></td>
                      <td style="color:#179f27" >
                      	<p><?php echo $this->_var['commission']['is_settlement']; ?></p>
                        <?php if ($this->_var['commission']['is_goods_rate'] && $this->_var['commission']['is_settlement_price'] != 0): ?>
                            <p><em class="red">（含【商品】）</em></p>
                       	<?php endif; ?>
                      </td>
                      <td style="color:#F00" >
                      	<p><?php echo $this->_var['commission']['no_settlement']; ?></p>
                        <?php if ($this->_var['commission']['is_goods_rate'] && $this->_var['commission']['no_settlement_price'] != 0): ?>
                            <p><em class="red">（含【商品】）</em></p>
                        <?php endif; ?>
                      </td>
                      <td>
                        <a href="merchants_commission.php?act=order_list&id=<?php echo $this->_var['commission']['user_id']; ?>" class="blue"><?php echo $this->_var['lang']['02_order_list']; ?></a><br />
                        <?php if ($this->_var['no_all']): ?>
                        <a href="merchants_commission.php?act=edit&id=<?php echo $this->_var['commission']['server_id']; ?>" title="<?php echo $this->_var['lang']['edit']; ?>" class="blue"><?php echo $this->_var['lang']['edit']; ?></a><br />
                        <a href="javascript:void(0);" onclick="listTable.remove(<?php echo $this->_var['commission']['server_id']; ?>, '<?php echo $this->_var['lang']['drop_confirm']; ?>')" title="<?php echo $this->_var['lang']['remove']; ?>" class="blue"><?php echo $this->_var['lang']['remove']; ?></a>
                        <?php else: ?><span class="red"><?php echo $this->_var['lang']['not_handler']; ?></span><?php endif; ?>      
                      </td>
                    </tr>
                    <?php endforeach; else: ?>
                    <tr><td class="no-records" colspan="11"><?php echo $this->_var['lang']['no_records']; ?></td></tr>
                    <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    </tbody>
                    <tfoot><tr><td colspan="11" class="tc"><?php echo $this->fetch('page.dwt'); ?></td></tr></tfoot>
                  </table>
                <?php if ($this->_var['full_page']): ?>
                </div>
                </form>					
                <!--end-->
                
            </div>
        </div>
    </div>
</div>
<?php echo $this->fetch('library/seller_footer.lbi'); ?>
<!--start-->
<script type="text/javascript">
  <!--
  listTable.recordCount = <?php echo $this->_var['record_count']; ?>;
  listTable.pageCount = <?php echo $this->_var['page_count']; ?>;

  <?php $_from = $this->_var['filter']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
  listTable.filter.<?php echo $this->_var['key']; ?> = '<?php echo $this->_var['item']; ?>';
  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

  
  onload = function()
  {
      // 开始检查订单
      startCheckOrder();
  }
  
  	<?php if ($this->_var['priv_ru'] == 1): ?>
	function get_store_search(val){
		if(val == 1){
			document.forms['searchForm'].elements['merchant_id'].style.display = '';
			document.forms['searchForm'].elements['store_keyword'].style.display = 'none';
			document.forms['searchForm'].elements['store_type'].style.display = 'none';
		}else if(val == 2){
			document.forms['searchForm'].elements['merchant_id'].style.display = 'none';
			document.forms['searchForm'].elements['store_keyword'].style.display = '';
			document.forms['searchForm'].elements['store_type'].style.display = 'none';
		}else if(val == 3){
			document.forms['searchForm'].elements['merchant_id'].style.display = 'none';
			document.forms['searchForm'].elements['store_keyword'].style.display = '';
			document.forms['searchForm'].elements['store_type'].style.display = '';
		}else{
			document.forms['searchForm'].elements['merchant_id'].style.display = 'none';
			document.forms['searchForm'].elements['store_keyword'].style.display = 'none';
			document.forms['searchForm'].elements['store_type'].style.display = 'none';
		}
	}
	
	/**
     * 搜索店铺
     */
    function searchStore()
    {
		
		listTable.filter['store_search'] = Utils.trim(document.forms['searchForm'].elements['store_search'].value);
		listTable.filter['merchant_id'] = Utils.trim(document.forms['searchForm'].elements['merchant_id'].value);
		listTable.filter['store_keyword'] = Utils.trim(document.forms['searchForm'].elements['store_keyword'].value);
		listTable.filter['store_type'] = Utils.trim(document.forms['searchForm'].elements['store_type'].value);
	
        listTable.filter['page'] = 1;
        listTable.loadList();
    }
	<?php endif; ?>	
	
	//导出商家佣金列表
	function download_list()
	{
	  var args = '';
	  for (var i in listTable.filter)
	  {
		if (typeof(listTable.filter[i]) != "function" && typeof(listTable.filter[i]) != "undefined")
		{
		  args += "&" + i + "=" + encodeURIComponent(listTable.filter[i]);
		}
	  }
	  
	  location.href = "merchants_commission.php?act=commission_download" + args;
	}

  
  //-->
</script>
<!--end-->
</body>
</html>
<?php endif; ?>