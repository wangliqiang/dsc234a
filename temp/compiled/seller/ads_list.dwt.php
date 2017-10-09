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
                <form method="post" action="" name="listForm">
                <!-- start ad position list -->
                <div class="list-div" id="listDiv">
				<?php endif; ?>
                    <table cellpadding="1" cellspacing="1" class="ecsc-default-table mt20">
                        <thead>
                        <tr>
                            <th width="5%"><a href="javascript:listTable.sort('ad_id'); "><?php echo $this->_var['lang']['record_id']; ?></a><?php echo $this->_var['sort_ad_id']; ?></th>
                            <th width="15%"><a href="javascript:listTable.sort('ad_name'); "><?php echo $this->_var['lang']['ad_name']; ?></a><?php echo $this->_var['sort_ad_name']; ?></th>
                            <th width="15%"><a href="javascript:listTable.sort('position_id'); "><?php echo $this->_var['lang']['position_id']; ?></a><?php echo $this->_var['sort_position_id']; ?></th>
                            <th width="15%"><a href="javascript:listTable.sort('media_type'); "><?php echo $this->_var['lang']['media_type']; ?></a><?php echo $this->_var['sort_media_type']; ?></th>
                            <th width="10%"><a href="javascript:listTable.sort('start_date'); "><?php echo $this->_var['lang']['start_date']; ?></a><?php echo $this->_var['sort_start_date']; ?></th>
                            <th width="10%"><a href="javascript:listTable.sort('end_date'); "><?php echo $this->_var['lang']['end_date']; ?></a><?php echo $this->_var['sort_end_date']; ?></th>
                            <th width="6%"><a href="javascript:listTable.sort('click_count'); "><?php echo $this->_var['lang']['click_count']; ?></a><?php echo $this->_var['sort_click_count']; ?></th>
                            <th width="6%"><?php echo $this->_var['lang']['ads_stats']; ?></th>
                            <th width="10%"><?php echo $this->_var['lang']['handler']; ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $_from = $this->_var['ads_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'list');if (count($_from)):
    foreach ($_from AS $this->_var['list']):
?>
                        <tr>
                            <td align="center"><?php echo $this->_var['list']['ad_id']; ?></td>
                            <td class="first-cell">
                            	<span onclick="javascript:listTable.edit(this, 'edit_ad_name', <?php echo $this->_var['list']['ad_id']; ?>)"><?php echo htmlspecialchars($this->_var['list']['ad_name']); ?></span>
                            </td>
                            <td align="left"><?php if ($this->_var['list']['position_id'] == 0): ?><?php echo $this->_var['lang']['outside_posit']; ?><?php else: ?><?php echo $this->_var['list']['position_name']; ?><?php endif; ?>
                            </td>
                            <td valign="middle">
                                <div class="tDiv">
                                            <?php if (( $this->_var['list']['type'] == $this->_var['lang']['imgage'] )): ?>
                                            <span class="show">
                                                <a href="<?php if (strpos ( $this->_var['list']['ad_code'] , 'www' )): ?><?php echo $this->_var['list']['ad_code']; ?><?php else: ?>../data/afficheimg/<?php echo $this->_var['list']['ad_code']; ?><?php endif; ?>" class="nyroModal" target="_blank"><i class="icon icon-picture" onmouseover="toolTip('<img src=<?php if (strpos ( $this->_var['list']['ad_code'] , 'www' )): ?><?php echo $this->_var['list']['ad_code']; ?><?php else: ?>../data/afficheimg/<?php echo $this->_var['list']['ad_code']; ?><?php endif; ?>>')" onmouseout="toolTip()"></i></a>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                            </td>
                            <td align="center"><?php echo $this->_var['list']['start_date']; ?></td>
                            <td align="center"><?php echo $this->_var['list']['end_date']; ?></td>
                            <td align="center"><?php echo $this->_var['list']['click_count']; ?></td>
                            <td align="center"><?php echo $this->_var['list']['ad_stats']; ?></td>
                            <td class="ecsc-table-handle tr">
                              <?php if ($this->_var['list']['position_id'] == 0): ?>
                              <span><a href="ads.php?act=add_js&type=<?php echo $this->_var['list']['media_type']; ?>&id=<?php echo $this->_var['list']['ad_id']; ?>" title="<?php echo $this->_var['lang']['view']; ?>" class="btn-orange"><i class="icon sc_icon_see"></i><p><?php echo $this->_var['lang']['view']; ?></p></a></span>
                              <?php endif; ?>
                              <span><a href="ads.php?act=edit&id=<?php echo $this->_var['list']['ad_id']; ?>" title="<?php echo $this->_var['lang']['edit']; ?>" title="<?php echo $this->_var['lang']['edit']; ?>" class="btn-green"><i class="icon icon-edit"></i><p><?php echo $this->_var['lang']['edit']; ?></p></a></span>
                              <span><a href="javascript:;" onclick="listTable.remove(<?php echo $this->_var['list']['ad_id']; ?>, '<?php echo $this->_var['lang']['drop_confirm']; ?>')" title="<?php echo $this->_var['lang']['drop']; ?>" class="btn-red"><i class="icon icon-trash"></i><p><?php echo $this->_var['lang']['drop']; ?></p></a></span>
                            </td>
                        </tr>
                        <?php endforeach; else: ?>
                        <tr><td class="no-records" colspan="10"><?php echo $this->_var['lang']['no_ads']; ?></td></tr>
                        <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
                        </tbody>
                        <tfoot>
                        	<tr><td colspan="10"><?php echo $this->fetch('page.dwt'); ?></td></tr>
                        </tfoot>
                    </table>
                    <table cellpadding="1" cellspacing="1" class="table_page">
                      <tr>
                        <td align="right" nowrap="true" colspan="10"></td>
                      </tr>
                    </table>
				<?php if ($this->_var['full_page']): ?>
                </div>
				<!-- end ad_position list -->
				</form>
            </div>
        </div>
    </div>
</div>
<?php echo $this->fetch('library/seller_footer.lbi'); ?>
<?php if ($this->_var['full_page']): ?>
<script type="text/javascript" src="js/jquery.picTip.js"></script>
<script type="text/javascript">
  listTable.recordCount = <?php echo $this->_var['record_count']; ?>;
  listTable.pageCount = <?php echo $this->_var['page_count']; ?>;

  <?php $_from = $this->_var['filter']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
  listTable.filter.<?php echo $this->_var['key']; ?> = '<?php echo $this->_var['item']; ?>';
  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
  
  onload = function()
  {
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
  
  function searchAd_position()
    {
		<?php if ($this->_var['priv_ru'] == 1): ?>
		listTable.filter['store_search'] = Utils.trim(document.forms['searchForm'].elements['store_search'].value);
		listTable.filter['merchant_id'] = Utils.trim(document.forms['searchForm'].elements['merchant_id'].value);
		listTable.filter['store_keyword'] = Utils.trim(document.forms['searchForm'].elements['store_keyword'].value);
		listTable.filter['store_type'] = Utils.trim(document.forms['searchForm'].elements['store_type'].value);
		<?php endif; ?>
		
        listTable.filter['keyword'] = Utils.trim(document.forms['searchForm'].elements['keyword'].value);
        listTable.filter['page'] = 1;

        listTable.loadList();
    }
  
</script>
<?php endif; ?>
</body>
</html>
<?php endif; ?>
