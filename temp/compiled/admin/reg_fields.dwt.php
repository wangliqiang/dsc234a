<?php if ($this->_var['full_page']): ?>
<!doctype html>
<html>
<head><?php echo $this->fetch('library/admin_html_head.lbi'); ?></head>
<body class="iframe_body">
	<div class="warpper">
    	<div class="title">系统设置 - <?php echo $this->_var['ur_here']; ?></div>
        <div class="content">
        	<div class="explanation" id="explanation">
            	<div class="ex_tit">
					<i class="sc_icon"></i><h4>操作提示</h4><span id="explanationZoom" title="收起提示"></span>
                    <?php if ($this->_var['open'] == 1): ?>
                    <div class="view-case">
                    	<div class="view-case-tit"><i></i>查看教程</div>
                        <div class="view-case-info">
                        	<a href="http://help.ecmoban.com/article-6876.html" target="_blank">商城会员注册项设置</a>
                        </div>
                    </div>			
                    <?php endif; ?>	
				</div>
                <ul>
                	<li>该页面展示了会员注册项相关信息。</li>
                    <li>可在列表页点击是否显示和是否必填。</li>
                </ul>
            </div>
            <div class="flexilist">
            	<!--商品分类列表-->
                <div class="common-head">
                    <div class="fl">
                    	<a href="<?php echo $this->_var['action_link']['href']; ?>"><div class="fbutton"><div class="add" title="<?php echo $this->_var['action_link']['text']; ?>"><span><i class="icon icon-plus"></i><?php echo $this->_var['action_link']['text']; ?></span></div></div></a>
                    </div>
                </div>
                <div class="common-content">
                	<div class="list-div" id="listDiv">
                        <?php endif; ?>
                    	<table cellpadding="0" cellspacing="0" border="0">
                            <thead>
                            	<tr>
                                    <th width="40%"><div class="tDiv"><?php echo $this->_var['lang']['field_name']; ?></div></th>
                                    <th width="15%"><div class="tDiv"><?php echo $this->_var['lang']['field_order']; ?></div></th>
                                    <th width="15%"><div class="tDiv"><?php echo $this->_var['lang']['field_display']; ?></div></th>
                                    <th width="15%"><div class="tDiv"><?php echo $this->_var['lang']['field_need']; ?></div></th>
                                    <th width="20%" class="handle"><?php echo $this->_var['lang']['handler']; ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $_from = $this->_var['reg_fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'field');if (count($_from)):
    foreach ($_from AS $this->_var['field']):
?>
                            	<tr>
                                    <td><div class="tDiv"><?php echo $this->_var['field']['reg_field_name']; ?></div></td>
                                    <td>
                                        <div class="tDiv">
                                            <input type="text" name="measure_unit" class="text w80" value="<?php echo $this->_var['field']['dis_order']; ?>" onkeyup="listTable.editInput(this, 'edit_order', <?php echo $this->_var['field']['id']; ?>)"/>
                                        </div>
                                    </td>
                                    <td>
                                    	<div class="tDiv">
                                            <div class="switch <?php if ($this->_var['field']['display'] == 1): ?>active<?php endif; ?>" title="<?php if ($this->_var['field']['display'] == 1): ?>是<?php else: ?>否<?php endif; ?>" onclick="listTable.switchBt(this, 'toggle_dis', <?php echo $this->_var['field']['id']; ?>)">
                                            	<div class="circle"></div>
                                            </div>
                                            <input type="hidden" value="0" name="">
                                        </div>
                                    </td>
                                    <td>
                                    	<div class="tDiv">
                                            <div class="switch <?php if ($this->_var['field']['is_need'] == 1): ?>active<?php endif; ?>" title="<?php if ($this->_var['field']['is_need'] == 1): ?>是<?php else: ?>否<?php endif; ?>" onclick="listTable.switchBt(this, 'toggle_need', <?php echo $this->_var['field']['id']; ?>)">
                                            	<div class="circle"></div>
                                            </div>
                                            <input type="hidden" value="0" name="">
                                        </div>
                                    </td>
                                    <td class="handle">
                                        <div class="tDiv a2">
                                            <a href="?act=edit&id=<?php echo $this->_var['field']['id']; ?>" title="<?php echo $this->_var['lang']['edit']; ?>" class="btn_edit"><i class="icon icon-edit"></i><?php echo $this->_var['lang']['edit']; ?></a>
                                            <?php if ($this->_var['field']['type'] == 0): ?>
                                            <a href="javascript:;" onclick="listTable.remove(<?php echo $this->_var['field']['id']; ?>, '<?php echo $this->_var['lang']['drop_confirm']; ?>')" title="<?php echo $this->_var['lang']['remove']; ?>" class="btn_trash"><i class="icon icon-trash"></i><?php echo $this->_var['lang']['remove']; ?></a>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; else: ?>
                                <tr><td class="no-records" colspan="12"><?php echo $this->_var['lang']['no_records']; ?></td></tr>
                                <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
                            </tbody>
                        </table>
                        <?php if ($this->_var['full_page']): ?>
                    </div>
                </div>
                <!--商品分类列表end-->
            </div>
		</div>
	</div>   
 <?php echo $this->fetch('library/pagefooter.lbi'); ?>
</body>
</html>
<?php endif; ?>
