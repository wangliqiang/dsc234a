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
                <!-- 订单搜索 -->
                <div class="search-info">
                	<div class="search-form">
                        <form action="javascript:searchList()" name="searchForm">
                        	<div class="search-key">
                                <input name="keywords" type="text" id="keywords" size="15" class="text text_2" placeholder="用户名称">
                                <input type="submit" value="<?php echo $this->_var['lang']['button_search']; ?>" class="submit" />
                        	</div>
                        </form>
                	</div>
                </div>
                <?php endif; ?>
                <!--  管理员列表  -->
                <div class="list-div" id="listDiv">
                    <table class="ecsc-default-table mt20">
                    	<thead>
                            <tr>
                                <th width="15%"><?php echo $this->_var['lang']['user_name']; ?></th>
                                <th width="18%"><?php echo $this->_var['lang']['goods_steps_name']; ?></th>
                                <th width="18%"><?php echo $this->_var['lang']['email']; ?></th>
                                <th width="15%"><?php echo $this->_var['lang']['join_time']; ?></th>
                                <th width="15%"><?php echo $this->_var['lang']['last_time']; ?></th>
                                <th width="18%"><?php echo $this->_var['lang']['handler']; ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $_from = $this->_var['admin_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'list');if (count($_from)):
    foreach ($_from AS $this->_var['list']):
?>
                            <tr class="bd-line">
                                <td class="first-cell" ><?php echo $this->_var['list']['user_name']; ?></td>
                                <td align="center"><?php if ($this->_var['list']['ru_name']): ?><font class="red"><?php echo $this->_var['list']['ru_name']; ?></font><?php else: ?><font class="blue3">商城管理员</font><?php endif; ?></td>
                                <td align="center"><?php echo $this->_var['list']['email']; ?></td>
                                <td align="center"><?php echo $this->_var['list']['add_time']; ?></td>
                                <td align="center"><?php echo empty($this->_var['list']['last_login']) ? 'N/A' : $this->_var['list']['last_login']; ?></td>
                                <td align="center" class="ecsc-table-handle tr">
                                    <span><a href="privilege_seller.php?act=allot&id=<?php echo $this->_var['list']['user_id']; ?>&user=<?php echo $this->_var['list']['user_name']; ?>" title="<?php echo $this->_var['lang']['allot_priv']; ?>" class="btn-blue"><i class="icon icon-cog"></i><p><?php echo $this->_var['lang']['allot_priv']; ?></p></a></span>
                                    <span><a href="privilege_seller.php?act=edit&id=<?php echo $this->_var['list']['user_id']; ?>" title="<?php echo $this->_var['lang']['edit']; ?>" class="btn-green"><i class="icon icon-edit"></i><p><?php echo $this->_var['lang']['edit']; ?></p></a></span>
                                    <span><a href="javascript:;" onclick="listTable.remove(<?php echo $this->_var['list']['user_id']; ?>, '<?php echo $this->_var['lang']['drop_confirm']; ?>')" title="<?php echo $this->_var['lang']['drop']; ?>" class="btn-red"><i class="icon icon-trash"></i><p><?php echo $this->_var['lang']['drop']; ?></p></a></span>
                                </td>
                            </tr>
                            <?php endforeach; else: ?>
                            <tr><td class="no-records" colspan="11"><?php echo $this->_var['lang']['no_records']; ?></td></tr>
                            <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="20"><?php echo $this->fetch('page.dwt'); ?></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <?php if ($this->_var['full_page']): ?>
        	</div>
    	</div>
	</div>
</div>
<?php echo $this->fetch('library/seller_footer.lbi'); ?>
<script>
  function searchList()
  {
    listTable.filter['keywords'] = Utils.trim(document.forms['searchForm'].elements['keywords'].value);
    listTable.filter['page'] = 1;
    listTable.loadList();
  }
</script>
</body>
</html>
<?php endif; ?>
