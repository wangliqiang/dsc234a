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
                <div class="list-div" id="listDiv">
                <table class="ecsc-default-table mt20">
                	<thead>
                    <tr>
                        <th width="8%">
                        	<div class="first_all">
                                <input onclick='listTable.selectAll(this, "checkboxes[]")' id="all" type="checkbox" class="ui-checkbox"/>
                                <label for="all" class="ui-label"><?php echo $this->_var['lang']['record_id']; ?></label>
                            </div>
                        </th>
                        <th width="17%"><?php echo $this->_var['lang']['window_name']; ?></th>
                        <th width="15%"><?php echo $this->_var['lang']['03_template_setup']; ?></th>
                        <th width="15%"><?php echo $this->_var['lang']['window_type']; ?></th>
                        <th width="15%"><?php echo $this->_var['lang']['window_color']; ?></th>
                        <th width="8%"><?php echo $this->_var['lang']['sort_order']; ?></th>
                        <th width="8%"><?php echo $this->_var['lang']['display']; ?></th>
                        <th width="14%"><?php echo $this->_var['lang']['handler']; ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $_from = $this->_var['win_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'window');if (count($_from)):
    foreach ($_from AS $this->_var['window']):
?>
                    <tr>
                        <td class="first_td_checkbox"><div class="first_all"><input type="checkbox" name="checkboxes[]" value="<?php echo $this->_var['window']['id']; ?>" id="checkbox_<?php echo $this->_var['window']['id']; ?>" class="ui-checkbox" /><label class="ui-label" for="checkbox_<?php echo $this->_var['window']['id']; ?>"><?php echo $this->_var['window']['id']; ?></label></div></td>
                        <td align="center"><span onclick="javascript:listTable.edit(this, 'edit_win_name', <?php echo $this->_var['window']['id']; ?>)"><?php echo htmlspecialchars($this->_var['window']['win_name']); ?></span></td>
                        <td align="center"><?php echo $this->_var['window']['seller_theme']; ?></td>
                        <td align="center"><?php echo $this->_var['window']['win_type_name']; ?></td>
                        <td align="center"><div style="width:50px; height:30px; margin:0 auto; background-color:<?php echo $this->_var['window']['win_color']; ?>;"></div></td>
                        <td align="center"><span onclick="javascript:listTable.edit(this, 'edit_sort_order', <?php echo $this->_var['window']['id']; ?>)"><?php echo $this->_var['window']['win_order']; ?></span></td>
                        <td align="center">
                            <div class="switch <?php if ($this->_var['window']['is_show']): ?>active<?php endif; ?>" title="<?php if ($this->_var['window']['is_show']): ?>是<?php else: ?>否<?php endif; ?>" onclick="listTable.switchBt(this, 'toggle_show', <?php echo $this->_var['window']['id']; ?>)">
								<div class="circle"></div>
							</div>
						</td>
						<td class="ecsc-table-handle tr">
                        <span><a href="merchants_window.php?act=edit&id=<?php echo $this->_var['window']['id']; ?>" title="<?php echo $this->_var['lang']['edit']; ?>" class="btn-green"><i class="icon icon-edit"></i><p><?php echo $this->_var['lang']['edit']; ?></p></a></span>
                        <?php if ($this->_var['window']['win_type']): ?>
                        <span><a href="merchants_window.php?act=add_win_goods&id=<?php echo $this->_var['window']['id']; ?>" title="<?php echo $this->_var['lang']['add_product']; ?>" class="btn-blue"><i class="icon icon-plus"></i><p><?php echo $this->_var['lang']['add']; ?></p></a></span>
                        <?php endif; ?>
                        <span><a href="javascript:;" onclick="listTable.remove(<?php echo $this->_var['window']['id']; ?>, '<?php echo $this->_var['lang']['drop_confirm']; ?>')" title="<?php echo $this->_var['lang']['drop']; ?>" class="btn-red"><i class="icon icon-trash"></i><p><?php echo $this->_var['lang']['drop']; ?></p></a></span>
                        </td>
                    </tr>
                    <?php endforeach; else: ?>
                    <tr><td class="no-records" colspan="8"><?php echo $this->_var['lang']['no_records']; ?></td></tr>
                    <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    </tbody>
                    <tfoot>
                    	<tr>
                        	<td colspan="8" class="td_border">
                            	<div class="shenhe">
                                    <input type="hidden" name="act" value="batch" />
                                    <input type="submit" value="<?php echo $this->_var['lang']['drop']; ?>" id="btnSubmit" name="btnSubmit" class="sc-btn btn_disabled" disabled="true" />
                                </div>
                            </td>
                        </tr>
                    </tfoot>
                </table>
                <?php if ($this->_var['full_page']): ?>
                </div>
    		</form>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>
<?php echo $this->fetch('library/seller_footer.lbi'); ?>
</body>
</html>
<?php endif; ?>