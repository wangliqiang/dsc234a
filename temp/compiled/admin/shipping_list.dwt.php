<!doctype html>
<html>
<head><?php echo $this->fetch('library/admin_html_head.lbi'); ?></head>

<body class="iframe_body">
	<div class="warpper">
    	<div class="title">系统设置 - <?php echo $this->_var['ur_here']; ?></div>
        <div class="content">
        	<div class="tabs_info">
            	<ul>
                    <li <?php if ($this->_var['menu_select']['current'] == '03_shipping_list'): ?>class="curr"<?php endif; ?>><a href="shipping.php?act=list">配送方式</a></li>
                    <li <?php if ($this->_var['menu_select']['current'] == '05_area_list'): ?>class="curr"<?php endif; ?>><a href="area_manage.php?act=list">地区列表</a></li>
                    <li <?php if ($this->_var['menu_select']['current'] == '09_region_area_management'): ?>class="curr"<?php endif; ?>><a href="region_area.php?act=list">区域管理</a></li>
                    <li <?php if ($this->_var['menu_select']['current'] == '09_warehouse_management'): ?>class="curr"<?php endif; ?>><a href="warehouse.php?act=list">仓库管理</a></li>
					<li <?php if ($this->_var['menu_select']['current'] == 'warehouse_ship_list'): ?>class="curr"<?php endif; ?>><a href="warehouse.php?act=ship_list">仓库运费模板</a></li>
                    <li <?php if ($this->_var['menu_select']['current'] == 'shipping_date_list'): ?>class="curr"<?php endif; ?>><a href="shipping.php?act=date_list">自提时间段</a></li>
                </ul>
            </div>		
        	<div class="explanation" id="explanation">
            	<div class="ex_tit">
					<i class="sc_icon"></i><h4>操作提示</h4><span id="explanationZoom" title="收起提示"></span>
                    <?php if ($this->_var['open'] == 1): ?>
                    <div class="view-case">
                    	<div class="view-case-tit"><i></i>查看教程</div>
                        <div class="view-case-info">
                        	<a href="http://help.ecmoban.com/article-3141.html" target="_blank">配送方式使用说明</a>
                        </div>
                    </div>			
                    <?php endif; ?>	
				</div>
                <ul>
                	<li>该页面展示了平台所有配送方式的信息列表。</li>
                    <li>安装配送方式后需设置区域方可使用。</li>
                </ul>
            </div>
            <div class="flexilist">
                <div class="common-content">
                	<div class="list-div">
                        <table class="table_layout">
                        	<thead>
                            	<tr>
                                    <th width="14%"><div class="tDiv"><?php echo $this->_var['lang']['shipping_name']; ?></div></th>
                                    <th width="24%"><div class="tDiv"><?php echo $this->_var['lang']['shipping_desc']; ?></div></th>
                                    <th width="2%"><div class="tDiv">&nbsp;</div></th>
                                    <th width="15%"><div class="tDiv"><?php echo $this->_var['lang']['insure']; ?></div></th>
                                    <th width="7%"><div class="tDiv"><?php echo $this->_var['lang']['support_cod']; ?></div></th>
                                    <th><div class="tDiv">&nbsp;</div></th>
                                    <th width="6%"><div class="tDiv"><?php echo $this->_var['lang']['sort_order']; ?></div></th>
                                    <th width="24%" class="handle"><?php echo $this->_var['lang']['handler']; ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                  <?php $_from = $this->_var['modules']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'module');if (count($_from)):
    foreach ($_from AS $this->_var['module']):
