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
                        <form action="javascript:searchSnatch()" name="searchForm">
                        	<div id="status" class="imitate_select select_w145">
                                <div class="cite"><?php echo $this->_var['lang']['adopt_status']; ?></div>
                                <ul>
                                    <li><a href="javascript:;" data-value="0" class="ftx-01"><?php echo $this->_var['lang']['adopt_status']; ?></a></li>
                                    <li><a href="javascript:;" data-value="1" class="ftx-01"><?php echo $this->_var['lang']['not_audited']; ?></a></li>
                                    <li><a href="javascript:;" data-value="2" class="ftx-01"><?php echo $this->_var['lang']['audited_not_adopt']; ?></a></li>
                                    <li><a href="javascript:;" data-value="3" class="ftx-01"><?php echo $this->_var['lang']['audited_yes_adopt']; ?></a></li>
                                </ul>
                                <input name="review_status" type="hidden" value="0"/>
                            </div>
                            <div class="search-key">
                            	<input type="text" name="keyword" class="text text_2" placeholder="<?php echo $this->_var['lang']['snatch_name']; ?>" />
                                <input type="submit" value="<?php echo $this->_var['lang']['button_search']; ?>" class="submit" />
                            </div>
                        </form>
                    </div>
                </div>
                <div class="list-div" id="listDiv">
                <?php endif; ?>
                    <table class="ecsc-default-table">
                        <thead>
                            <tr>
                                <th width="8%">编号</th>
                                <th width="20%" class="tl">活动名称</th>
                                <th width="15%">活动起始时间</th>
                                <th width="10%">价格下限</th>
                                <th width="10%">消耗积分</th>
                                <th width="10%">是否热销</th>
                                <th width="10%"><?php echo $this->_var['lang']['adopt_status']; ?></th>
                                <th width="17%">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $_from = $this->_var['snatch_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'snatch');if (count($_from)):
    foreach ($_from AS $this->_var['snatch']):
?>
                        <tr class="bd-line">
                            <td>
                                <label><?php echo $this->_var['snatch']['act_id']; ?></label>
                            </td>
                            <td class="tl"><span class="activity_name" title="<?php echo $this->_var['snatch']['snatch_name']; ?>"><?php echo $this->_var['snatch']['snatch_name']; ?></span></td>
                            <td><?php echo $this->_var['snatch']['start_time']; ?><br /><?php echo $this->_var['snatch']['end_time']; ?></td>
                            <td><?php echo $this->_var['snatch']['start_price']; ?></td>
                            <td><?php echo $this->_var['snatch']['cost_points']; ?></td>
                            <td>
								<div class="switch<?php if ($this->_var['snatch']['is_hot']): ?> active<?php endif; ?> ml30" title="<?php if ($this->_var['snatch']['is_hot']): ?>是<?php else: ?>否<?php endif; ?>" onclick="listTable.switchBt(this, 'toggle_hot', <?php echo $this->_var['snatch']['act_id']; ?>)">
									<div class="circle"></div>
								</div>
								<input type="hidden" value="0" name="">
							</td>
                            <td class="audit_status">
                                <?php if ($this->_var['snatch']['review_status'] == 1): ?>
                                <font class="org2"><?php echo $this->_var['lang']['not_audited']; ?></font>
                                <?php elseif ($this->_var['snatch']['review_status'] == 2): ?>
                                <font class="red"><?php echo $this->_var['lang']['audited_not_adopt']; ?></font>
                                <i class="tip yellow" title="<?php echo $this->_var['snatch']['review_content']; ?>"><?php echo $this->_var['lang']['prompt']; ?></i>
                                <?php elseif ($this->_var['snatch']['review_status'] == 3): ?>
                                <font class="green"><?php echo $this->_var['lang']['audited_yes_adopt']; ?></font>
                                <?php endif; ?>
                            </td>
							<td class="ecsc-table-handle tr">
                                <span><a href="snatch.php?act=view&amp;snatch_id=<?php echo $this->_var['snatch']['act_id']; ?>" class="btn-orange"><i class="icon sc_icon_see"></i><p>查看</p></a></span>
                                <span><a href="snatch.php?act=edit&amp;id=<?php echo $this->_var['snatch']['act_id']; ?>" class="btn-green"><i class="icon icon-edit"></i><p>编辑</p></a></span>
                                <span><a href="javascript:;" onclick="listTable.remove(<?php echo $this->_var['snatch']['act_id']; ?>,'<?php echo $this->_var['lang']['drop_confirm']; ?>')" title="<?php echo $this->_var['lang']['remove']; ?>" ectype="btn_del_xianshi" data-xianshi-id="8" class="btn-red"><i class="icon icon-trash"></i><p><?php echo $this->_var['lang']['drop']; ?></p></a></span>
                            </td>
                        </tr>
                        <?php endforeach; else: ?>
                        <tr><td class="no-records" colspan="11"><?php echo $this->_var['lang']['no_records']; ?></td></tr>
                        <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="21">
                                <?php echo $this->fetch('page.dwt'); ?>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                    <?php if ($this->_var['full_page']): ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $this->fetch('library/seller_footer.lbi'); ?>
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
    <?php endif; ?>

  /**
   * 搜索夺宝奇兵
   */
  function searchSnatch()
  {
	<?php if ($this->_var['priv_ru'] == 1): ?>
		listTable.filter['store_search'] = Utils.trim(document.forms['searchForm'].elements['store_search'].value);
		listTable.filter['merchant_id'] = Utils.trim(document.forms['searchForm'].elements['merchant_id'].value);
		listTable.filter['store_keyword'] = Utils.trim(document.forms['searchForm'].elements['store_keyword'].value);
		listTable.filter['store_type'] = Utils.trim(document.forms['searchForm'].elements['store_type'].value);
	<?php endif; ?>
        
    var keyword = Utils.trim(document.forms['searchForm'].elements['keyword'].value);
	
	listTable.filter['review_status'] = Utils.trim(document.forms['searchForm'].elements['review_status'].value);
    listTable.filter.keywords = keyword;
    listTable.filter.page = 1;
    listTable.loadList();
  }
  
//-->
</script>
</body>
</html>
<?php endif; ?>
