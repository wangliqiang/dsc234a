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
                <?php endif; ?>
                <div class="list-div" id="listDiv">
                	<table class="ecsc-default-table mt20">
                    	<thead>
                        <tr>
                            <th width="32%" class="tl pl10"><?php echo $this->_var['lang']['item_name']; ?></th>
                            <th width="14%"><?php echo $this->_var['lang']['item_ifshow']; ?></th>
                            <th width="14%"><?php echo $this->_var['lang']['item_opennew']; ?></th>
                            <th width="14%"><?php echo $this->_var['lang']['item_vieworder']; ?></th>
                            <th width="14%"><?php echo $this->_var['lang']['item_type']; ?></th>
                            <th width="12%"><?php echo $this->_var['lang']['handler']; ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $_from = $this->_var['navdb']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'val');if (count($_from)):
    foreach ($_from AS $this->_var['val']):
?>
                        <tr>
                          <td class="tl pl10"><!-- <?php if ($this->_var['val']['id']): ?> --><?php echo $this->_var['val']['name']; ?><!-- <?php else: ?> -->&nbsp;<!-- <?php endif; ?> --></td>
                          <td align="center">
                           <!-- <?php if ($this->_var['val']['id']): ?> -->
                           <div class="switch <?php if ($this->_var['val']['ifshow']): ?>active<?php endif; ?>" title="<?php if ($this->_var['val']['ifshow']): ?>是<?php else: ?>否<?php endif; ?>" onclick="listTable.switchBt(this, 'toggle_ifshow', <?php echo $this->_var['val']['id']; ?>)">
								<div class="circle"></div>
							</div>
							<input type="hidden" value="0" name="">
                           <!-- <?php endif; ?> --></td>
                          <td align="center">
                           <!-- <?php if ($this->_var['val']['id']): ?> -->
                            <div class="switch <?php if ($this->_var['val']['opennew']): ?>active<?php endif; ?>" title="<?php if ($this->_var['val']['opennew']): ?>是<?php else: ?>否<?php endif; ?>" onclick="listTable.switchBt(this, 'toggle_opennew', <?php echo $this->_var['val']['id']; ?>)">
								<div class="circle"></div>
							</div>
							<input type="hidden" value="0" name="">
                           <!-- <?php endif; ?> --></td>
                          <td align="center"><!-- <?php if ($this->_var['val']['id']): ?> --><span onClick="listTable.edit(this, 'edit_sort_order', <?php echo $this->_var['val']['id']; ?>)"><?php echo $this->_var['val']['vieworder']; ?></span><!-- <?php endif; ?> --></td>
                          <td align="center"><!-- <?php if ($this->_var['val']['id']): ?> --><?php echo $this->_var['lang'][$this->_var['val']['type']]; ?><!-- <?php endif; ?> --></td>
                          <td class="ecsc-table-handle tr">
                          <!-- <?php if ($this->_var['val']['id']): ?> -->
                          <span><a href="merchants_navigator.php?act=edit&id=<?php echo $this->_var['val']['id']; ?>" title="<?php echo $this->_var['lang']['edit']; ?>" class="btn-green"><i class="icon icon-edit"></i><p><?php echo $this->_var['lang']['edit']; ?></p></a></span>
                          <span><a href="merchants_navigator.php?act=del&id=<?php echo $this->_var['val']['id']; ?>" onClick="return confirm('<?php echo $this->_var['lang']['ckdel']; ?>');" title="<?php echo $this->_var['lang']['drop']; ?>" class="btn-red"><i class="icon icon-trash"></i><p><?php echo $this->_var['lang']['drop']; ?></p></a></span>
                          <!-- <?php endif; ?> -->
                          </td>
                        </tr>
                        <?php endforeach; else: ?>
                        <tr><td class="no-records" colspan="10"><?php echo $this->_var['lang']['no_records']; ?></td></tr>
                        <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="20">
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
</body>
</html>
<?php endif; ?>