?>
                                  <?php if (( $this->_var['seller_shopinfo']['ru_id'] > 0 && $this->_var['module']['install'] == 1 && $this->_var['module']['code'] != 'cac' ) || $this->_var['seller_shopinfo']['ru_id'] == 0): ?>
                            	<tr>
                                    <td><div class="tDiv">
                                        <?php if ($this->_var['module']['install'] == 1): ?>
										<input type="text" name="measure_unit" class="text w100" value="<?php echo $this->_var['module']['name']; ?>" onBlur="listTable.editInput(this, 'edit_name', '<?php echo $this->_var['module']['code']; ?>')"/>
                                            <?php if ($this->_var['seller_shopinfo']['ru_id'] == 0 && $this->_var['module']['id'] == $this->_var['seller_shopinfo']['shipping_id']): ?> <img src="images/yes.png" title="<?php echo $this->_var['module']['name']; ?>已启用"><?php endif; ?>
										<?php else: ?>
                                            <?php echo $this->_var['module']['name']; ?>
                                        <?php endif; ?>
                                        </div>
                                    </td>
                                    <td>
                                    	<div class="tDiv">
                                          <?php if ($this->_var['module']['install'] == 1): ?>
                                          <span onclick="listTable.edit(this, 'edit_desc', '<?php echo $this->_var['module']['code']; ?>'); return false;"><?php echo $this->_var['module']['desc']; ?></span>
                                          <?php else: ?>
                                          <?php echo $this->_var['module']['desc']; ?>
                                          <?php endif; ?>
                                        </div>
                                    </td>
                                    <td>&nbsp;</td>
                                    <td>
                                    	<div class="tDiv">
                                          <?php if ($this->_var['module']['install'] == 1 && $this->_var['module']['is_insure'] != 0): ?>
                                          <span onclick="listTable.edit(this, 'edit_insure', '<?php echo $this->_var['module']['code']; ?>'); return false;"><?php echo $this->_var['module']['insure_fee']; ?></span>
                                          <?php else: ?>
                                          <?php echo $this->_var['module']['insure_fee']; ?>
                                          <?php endif; ?>
                                        </div>
                                    </td>
                                    <td><div class="tDiv"><?php if ($this->_var['module']['cod'] == 1): ?><?php echo $this->_var['lang']['yes']; ?><?php else: ?><?php echo $this->_var['lang']['no']; ?><?php endif; ?></div></td>
                                    <td><div class="tDiv">&nbsp;</div></td>
                                    <td>
                                    	<div class="tDiv">
                                    		<?php if ($this->_var['module']['install'] == 1): ?> 
                                            <span onclick="listTable.edit(this, 'edit_order', '<?php echo $this->_var['module']['code']; ?>'); return false;"><?php echo $this->_var['module']['shipping_order']; ?></span> 
                                            <?php else: ?>
                                            0
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                    <td class="handle">
                                        <div class="tDiv a3_3">
                                          <?php if ($this->_var['module']['install'] == 1): ?>
                                          <a href="javascript:confirm_redirect(lang_removeconfirm,'shipping.php?act=uninstall&code=<?php echo $this->_var['module']['code']; ?>')" class="btn_trash"><i class="icon icon-trash"></i><?php echo $this->_var['lang']['uninstall']; ?></a>
                                          <a href="shipping_area.php?act=list&shipping=<?php echo $this->_var['module']['id']; ?>" class="btn_region"><i class="sc_icon icon-map-marker"></i><?php echo $this->_var['lang']['shipping_area']; ?></a> 
                                          <a href="shipping.php?act=edit_print_template&shipping=<?php echo $this->_var['module']['id']; ?>" class="btn_edit"><i class="icon icon-edit"></i><?php echo $this->_var['lang']['shipping_print_edit']; ?></a>
                                          <?php else: ?>
                                          <a href="shipping.php?act=install&code=<?php echo $this->_var['module']['code']; ?>" class="btn_inst"><i class="sc_icon sc_icon_inst"></i><?php echo $this->_var['lang']['install']; ?></a>
                                          <?php endif; ?>
                                        </div>
                                    </td>
                                </tr>
                                <?php endif; ?>
                                <?php endforeach; else: ?>
                                    <tr><td class="no-records" colspan="12"><?php echo $this->_var['lang']['no_records']; ?></td></tr>
                                <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
 	<?php echo $this->fetch('library/pagefooter.lbi'); ?>
</body>
</html>
