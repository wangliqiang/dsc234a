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
                <div class="items-info">
					<?php endif; ?>
                    <form method="post" action="" name="listForm">
                    <div class="list-div" id="listDiv">
                      <table class="ecsc-default-table mt20">
                      	<thead>
                        <tr>
                          <th width="26%"><?php echo $this->_var['lang']['carousel_image']; ?></th>
                          <th width="24%"><?php echo $this->_var['lang']['image_href']; ?></th>
                          <th width="18%"><?php echo $this->_var['lang']['image_explain']; ?></th>
                          <th width="8%"><?php echo $this->_var['lang']['sort_order']; ?></th>
                          <th width="8%"><?php echo $this->_var['lang']['transform_style']; ?></th>
                          <th width="6%"><?php echo $this->_var['lang']['display']; ?></th>
                          <th width="12%"><?php echo $this->_var['lang']['handler']; ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $_from = $this->_var['seller_slide_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'slide_list');if (count($_from)):
    foreach ($_from AS $this->_var['slide_list']):
?>
                        <tr>
                            <td>
                                <img src="<?php echo $this->_var['slide_list']['img_url']; ?>" height="70" />
                            </td>
                            <td><a href="<?php echo $this->_var['slide_list']['img_link']; ?>" target="_blank"><?php echo $this->_var['slide_list']['img_link']; ?></a></td>
                            <td><?php echo $this->_var['slide_list']['img_desc']; ?></td>
                            <td><span onclick="javascript:listTable.edit(this, 'edit_sort_order', <?php echo $this->_var['slide_list']['id']; ?>)"><?php echo $this->_var['slide_list']['img_order']; ?></span></td>
                            <td><?php echo $this->_var['slide_list']['slide_type']; ?></td>
                            <td>
                                <div class="switch <?php if ($this->_var['slide_list']['is_show']): ?>active<?php endif; ?>" title="<?php if ($this->_var['slide_list']['is_show']): ?>是<?php else: ?>否<?php endif; ?>" onclick="listTable.switchBt(this, 'toggle_show', <?php echo $this->_var['slide_list']['id']; ?>)">
                                    <div class="circle"></div>
                                </div>
                                <input type="hidden" value="0" name="">
                            </td>
                            <td class="ecsc-table-handle tr">
                                <span><a href="seller_shop_slide.php?act=edit&id=<?php echo $this->_var['slide_list']['id']; ?>" title="<?php echo $this->_var['lang']['edit']; ?>" class="btn-green"><i class="icon icon-edit"></i><p><?php echo $this->_var['lang']['edit']; ?></p></a></span>
                                <span><a href="javascript:;" onclick="listTable.remove(<?php echo $this->_var['slide_list']['id']; ?>, '<?php echo $this->_var['lang']['drop_confirm']; ?>')" title="<?php echo $this->_var['lang']['drop']; ?>" class="btn-red"><i class="icon icon-trash"></i><p><?php echo $this->_var['lang']['drop']; ?></p></a></span>
                            </td>
                        </tr>
                        <?php endforeach; else: ?>
                        <tr><td class="no-records" colspan="10"><?php echo $this->_var['lang']['no_records']; ?></td></tr>
                        <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
                        </tbody>
                      </table>
                    </div>
                    </form>
				<?php if ($this->_var['full_page']): ?>
                </div>						
            </div>
        </div>
    </div>    
</div>
<?php echo $this->fetch('library/seller_footer.lbi'); ?>
<script type="text/javascript" src="js/jquery.picTip.js"></script>
<script type="text/javascript">
  <!--
  listTable.recordCount = <?php if ($this->_var['record_count']): ?><?php echo $this->_var['record_count']; ?><?php else: ?>1<?php endif; ?>;
  listTable.pageCount = <?php if ($this->_var['page_count']): ?><?php echo $this->_var['page_count']; ?><?php else: ?>1<?php endif; ?>;

  <?php $_from = $this->_var['filter']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
  listTable.filter.<?php echo $this->_var['key']; ?> = '<?php echo $this->_var['item']; ?>';
  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

  //-->
</script>
</body>
<?php endif; ?>
