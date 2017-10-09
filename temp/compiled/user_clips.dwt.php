<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="<?php echo $this->_var['keywords']; ?>" />
<meta name="Description" content="<?php echo $this->_var['description']; ?>" />

<title><?php echo $this->_var['page_title']; ?></title>



<link rel="shortcut icon" href="favicon.ico" />
<?php echo $this->fetch('library/js_languages_new.lbi'); ?>
<link rel="stylesheet" type="text/css" href="themes/<?php echo $GLOBALS['_CFG']['template']; ?>/css/user.css">
<link rel="stylesheet" type="text/css" href="js/perfect-scrollbar/perfect-scrollbar.min.css" />
</script>

</head>
<body>
<?php echo $this->fetch('library/page_header_common.lbi'); ?>
<div class="user-content clearfix">
    <div class="user-side" ectype="userSide">
        <?php if ($this->_var['action'] != 'default'): ?>
        <div class="user-perinfo-ny">
            <div class="profile clearfix">
                <div class="avatar">
                    <a href="user.php" class="u-pic">
                            <img src="<?php if ($this->_var['user_default_info']['user_picture']): ?><?php echo $this->_var['user_default_info']['user_picture']; ?><?php else: ?>themes/<?php echo $GLOBALS['_CFG']['template']; ?>/images/touxiang.jpg<?php endif; ?>" alt="">
                    </a>
                </div>
                <div class="name">
                    <h2><?php echo $this->_var['user_default_info']['nick_name']; ?></h2>
                    <div class="user-rank user-rank-1"><?php echo $this->_var['user_default_info']['rank_name']; ?></div>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <?php if ($this->_var['action'] == 'default'): ?>
        <div class="user-mod user-perinfo">
            <div class="profile clearfix">
                <div class="avatar">
                    <a href="user.php?act=profile" class="u-pic">
                        <img src="<?php if ($this->_var['info']['user_picture']): ?><?php echo $this->_var['info']['user_picture']; ?><?php else: ?>themes/<?php echo $GLOBALS['_CFG']['template']; ?>/images/touxiang.jpg<?php endif; ?>" alt="">
                    </a>
                </div>
                <div class="name">
                    <h2><?php echo $this->_var['info']['nick_name']; ?></h2>
                    <?php if ($this->_var['special_rank']): ?>
                    <div class="user-rank user-rank-1"></div>
                    <?php else: ?>
                    <div class="user-rank user-rank-1"><?php echo $this->_var['rank']['user_rank']['rank_name']; ?></div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="account">
                <div class="item clearfix">
                    <div class="item-name">账户资料：</div>
                    <div class="item-main">
                        <b class="integrity"><em style="width: <?php echo $this->_var['security_rating']['Percentage']; ?>%;"></em></b><span><?php echo $this->_var['security_rating']['Percentage']; ?>%</span>
                    </div>
                </div>
                <div class="item clearfix">
                    <div class="item-name">账户安全：</div>
                    <div class="item-main safe">
                        <a href="user.php?act=account_safe" class="iconfont icon-email <?php if ($this->_var['validate']['email_validate']): ?>active<?php endif; ?>"><span class="tip"><?php if ($this->_var['validate']['email_validate']): ?>邮箱已验证<?php else: ?>邮箱未验证<?php endif; ?></span></a>
                        <a href="user.php?act=account_safe" class="iconfont icon-see <?php if ($this->_var['validate']['real_id']): ?>active<?php endif; ?>"><span class="tip"><?php if ($this->_var['validate']['real_id']): ?>实名认证已完成<?php else: ?>实名认证未完成<?php endif; ?></span></a>
                        <a href="user.php?act=account_safe" class="iconfont icon-password active"><span class="tip">密码已设置</span></a>
                        <a href="user.php?act=account_safe" class="iconfont icon-mobile-phone <?php if ($this->_var['validate']['mobile_phone']): ?>active<?php endif; ?>"><span class="tip"><?php if ($this->_var['validate']['mobile_phone']): ?>手机已验证<?php else: ?>手机未验证<?php endif; ?></span></a>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <div class="user-mod">
            <?php echo $this->fetch('library/user_menu.lbi'); ?>
        </div>
    </div>
    <div class="user-main" ectype="userMain">
        <?php if ($this->_var['action'] != 'default'): ?>
        <div class="user-crumbs hide">
            <?php echo $this->fetch('library/ur_here.lbi'); ?>
        </div>
        <?php endif; ?>

        
        <?php if ($this->_var['action'] == 'default'): ?>
        <ul class="user-index-order-statu clearfix">
            <li>
                <a href="user.php?act=order_list&order_type=toBe_pay">
                <div class="circle"><i class="iconfont icon-columns"></i></div>
                <div class="info">
                    <p><?php echo $this->_var['lang']['piad_not']; ?></p>
                    <div class="num"><?php echo $this->_var['pay_count']; ?></div>
                </div>
                </a>
            </li>
            <li>
                <a href="user.php?act=order_list&order_type=toBe_confirmed">
                <div class="circle"><i class="iconfont icon-truck-alt"></i></div>
                <div class="info">
                    <p><?php echo $this->_var['lang']['receipt_not']; ?></p>
                    <div class="num"><?php echo $this->_var['to_confirm_order']; ?></div>
                </div>
                </a>
            </li>
            <li>
                <a href="user.php?act=comment_list">
                <div class="circle"><i class="iconfont icon-edit"></i></div>
                <div class="info">
                    <p><?php echo $this->_var['lang']['comment_not']; ?></p>
                    <div class="num"><?php echo $this->_var['signNum']; ?></div>
                </div>
                </a>
            </li>
            <li>
                <a href="user.php?act=order_list&order_type=toBe_finished">
                <div class="circle"><i class="iconfont icon-complete"></i></div>
                <div class="info">
                    <p><?php echo $this->_var['lang']['cs']['102']; ?></p>
                    <div class="num"><?php echo $this->_var['to_finished']; ?></div>
                </div>
                </a>
            </li>
        </ul>
        <ul class="user-index-wallet clearfix">
            <li>
                <div class="words"></div>
                <div class="info info-line">
                    <a href="user.php?act=account_log"><?php echo $this->_var['info']['surplus']; ?></a>
                </div>
            </li>
            <li>
                <div class="words"></div>
                <div class="info info-line">
                    <a href="user.php?act=bonus"><?php echo $this->_var['lang']['bonus_user']; ?>（<span class="red"><?php echo $this->_var['info']['bonus_count']; ?></span>）</a>
                    
                </div>
            </li>
            <li>
                <div class="words"></div>
                <div class="info">
                    <a href="user.php?act=coupons">优惠券（<span class="red"><?php echo $this->_var['coupons']['num']; ?></span>）</a><br>
                    <div class="num"><a href="coupons.php?act=coupons_index" target="_blank" class="line">领券</a></div>
                </div>
            </li>
            <li>
                <div class="words"></div>
                <div class="info info-line">
                    <a href="user.php?act=value_card">储值卡（<span class="red"><?php echo $this->_var['value_card']['num']; ?></span>）</a>
                </div>
            </li>
            <li>
                <div class="words"></div>
                <div class="info info-line"><a href="user.php?act=account_log"><?php echo $this->_var['info']['integral']; ?></a></div>
            </li>
        </ul>
        <div class="user-mod">
            <div class="user-section">
                <div class="user-title">
                    <h2>我的订单</h2>
                    <a href="user.php?act=order_list" class="more"><?php echo $this->_var['lang']['see_all_order']; ?></a>
                </div>
                <div class="user-index-order-list">
                    <?php $_from = $this->_var['order_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'order');if (count($_from)):
    foreach ($_from AS $this->_var['order']):
?>
                    <div class="tr">
                        <div class="td td-goods">
                            <?php $_from = $this->_var['order']['goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['name'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['name']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['name']['iteration']++;
?>
							<?php if ($this->_foreach['name']['total'] > 1): ?>
							<?php if ($this->_var['goods']['extension_code'] != 'package_buy'): ?>
							<div class="c-img"><a href="<?php echo $this->_var['goods']['url']; ?>"><img src="<?php if ($this->_var['goods']['goods_thumb']): ?><?php echo $this->_var['goods']['goods_thumb']; ?><?php else: ?><?php echo $this->_var['order']['no_picture']; ?><?php endif; ?>" alt=""></a></div>
							<?php else: ?>
							<div class="c-img"><a href="javascript:void(0);"><img src="themes/ecmoban_dsc2017/images/17184624079016pa.jpg" alt=""></a></div>
							<?php endif; ?>
							<?php else: ?>
                            <?php if ($this->_var['goods']['extension_code'] != 'package_buy'): ?>
							<div class="c-img"><a href="<?php echo $this->_var['goods']['url']; ?>"><img src="<?php if ($this->_var['goods']['goods_thumb']): ?><?php echo $this->_var['goods']['goods_thumb']; ?><?php else: ?><?php echo $this->_var['order']['no_picture']; ?><?php endif; ?>" alt=""></a></div>
							<?php else: ?>
							<div class="c-img"><a href="javascript:void(0);"><img src="themes/ecmoban_dsc2017/images/17184624079016pa.jpg" alt=""></a></div>
							<?php endif; ?>
							<div class="c-info"><?php echo $this->_var['goods']['goods_name']; ?></div>
							<?php endif; ?>
                            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                        </div>
                        <div class="td td-price"><?php echo $this->_var['order']['total_fee']; ?></div>
                        <div class="td td-name"><?php echo $this->_var['order']['consignee']; ?></div>
                        <div class="td td-statu"><?php echo $this->_var['order']['order_status']; ?></div>
                        <div class="td td-handle">
                            <a href="user.php?act=order_detail&order_id=<?php echo $this->_var['order']['order_id']; ?>" class="sc-btn"><?php echo $this->_var['lang']['order_detail']; ?></a>
                        </div>
                    </div>
                    <?php endforeach; else: ?>
                    <div class="no_records">
                        <i class="no_icon"></i>
                        <div class="no_info no_info_line">
                            <h3><?php 
$k = array (
  'name' => 'get_page_no_records',
  'filename' => $this->_var['filename'],
  'act' => $this->_var['action'],
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?></h3>
                            <div class="no_btn">
                                <a href="index.php" class="sc-btn sc-red-btn">去逛商城</a>
                            </div>
                        </div>
                    </div>
                    <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
                </div>
            </div>
            
            <div class="user-section">
                <div class="user-title">
                    <h2><?php echo $this->_var['lang']['Recent_collection']; ?></h2>
                    <a href="" class="more"><?php echo $this->_var['lang']['see_all_Collection']; ?></a>
                </div>
                <div class="user-index-collection-list">
                    <?php $_from = $this->_var['collection_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
                    <div class="tr">
                        <div class="td td-goods">
                            <a href="<?php echo $this->_var['goods']['url']; ?>" class="img"><img src="<?php echo $this->_var['goods']['goods_thumb']; ?>" alt=""></a>
                            <a href="<?php echo $this->_var['goods']['url']; ?>" class="name"><?php echo $this->_var['goods']['goods_name']; ?></a>
                        </div>
                        <div class="td td-price">
                            <?php if ($this->_var['goods']['promote_price'] != ''): ?>
                                <?php echo $this->_var['goods']['promote_price']; ?>
                            <?php else: ?>
                                <?php echo $this->_var['goods']['shop_price']; ?>
                            <?php endif; ?>
                        </div>
                        <div class="td td-shop">
                            <a href="" class="name"><?php echo $this->_var['goods']['shop_name']; ?></a>
                            <a href="" class="iconfont icon-kefu"></a>
                        </div>
                        <div class="td td-handle"><a href="<?php echo $this->_var['goods']['url']; ?>" class="sc-btn">立即购买</a></div>
                    </div>
                    <?php endforeach; else: ?>
                    <div class="no_records">
                        <i class="no_icon"></i>
                        <div class="no_info">
                            <h3>主人，您近期还没有收藏商品呦~</h3>
                        </div>
                    </div>
                    <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
                </div>
            </div>
            <?php if ($this->_var['collection_goods']): ?><?php endif; ?>
            <?php if ($this->_var['guess_goods']): ?>
            <div class="user-section">
                <div class="user-title">
                    <h2><?php echo $this->_var['lang']['guess_love']; ?></h2>
                </div>
                <ul class="user-goods-list clearfix">
                    <?php $_from = $this->_var['guess_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
                    <li>
                        <a href="<?php echo $this->_var['goods']['url']; ?>" class="img"><img src="<?php echo $this->_var['goods']['goods_thumb']; ?>" alt=""></a>
                        <a href="" class="title"><?php echo $this->_var['goods']['short_name']; ?></a>
                        <div class="price"><?php echo $this->_var['goods']['shop_price']; ?></div>
                    </li>
                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                </ul>
            </div>    
            <?php endif; ?>
            <?php if ($this->_var['helpart_list']): ?>
            <div class="user-section">
                <div class="user-title">
                    <h2><?php echo $this->_var['lang']['calendar_help']; ?></h2>
                </div>
                <ul class="user-help-list clearfix">
                    <?php $_from = $this->_var['helpart_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'help');if (count($_from)):
    foreach ($_from AS $this->_var['help']):
?>
                    <li><a href="<?php echo $this->_var['help']['url']; ?>" class="ftx-05" target="_blank"><?php echo $this->_var['help']['title']; ?></a></li>
                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                </ul>
            </div>
            <?php endif; ?>
        </div>
        <?php endif; ?>
        

        
        <?php if ($this->_var['action'] == 'booking_list'): ?>
        <div class="user-mod">
            <div class="user-title">
                <h2><?php echo $this->_var['lang']['label_booking']; ?></h2>
            </div>
            <div class="user-booking-list">
                <?php $_from = $this->_var['booking_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                <dl class="item">
                    <dt class="item-t">
                        <div class="t-handle">
                            <a href="user.php?act=act_del_booking&id=<?php echo $this->_var['item']['rec_id']; ?>" data-dialog="goods_del_booking" data-divid="delete_del_booking" data-goodsid="0" class="sc-btn">取消订购</a>
                        </div>
                        <a href="<?php echo $this->_var['item']['url']; ?>" class="t-img"><img src="<?php echo $this->_var['item']['goods_thumb']; ?>" alt=""></a>
                        <div class="t-info">
                            <div class="info-name"><a href="<?php echo $this->_var['item']['url']; ?>"><?php echo $this->_var['item']['goods_name']; ?></a></div>
                            <p class="info-num">订购数量：<span class="red"><?php echo $this->_var['item']['goods_number']; ?></span></p>
                        </div>
                    </dt>
                    <dd class="item-c">
                        <div class="fl">处理备注：<span class="ftx-05"><?php echo $this->_var['item']['dispose_note']; ?></span></div>
                        <div class="fr"><?php echo $this->_var['item']['booking_time']; ?></div>
                    </dd>
                </dl>
                <?php endforeach; else: ?>
                <div class="no_records">
                    <i class="no_icon"></i>
                    <div class="no_info"><h3><?php 
$k = array (
  'name' => 'get_page_no_records',
  'filename' => $this->_var['filename'],
  'act' => $this->_var['action'],
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?></h3></div>
                </div>
                <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </div>
        </div>
        <?php endif; ?>
        
        
        
        <?php if ($this->_var['action'] == 'add_booking'): ?>
        <div class="user-mod">
            <div class="user-title">
                <h2><?php echo $this->_var['lang']['label_booking']; ?></h2>
            </div>
            <form action="user.php" method="post" class="user-form" name="formBooking" id="formBooking">
                <div class="form-row">
                    <div class="form-label"><?php echo $this->_var['lang']['booking_goods_name']; ?>：</div>
                    <div class="form-value"><?php echo $this->_var['info']['goods_name']; ?></div>
                </div>
                <div class="form-row">
                    <div class="form-label"><em class="red">*</em><?php echo $this->_var['lang']['booking_amount']; ?>：</div>
                    <div class="form-value">
                        <input name="number" type="text" value="<?php echo $this->_var['info']['goods_number']; ?>" class="form-input" />
                        <div class="form_prompt"></div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-label"><em class="red">*</em><?php echo $this->_var['lang']['describe']; ?>：</div>
                    <div class="form-value">
                    <textarea name="desc" cols="80" rows="20" wrap="virtual" class="textarea"><?php echo $this->_var['goods_attr']; ?><?php echo htmlspecialchars($this->_var['info']['goods_desc']); ?></textarea>
                    <div class="form_prompt"></div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-label"><em class="red">*</em><?php echo $this->_var['lang']['contact_username']; ?>：</div>
                    <div class="form-value"><input name="linkman" type="text" value="<?php echo htmlspecialchars($this->_var['info']['consignee']); ?>" size="25"  class="form-input"/><div class="form_prompt"></div></div>
                </div>
                <div class="form-row">
                    <div class="form-label"><em class="red">*</em><?php echo $this->_var['lang']['email_address']; ?>：</div>
                    <div class="form-value"><input name="email" type="text" value="<?php echo htmlspecialchars($this->_var['info']['email']); ?>" size="25" class="form-input" /><div class="form_prompt"></div></div>
                </div>
                <div class="form-row">
                    <div class="form-label"><em class="red">*</em><?php echo $this->_var['lang']['contact_phone']; ?>：</div>
                    <div class="form-value"><input name="tel" type="text" value="<?php echo htmlspecialchars($this->_var['info']['tel']); ?>" size="25" class="form-input" /><div class="form_prompt"></div></div>
                </div>
                <div class="form-btn-wp">
                    <input name="act" type="hidden" value="act_add_booking" />
                    <input name="id" type="hidden" value="<?php echo $this->_var['info']['id']; ?>" />
                    <input name="rec_id" type="hidden" value="<?php echo $this->_var['info']['rec_id']; ?>" />
                    <input type="submit" name="submit" class="form-btn" value="<?php echo $this->_var['lang']['submit_booking_goods']; ?>" id="submitBtn" />
                    <input type="reset" name="reset" class="form-btn form-btn-gray" value="<?php echo $this->_var['lang']['button_reset']; ?>" />
                </div>
            </form>
        </div>	
        <?php endif; ?>
        			
        
        
        <?php if ($this->_var['action'] == 'collection_list' || $this->_var['action'] == 'store_list' || $this->_var['action'] == 'focus_brand'): ?>
        <div class="user-mod">
            <div class="user-title">
                <h2>我的收藏</h2>
                <ul class="tabs">
                    <li <?php if ($this->_var['action'] == 'collection_list'): ?>class="active"<?php endif; ?>><a href="user.php?act=collection_list"><?php echo $this->_var['lang']['Collection_goods']; ?></a></li>
                    <li <?php if ($this->_var['action'] == 'store_list'): ?>class="active"<?php endif; ?>><a href="user.php?act=store_list"><?php echo $this->_var['lang']['store_list']; ?></a></li>
                    <li <?php if ($this->_var['action'] == 'focus_brand'): ?>class="active"<?php endif; ?>><a href="user.php?act=focus_brand">关注品牌</a></li>
                </ul>
            </div>
            <div class="collection-list-warp clearfix c-tab-box-ajax">
                <?php if ($this->_var['action'] == 'collection_list'): ?>
                <?php echo $this->fetch('library/collection_goods_list.lbi'); ?>
                <?php elseif ($this->_var['action'] == 'store_list'): ?>
                <?php echo $this->fetch('library/collection_store_list.lbi'); ?>
                <?php elseif ($this->_var['action'] == 'focus_brand'): ?>
                <?php echo $this->fetch('library/collection_brands_list.lbi'); ?>
                <?php endif; ?>
            </div>
            
            <?php if ($this->_var['count'] > $this->_var['size']): ?>
            <div class="clearfix" id="pages_ajax">
                <div class="pages"><?php echo $this->_var['pager']; ?></div>
            </div>
            <?php endif; ?>
            
        </div>			
        <?php endif; ?>
        

        
        <?php if ($this->_var['action'] == 'focus_brand'): ?>
        
        <?php endif; ?>
        

        
        <?php if ($this->_var['action'] == 'become_shareholder'): ?>
        <div class="user-mod">
            <div class="user-title">
                <h2>成为股东</h2>
                    </div>
                    <div class="user-message-warp clearfix">
                        <form action="user.php" method="post" enctype="multipart/form-data" name="formMsg" onSubmit="return submitMsg()">
                            <div class="user-items">
                                <?php if ($this->_var['order_info']): ?>
                                <div class="item">
                                    <div class="label"><?php echo $this->_var['lang']['order_number']; ?>：</div>
                                    <div class="value value-checkbox">
                                        <div class="txt-lh"><a href="<?php echo $this->_var['order_info']['url']; ?>"><img src="themes/ecmoban_dsc2017/images/note.gif" style="margin-top:-3px;"/>&nbsp;&nbsp;<?php echo $this->_var['order_info']['order_sn']; ?></a></div>
                                    </div>
                                </div>
                                <input name="msg_type" type="hidden" value="5" />
                                <input name="order_id" type="hidden" value="<?php echo $this->_var['order_info']['order_id']; ?>" />
                                <?php else: ?>
                                <div class="item">
                                    <div class="label"><?php echo $this->_var['lang']['message_type']; ?>：</div>
                                    <div class="value">
                                        <div class="radio-item">
                                            <input type="radio" checked="" name="msg_type" class="ui-radio" id="checkbox-message" value="0">
                                            <label for="checkbox-message" class="ui-radio-label"><?php echo $this->_var['lang']['type']['0']; ?></label>
                                        </div>
                                        <div class="radio-item">
                                            <input type="radio" name="msg_type" class="ui-radio" id="checkbox-complaint" value="1">
                                            <label for="checkbox-complaint" class="ui-radio-label"><?php echo $this->_var['lang']['type']['1']; ?></label>
                                        </div>
                                        <div class="radio-item">
                                            <input type="radio" name="msg_type" class="ui-radio" id="checkbox-ask" value="2">
                                            <label for="checkbox-ask" class="ui-radio-label"><?php echo $this->_var['lang']['type']['2']; ?></label>
                                        </div>
                                        <div class="radio-item">
                                            <input type="radio" name="msg_type" class="ui-radio" id="checkbox-customer" value="3">
                                            <label for="checkbox-customer" class="ui-radio-label"><?php echo $this->_var['lang']['type']['3']; ?></label>
                                        </div>
                                        <div class="radio-item">
                                            <input type="radio" name="msg_type" class="ui-radio" id="checkbox-buy" value="4">
                                            <label for="checkbox-buy" class="ui-radio-label"><?php echo $this->_var['lang']['type']['4']; ?></label>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>
                                <div class="item">
                                    <div class="label"><?php echo $this->_var['lang']['message_title']; ?>：</div>
                                    <div class="value">
                                        <input type="text" name="msg_title" class="text text-2">
                                        <div class="notic"></div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="label"><?php echo $this->_var['lang']['message_content']; ?>：</div>
                                    <div class="value">
                                        <textarea name="msg_content" class="textarea textarea2"></textarea>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="label">&nbsp;</div>
                                    <div class="value">
                                        <div class="value-file">
                                            <input type="button" class="sc-btn sc-redBg-btn" value="<?php echo $this->_var['lang']['Select_file']; ?>">
                                            <input type="text" name="textfield" id="textfield" class="txt">
                                            <input type="file" name="message_img" class="file" id="fileField" size="28" onchange="document.getElementById('textfield').value=this.value">
                                        </div>
                                        <span class="remind"><?php echo $this->_var['lang']['message_type_list']; ?>，附件大小不得超过<?php echo $this->_var['upload_size_limit']; ?>。</span>
                                    </div>
                                </div>
                                <div class="item item-button">
                                    <div class="label">&nbsp;</div>
                                    <div class="value">
                                        <input type="hidden" name="act" value="act_add_message" />
                                        <input type="submit" class="sc-btn sc-redBg-btn pingjia_form" value="<?php echo $this->_var['lang']['submit_goods']; ?>">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <?php if ($this->_var['message_list']): ?>
                    <div class="user-title">
                        <h2><?php echo $this->_var['lang']['label_message']; ?></h2>
                    </div>
                    <div class="user-message-list">
                        <?php $_from = $this->_var['message_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'message');$this->_foreach['message'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['message']['total'] > 0):
    foreach ($_from AS $this->_var['key'] => $this->_var['message']):
        $this->_foreach['message']['iteration']++;
?>
                        <div class="m-item <?php if (($this->_foreach['message']['iteration'] == $this->_foreach['message']['total'])): ?> last<?php endif; ?>">
                            <div class="u-ico"><img src="<?php if ($this->_var['user_id']): ?><?php if ($this->_var['user_info']['user_picture']): ?><?php echo $this->_var['user_info']['user_picture']; ?><?php else: ?>themes/<?php echo $GLOBALS['_CFG']['template']; ?>/images/touxiang.jpg<?php endif; ?><?php else: ?>themes/<?php echo $GLOBALS['_CFG']['template']; ?>/images/avatar.png<?php endif; ?>"></div>
                            <div class="ud-right">
                                <div class="m-tit">
                                    <h3><?php echo $this->_var['message']['msg_title']; ?></h3>
                                    <span>
                                        <?php if ($this->_var['message']['msg_type'] == '留言' || $this->_var['message']['msg_type'] == '投诉' || $this->_var['message']['msg_type'] == '询问' || $this->_var['message']['msg_type'] == '售后' || $this->_var['message']['msg_type'] == '求购'): ?>
                                        <?php echo $this->_var['message']['msg_type']; ?>
                                        <?php else: ?>
                                        留言
                                        <?php endif; ?>
                                    </span>
                                    <div class="fr">
                                        <a href="user.php?act=del_msg&amp;id=<?php echo $this->_var['key']; ?>&amp;order_id=<?php echo $this->_var['message']['order_id']; ?>" onclick="if (!confirm('<?php echo $this->_var['lang']['confirm_remove_msg']; ?>')) return false;" class="ftx-05 fr ml0"><?php echo $this->_var['lang']['drop']; ?></a>
                                        <em class="mr10"><?php echo $this->_var['message']['msg_time']; ?></em>
                                    </div>
                                </div>
                                <div class="txt"><?php echo $this->_var['message']['msg_content']; ?></div>
                                <?php if ($this->_var['message']['message_img']): ?>
                                <div class="fr">
                                    <a href="data/feedbackimg/<?php echo $this->_var['message']['message_img']; ?>" class="nyroModal"><?php echo $this->_var['lang']['view_upload_file']; ?></a>
                                </div>
                                <?php endif; ?>
                                <?php if ($this->_var['message']['re_msg_content']): ?>
                                <div class="txt">
                                    <a href="mailto:<?php echo $this->_var['message']['re_user_email']; ?>" target="_bank" class="ftx-03" ><?php echo $this->_var['lang']['shopman_reply']; ?></a> (<?php echo $this->_var['message']['re_msg_time']; ?>)<br />
                                    <?php echo $this->_var['message']['re_msg_content']; ?>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    </div>
                    <?php echo $this->fetch('library/pages.lbi'); ?>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
                
        
        
        <?php if ($this->_var['action'] == 'message_list'): ?>
        <div class="user-mod">
            <div class="user-title">
                <h2>意见建议</h2>
            </div>
            <div class="user-message-warp clearfix">
                <form action="user.php" method="post" enctype="multipart/form-data" name="formMsg" onSubmit="return submitMsg()">
                    <div class="user-items">
                        <?php if ($this->_var['order_info']): ?>
                        <div class="item">
                            <div class="label"><?php echo $this->_var['lang']['order_number']; ?>：</div>
                            <div class="value value-checkbox">
                                <div class="txt-lh"><a href="<?php echo $this->_var['order_info']['url']; ?>"><img src="themes/ecmoban_dsc2017/images/note.gif" style="margin-top:-3px;"/>&nbsp;&nbsp;<?php echo $this->_var['order_info']['order_sn']; ?></a></div>
                            </div>
                        </div>    
                        <input name="msg_type" type="hidden" value="5" />
                        <input name="order_id" type="hidden" value="<?php echo $this->_var['order_info']['order_id']; ?>" />
                        <?php else: ?>
                        <div class="item">
                            <div class="label"><?php echo $this->_var['lang']['message_type']; ?>：</div>
                            <div class="value">
                                <div class="radio-item">
                                    <input type="radio" checked="" name="msg_type" class="ui-radio" id="checkbox-message" value="0">
                                    <label for="checkbox-message" class="ui-radio-label"><?php echo $this->_var['lang']['type']['0']; ?></label>
                                </div>
                                <div class="radio-item">
                                    <input type="radio" name="msg_type" class="ui-radio" id="checkbox-complaint" value="1">
                                    <label for="checkbox-complaint" class="ui-radio-label"><?php echo $this->_var['lang']['type']['1']; ?></label>
                                </div>
                                <div class="radio-item">
                                    <input type="radio" name="msg_type" class="ui-radio" id="checkbox-ask" value="2">
                                    <label for="checkbox-ask" class="ui-radio-label"><?php echo $this->_var['lang']['type']['2']; ?></label>
                                </div>
                                <div class="radio-item">
                                    <input type="radio" name="msg_type" class="ui-radio" id="checkbox-customer" value="3">
                                    <label for="checkbox-customer" class="ui-radio-label"><?php echo $this->_var['lang']['type']['3']; ?></label>
                                </div>
                                <div class="radio-item">
                                    <input type="radio" name="msg_type" class="ui-radio" id="checkbox-buy" value="4">
                                    <label for="checkbox-buy" class="ui-radio-label"><?php echo $this->_var['lang']['type']['4']; ?></label>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <div class="item">
                            <div class="label"><?php echo $this->_var['lang']['message_title']; ?>：</div>
                            <div class="value">
                                <input type="text" name="msg_title" class="text text-2">
                                <div class="notic"></div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="label"><?php echo $this->_var['lang']['message_content']; ?>：</div>
                            <div class="value">
                                <textarea name="msg_content" class="textarea textarea2"></textarea>
                            </div>
                        </div>
                        <div class="item">
                            <div class="label">&nbsp;</div>
                            <div class="value">
                                <div class="value-file">
                                    <input type="button" class="sc-btn sc-redBg-btn" value="<?php echo $this->_var['lang']['Select_file']; ?>">
                                    <input type="text" name="textfield" id="textfield" class="txt">
                                    <input type="file" name="message_img" class="file" id="fileField" size="28" onchange="document.getElementById('textfield').value=this.value">
                                </div>
                                <span class="remind"><?php echo $this->_var['lang']['message_type_list']; ?>，附件大小不得超过<?php echo $this->_var['upload_size_limit']; ?>。</span>
                            </div>
                        </div>
                        <div class="item item-button">
                            <div class="label">&nbsp;</div>
                            <div class="value">
                                <input type="hidden" name="act" value="act_add_message" />
                                <input type="submit" class="sc-btn sc-redBg-btn pingjia_form" value="<?php echo $this->_var['lang']['submit_goods']; ?>">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <?php if ($this->_var['message_list']): ?>
            <div class="user-title">
                <h2><?php echo $this->_var['lang']['label_message']; ?></h2>
            </div>
            <div class="user-message-list">
                <?php $_from = $this->_var['message_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'message');$this->_foreach['message'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['message']['total'] > 0):
    foreach ($_from AS $this->_var['key'] => $this->_var['message']):
        $this->_foreach['message']['iteration']++;
?>
                <div class="m-item <?php if (($this->_foreach['message']['iteration'] == $this->_foreach['message']['total'])): ?> last<?php endif; ?>">
                    <div class="u-ico"><img src="<?php if ($this->_var['user_id']): ?><?php if ($this->_var['user_info']['user_picture']): ?><?php echo $this->_var['user_info']['user_picture']; ?><?php else: ?>themes/<?php echo $GLOBALS['_CFG']['template']; ?>/images/touxiang.jpg<?php endif; ?><?php else: ?>themes/<?php echo $GLOBALS['_CFG']['template']; ?>/images/avatar.png<?php endif; ?>"></div>
                    <div class="ud-right">
                        <div class="m-tit">
                            <h3><?php echo $this->_var['message']['msg_title']; ?></h3>
                            <span>
                                <?php if ($this->_var['message']['msg_type'] == '留言' || $this->_var['message']['msg_type'] == '投诉' || $this->_var['message']['msg_type'] == '询问' || $this->_var['message']['msg_type'] == '售后' || $this->_var['message']['msg_type'] == '求购'): ?>
                                <?php echo $this->_var['message']['msg_type']; ?>
                                <?php else: ?>
                                留言
                                <?php endif; ?>
                            </span>
                            <div class="fr">
                                <a href="user.php?act=del_msg&amp;id=<?php echo $this->_var['key']; ?>&amp;order_id=<?php echo $this->_var['message']['order_id']; ?>" onclick="if (!confirm('<?php echo $this->_var['lang']['confirm_remove_msg']; ?>')) return false;" class="ftx-05 fr ml0"><?php echo $this->_var['lang']['drop']; ?></a>
                                <em class="mr10"><?php echo $this->_var['message']['msg_time']; ?></em>
                            </div>
                        </div>
                        <div class="txt"><?php echo $this->_var['message']['msg_content']; ?></div>
                        <?php if ($this->_var['message']['message_img']): ?>
                        <div class="fr">
                            <a href="data/feedbackimg/<?php echo $this->_var['message']['message_img']; ?>" class="nyroModal"><?php echo $this->_var['lang']['view_upload_file']; ?></a>
                        </div>
                        <?php endif; ?>
                        <?php if ($this->_var['message']['re_msg_content']): ?>
                        <div class="txt">
                            <a href="mailto:<?php echo $this->_var['message']['re_user_email']; ?>" target="_bank" class="ftx-03" ><?php echo $this->_var['lang']['shopman_reply']; ?></a> (<?php echo $this->_var['message']['re_msg_time']; ?>)<br />
                            <?php echo $this->_var['message']['re_msg_content']; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </div>
            <?php echo $this->fetch('library/pages.lbi'); ?>
            <?php endif; ?>
        </div>
        <?php endif; ?>
        	
        
        
        <?php if ($this->_var['action'] == 'affiliate'): ?>
        <div class="user-mod">
            <div class="user-title">
                <h2>推荐流程及方式</h2>
            </div>
            <div class="affiliate-step-warp clearfix">
                    <div class="a-items">
                    <div class="a-item">
                            <div class="a-item-info">
                            <i class="item-icon item-icon-1"></i>
                            <span>1 会员发送推荐码</span>
                        </div>
                        <i class="iconfont icon-right"></i>
                    </div>
                    <div class="a-item">
                            <div class="a-item-info">
                            <i class="item-icon item-icon-2"></i>
                            <span>2 访问者访问平台</span>
                        </div>
                        <i class="iconfont icon-right"></i>
                    </div>
                    <div class="a-item">
                            <div class="a-item-info">
                            <i class="item-icon item-icon-3"></i>
                            <span>3 访问者注册/购买</span>
                        </div>
                        <i class="iconfont icon-right"></i>
                    </div>
                    <div class="a-item">
                            <div class="a-item-info">
                            <i class="item-icon item-icon-4"></i>
                            <span>4 会员获得佣金提成</span>
                        </div>
                    </div>
                </div>
                <div class="affiliate-mode">
                    <div class="mode-item">
                            <div class="tit mt10">
                            <span class="type">方式一</span>
                            <strong>邀请链接</strong>
                        </div>
                        <div class="cont">
                            <div class="aff-form">
                                <textarea class="aff-textarea" name="" id="affTextarea" value='<a href="<?php echo $this->_var['shopurl']; ?>?u=<?php echo $this->_var['userid']; ?>" target="_blank"><?php echo $this->_var['dwt_shop_name']; ?></a>'><?php echo $this->_var['shopurl']; ?>?u=<?php echo $this->_var['userid']; ?></textarea>
                                <div id="clip_container" class="fr relative">
                                    <a href="javascript:void(0);" class="sc-btn sc-redBg-btn" id="clip_button"><?php echo $this->_var['lang']['code_copy']; ?></a>
                                </div>
                            </div>
                            <p>把专属你的邀请链接发给你的好友，好友打开此接接后系统会默认输入你的邀请码</p>
                        </div>
                    </div>
                    <!--<div class="mode-item">
                            <div class="tit mt20">
                            <span class="type">方式二</span>
                            <strong>分享到</strong>
                        </div>
                        <div class="cont">
                            <div class="c-item">
                                    <i class="c-item-i c-item-i-1"></i>
                                <span>朋友圈</span>
                            </div>
                            <div class="c-item">
                                    <i class="c-item-i c-item-i-2"></i>
                                <span>QQ好友</span>
                            </div>
                            <div class="c-item">
                                    <i class="c-item-i c-item-i-3"></i>
                                <span>新浪微博</span>
                            </div>
                            <div class="c-item">
                                    <i class="c-item-i c-item-i-4"></i>
                                <span>QQ空间</span>
                            </div>
                            <div class="c-item">
                                    <i class="c-item-i c-item-i-5"></i>
                                <span>微信好友</span>
                            </div>
                        </div>
                    </div>-->
                </div>
            </div>
            <div class="user-title">
                <h2><?php echo $this->_var['lang']['affiliate_member']; ?></h2>
            </div>
            <div class="affiliate-list-warp clearfix">
                    <table class="user-table user-table-baitiao">
                    <colgroup>
                        <col width="214">
                        <col width="214">
                        <col width="214">
                        <col>
                    </colgroup>
                    <thead>
                        <tr>
                            <th class="tc"><?php echo $this->_var['lang']['affiliate_lever']; ?></th>
                            <th><?php echo $this->_var['lang']['affiliate_num']; ?></th>
                            <th><?php echo $this->_var['lang']['level_point']; ?>（%）</th>
                            <th><?php echo $this->_var['lang']['level_money']; ?>（%）</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $_from = $this->_var['affdb']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('level', 'val');$this->_foreach['affdb'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['affdb']['total'] > 0):
    foreach ($_from AS $this->_var['level'] => $this->_var['val']):
        $this->_foreach['affdb']['iteration']++;
?>
                        <tr>
                            <td class="tc"><?php echo $this->_var['level']; ?></td>
                            <td class="tc"><?php echo $this->_var['val']['num']; ?></td>
                            <td class="tc"><?php echo $this->_var['val']['point']; ?></td>
                            <td class="tc"><?php echo $this->_var['val']['money']; ?></td>
                        </tr>
                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    </tbody>
                </table>
            </div>
            <?php if ($this->_var['logdb']): ?>
            <div class="user-title">
                <h2><?php echo $this->_var['lang']['Split_rule']; ?></h2>
            </div>
            <div class="affiliate-list-warp clearfix">
                    <table class="user-table user-table-baitiao">
                    <colgroup>
                        <col width="214">
                        <col width="214">
                        <col width="214">
                        <col>
                    </colgroup>
                    <thead>
                        <tr>
                            <th class="tc"><?php echo $this->_var['lang']['order_number']; ?></th>
                            <th><?php echo $this->_var['lang']['affiliate_money']; ?></th>
                            <th><?php echo $this->_var['lang']['affiliate_point']; ?></th>
                            <th><?php echo $this->_var['lang']['affiliate_mode']; ?></th>
                            <th><?php echo $this->_var['lang']['affiliate_status']; ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $_from = $this->_var['logdb']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'val');$this->_foreach['logdb'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['logdb']['total'] > 0):
    foreach ($_from AS $this->_var['val']):
        $this->_foreach['logdb']['iteration']++;
?>
                        <tr>
                            <td class="tc"><?php echo $this->_var['val']['order_sn']; ?></td>
                            <td class="tc"><?php echo $this->_var['val']['money']; ?></td>
                            <td class="tc"><?php echo $this->_var['val']['point']; ?></td>
                            <td class="tc"><?php if ($this->_var['val']['separate_type'] == 1 || $this->_var['val']['separate_type'] === 0): ?><?php echo $this->_var['lang']['affiliate_type'][$this->_var['val']['separate_type']]; ?><?php else: ?><?php echo $this->_var['lang']['affiliate_type'][$this->_var['affiliate_type']]; ?><?php endif; ?></td>
                            <td class="tc"><?php echo $this->_var['lang']['affiliate_stats'][$this->_var['val']['is_separate']]; ?></td>
                        </tr>
                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    </tbody>
                </table>
            </div>
            <?php echo $this->fetch('library/pages.lbi'); ?>
            <?php endif; ?>
        </div>			
        <?php endif; ?>
        	
        
        
        <?php if ($this->_var['action'] == 'comment_list'): ?>
        <div class="user-mod">
            <div class="user-title">
                <h2><?php echo $this->_var['lang']['comment_list']; ?></h2>
                <ul class="tabs">
                    <li <?php if ($this->_var['sign'] == 0): ?>class="active"<?php endif; ?>><a href="user.php?act=comment_list"><?php echo $this->_var['lang']['stay_evaluate_goods']; ?>(<?php echo $this->_var['signNum0']; ?>)</a></li>
                    <li <?php if ($this->_var['sign'] == 1): ?>class="active"<?php endif; ?>><a href="user.php?act=comment_list&sign=1"><?php echo $this->_var['lang']['stay_add_file']; ?>(<?php echo $this->_var['signNum1']; ?>)</a></li>
                    <li <?php if ($this->_var['sign'] == 2): ?>class="active"<?php endif; ?>><a href="user.php?act=comment_list&sign=2"><?php echo $this->_var['lang']['Already_evaluated']; ?>(<?php echo $this->_var['signNum2']; ?>)</a></li>
                </ul>
            </div>
            <div class="comment-list-warp clearfix">
                <div class="user-order-list">
                    <?php if ($this->_var['comment_list']): ?>
                    <?php $_from = $this->_var['comment_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');$this->_foreach['foo'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['foo']['total'] > 0):
    foreach ($_from AS $this->_var['item']):
        $this->_foreach['foo']['iteration']++;
?>
                    <dl class="item">
                        <dt class="item-t">
                        <div class="t-statu"><?php if ($this->_var['sign'] == 0): ?><?php echo $this->_var['lang']['comment_not']; ?><?php elseif ($this->_var['sign'] == 1): ?><?php echo $this->_var['lang']['stay_add_file']; ?><?php else: ?><?php echo $this->_var['lang']['Already_evaluated']; ?><?php endif; ?></div>
                        <div class="t-info">
                            <span class="info-item"><?php echo $this->_var['lang']['order_number']; ?>：<?php echo $this->_var['item']['order_sn']; ?></span>
                            <span class="info-item"><?php echo $this->_var['item']['add_time']; ?></span>
                            <span class="info-item"></span>
                        </div>
                        <div class="t-price"><?php echo $this->_var['item']['goods_price']; ?></div>
                        </dt>
                        <dd class="item-c">
                            <div class="c-left">
                                <div class="c-goods">
                                    <div class="c-img"><a href="<?php echo $this->_var['item']['goods_url']; ?>" target="_blank" title="<?php echo $this->_var['item']['goods_name']; ?>"><img src="<?php echo $this->_var['item']['goods_thumb']; ?>" alt=""></a></div>
                                    <div class="c-info">
                                        <div class="info-name"><a href="<?php echo $this->_var['item']['goods_url']; ?>" target="_blank" title="<?php echo $this->_var['item']['goods_name']; ?>"><?php echo $this->_var['item']['goods_name']; ?></a></div>
                                        <div class="info-price"><b><?php echo $this->_var['item']['goods_price']; ?></b><i>×</i><span><?php echo $this->_var['item']['goods_number']; ?></span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="c-handle">
                                <a href="javascript:void(0);" class="sc-btn" ectype="btn-comment" data-foot="<?php if ($this->_var['item']['comment']['comment_id'] > 0 && $this->_var['item']['comment']['img_list']): ?>false<?php else: ?>true<?php endif; ?>" data-recid="<?php echo $this->_var['item']['rec_id']; ?>" data-sign="<?php echo $this->_var['sign']; ?>"><?php if ($this->_var['sign'] == 0): ?><?php echo $this->_var['lang']['Click_review']; ?><?php elseif ($this->_var['sign'] == 1): ?><?php echo $this->_var['lang']['Continue_bask_single']; ?><?php else: ?><?php echo $this->_var['lang']['comment_see']; ?><?php endif; ?></a>
                                <a href="user.php?act=order_detail&order_id=<?php echo $this->_var['item']['order_id']; ?>" target="_blank" class="sc-btn"><?php echo $this->_var['lang']['order_detail']; ?></a>
                            </div>
                        </dd>
                    </dl>
                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    <script type="text/javascript">
                       <?php $_from = $this->_var['lang']['cmt_lang']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
                       var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
                       <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                            
                       <?php if ($this->_var['sign'] == 0): ?>
                       $("input[name='comment_rank']").val(0);
                       <?php endif; ?>
                    </script>
                    <?php else: ?>
                    <div class="no_records">
                        <i class="no_icon_two"></i>
                        <div class="no_info no_info_line">
                            <?php if ($_GET['sign'] == 0): ?>
                                <h3><?php 
$k = array (
  'name' => 'get_page_no_records',
  'filename' => $this->_var['filename'],
  'act' => 'comment_list_0',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?></h3>
                                <div class="no_btn"><a href="index.php" class="sc-btn">去逛商城</a></div>
                            <?php elseif ($_GET['sign'] == 1): ?>
                                <h3><?php 
$k = array (
  'name' => 'get_page_no_records',
  'filename' => $this->_var['filename'],
  'act' => 'comment_list_1',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?></h3>
                                <div class="no_btn"><a href="user.php?act=comment_list" class="sc-btn">全部评价/晒单</a></div>
                            <?php elseif ($_GET['sign'] == 2): ?>
                                <h3><?php 
$k = array (
  'name' => 'get_page_no_records',
  'filename' => $this->_var['filename'],
  'act' => 'comment_list_2',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?></h3>
                                <div class="no_btn"><a href="user.php?act=comment_list" class="sc-btn">全部评价/晒单</a></div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
                <?php if ($this->_var['comment_list']): ?>
                    <?php echo $this->fetch('library/pages.lbi'); ?>
                <?php endif; ?>
            </div>
        </div>			
        <?php endif; ?>
        
        
        
        <?php if ($this->_var['action'] == 'commented_view'): ?>
        <div class="user-mod">
            <div class="user-title">
                <h2><?php echo $this->_var['lang']['comment_list']; ?></h2>
            </div>
            <div class="comment-list-warp clearfix">
                <div class="user-order-list">
                    <?php if ($this->_var['order_goods']): ?>
                    <?php $_from = $this->_var['order_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                    <dl class="item">
                        <dt class="item-t">
                        <div class="t-statu"><?php if ($this->_var['sign'] == 0): ?><?php echo $this->_var['lang']['comment_not']; ?><?php elseif ($this->_var['sign'] == 1): ?><?php echo $this->_var['lang']['stay_add_file']; ?><?php else: ?><?php echo $this->_var['lang']['Already_evaluated']; ?><?php endif; ?></div>
                        <div class="t-info">
                            <span class="info-item"><?php echo $this->_var['lang']['order_number']; ?>：<?php echo $this->_var['item']['order_sn']; ?></span>
                            <span class="info-item"><?php echo $this->_var['item']['add_time']; ?></span>
                            <span class="info-item"></span>
                        </div>
                        <div class="t-price"><?php echo $this->_var['item']['goods_price']; ?></div>
                        </dt>
                        <dd class="item-c">
                            <div class="c-left">
                                <div class="c-goods">
                                    <div class="c-img"><a href="goods.php?id=<?php echo $this->_var['item']['goods_id']; ?>" target="_blank" title="<?php echo $this->_var['item']['goods_name']; ?>"><img src="<?php echo $this->_var['item']['goods_thumb']; ?>" alt=""></a></div>
                                    <div class="c-info">
                                        <div class="info-name"><a href="goods.php?id=<?php echo $this->_var['item']['goods_id']; ?>" target="_blank" title="<?php echo $this->_var['item']['goods_name']; ?>"><?php echo $this->_var['item']['goods_name']; ?></a></div>
                                        <div class="info-price"><b><?php echo $this->_var['item']['goods_price']; ?></b><i>×</i><span><?php echo $this->_var['item']['goods_number']; ?></span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="c-handle">
                                <a href="javascript:void(0);" class="sc-btn" ectype="btn-comment" data-foot="<?php if ($this->_var['item']['comment']['comment_id'] > 0 && $this->_var['item']['comment']['img_list']): ?>false<?php else: ?>true<?php endif; ?>" data-recid="<?php echo $this->_var['item']['rec_id']; ?>" data-sign="<?php echo $this->_var['sign']; ?>">
                                    <?php if ($this->_var['item']['comment']['comment_id'] > 0): ?>
                                    <?php if ($this->_var['item']['comment']['img_list']): ?><?php echo $this->_var['lang']['comment_see']; ?><?php else: ?><?php echo $this->_var['lang']['comment_again']; ?><?php endif; ?>
                                    <?php else: ?>
                                    <?php echo $this->_var['lang']['comment_add']; ?>
                                    <?php endif; ?>
                                </a>
                                <a href="user.php?act=order_detail&order_id=<?php echo $this->_var['item']['order_id']; ?>" target="_blank" class="sc-btn"><?php echo $this->_var['lang']['order_detail']; ?></a>
                            </div>
                        </dd>
                    </dl>
                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    <script type="text/javascript">
                       <?php $_from = $this->_var['lang']['cmt_lang']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
                       var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
                       <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                       
                       <?php if ($this->_var['sign'] == 0): ?>
                       $("input[name='comment_rank']").val(0);
                       <?php endif; ?>
                    </script>
                    <?php else: ?>
                    
                    <div class="no_records">
                        <i class="no_icon_two"></i>
                        <div class="no_info">
                            <h3><?php echo $this->_var['lang']['order_Prompt']; ?></h3>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
                <?php if ($this->_var['shop_info']['ru_id'] > 0): ?>
                <div class="votelist">
                    <div class="title"><?php echo $this->_var['lang']['Satisfaction_evaluation']; ?></div>
                    <div class="votelist-content">
                        <div class="service-lcol">
                            <div class="service-lcol-cont">
                                <div class="shopper-img"><a href="<?php echo $this->_var['merch_cmt']['store_url']; ?>"><img width="100" height="100" src="<?php echo $this->_var['shop_info']['logo_thumb']; ?>" alt=""></a></div>
                                <div class="shopper-info">
                                    <div class="shopper-msg">
                                        <h3><?php echo $this->_var['shop_info']['shop_name']; ?>
                                            <?php if ($this->_var['shop_information']['is_IM'] == 1 || $this->_var['shop_information']['is_dsc']): ?>
                                            <a id="IM" onclick="openWin(this)" href="javascript:;" goods_id="<?php echo $this->_var['goods']['goods_id']; ?>" class="p-kefu"><i class="iconfont icon-kefu"></i></a>
                                            <?php else: ?>
                                            <?php if ($this->_var['basic_info']['kf_type'] == 1): ?>
                                            <a href="http://www.taobao.com/webww/ww.php?ver=3&touid=<?php echo $this->_var['basic_info']['kf_ww']; ?>&siteid=cntaobao&status=1&charset=utf-8" class="p-kefu" target="_blank"><i class="iconfont icon-kefu"></i></a>
                                            <?php else: ?>
                                            <a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $this->_var['basic_info']['kf_qq']; ?>&site=qq&menu=yes" class="p-kefu" target="_blank"><i class="iconfont icon-kefu"></i></a>
                                            <?php endif; ?>
                                            <?php endif; ?>
                                        </h3>    
                                        <p><?php echo $this->_var['lang']['phone']; ?>：<?php if ($this->_var['shop_info']['kf_tel']): ?><?php echo $this->_var['shop_info']['kf_tel']; ?><?php else: ?><?php echo $this->_var['lang']['No_comment']; ?><?php endif; ?></p>
                                    </div>
                                    <div class="shopper-name">
                                        <div class="item">
                                            <strong>综合</strong>
                                            <span><?php echo $this->_var['merch_cmt']['cmt']['all_zconments']['score']; ?></span>
                                        </div>
                                        <div class="item">
                                            <span>商品</span>
                                            <span><?php echo $this->_var['merch_cmt']['cmt']['commentRank']['zconments']['score']; ?></span>
                                        </div>
                                        <div class="item">
                                            <span>服务</span>
                                            <span><?php echo $this->_var['merch_cmt']['cmt']['commentServer']['zconments']['score']; ?></span>
                                        </div>
                                        <div class="item">
                                            <span>发货</span>
                                            <span><?php echo $this->_var['merch_cmt']['cmt']['commentDelivery']['zconments']['score']; ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="service-rcol">
                        <?php if ($this->_var['degree_count'] == 0): ?>
                        <div class="score">
                            <dl class="ev-list">
                                <dt><em>*</em><?php echo $this->_var['lang']['product_desc']; ?></dt>
                                <dd ectype="rates">
                                    <span class="commstar" ectype="p_rate">
                                        <a href="javascript:;" data-value="1" class="star1"></a>
                                        <a href="javascript:;" data-value="2" class="star2"></a>
                                        <a href="javascript:;" data-value="3" class="star3"></a>
                                        <a href="javascript:;" data-value="4" class="star4"></a>
                                        <a href="javascript:;" data-value="5" class="star5"></a>
                                    </span>
                                    <input type="hidden" name="desc_rank" value="0">
                                    <span class="degree-text" style="display: none;"><em ectype="number">0</em>分</span>
                                    <span class="comt-error" style="display: none;"><?php echo $this->_var['lang']['Please_rate']; ?></span>
                                </dd>
                            </dl>
                            <dl class="ev-list">
                                <dt><em>*</em><?php echo $this->_var['lang']['seller_fwtd']; ?></dt>
                                <dd ectype="rates">
                                    <span class="commstar" ectype="p_rate">
                                        <a href="javascript:;" data-value="1" class="star1"></a>
                                        <a href="javascript:;" data-value="2" class="star2"></a>
                                        <a href="javascript:;" data-value="3" class="star3"></a>
                                        <a href="javascript:;" data-value="4" class="star4"></a>
                                        <a href="javascript:;" data-value="5" class="star5"></a>
                                    </span>
                                    <input type="hidden" name="service_rank" value="0">
                                    <span class="degree-text" style="display: none;"><em ectype="number">0</em>分</span>
                                    <span class="comt-error" style="display: none;"><?php echo $this->_var['lang']['Please_rate']; ?></span>
                                </dd>
                            </dl>
                            <dl class="ev-list">
                                <dt><em>*</em><?php echo $this->_var['lang']['logistics_speed']; ?></dt>
                                <dd ectype="rates">
                                    <span class="commstar" ectype="p_rate">
                                        <a href="javascript:;" data-value="1" class="star1"></a>
                                        <a href="javascript:;" data-value="2" class="star2"></a>
                                        <a href="javascript:;" data-value="3" class="star3"></a>
                                        <a href="javascript:;" data-value="4" class="star4"></a>
                                        <a href="javascript:;" data-value="5" class="star5"></a>
                                    </span>
                                    <input type="hidden" name="delivery_rank" value="0">
                                    <span class="degree-text" style="display: none;"><em ectype="number">0</em>分</span>
                                    <span class="comt-error" style="display: none;"><?php echo $this->_var['lang']['Please_rate']; ?></span>
                                </dd>
                            </dl>
                            <dl class="ev-list">
                                <dt><em>*</em><?php echo $this->_var['lang']['logistics_senders']; ?></dt>
                                <dd ectype="rates">
                                    <span class="commstar" ectype="p_rate">
                                        <a href="javascript:;" data-value="1" class="star1"></a>
                                        <a href="javascript:;" data-value="2" class="star2"></a>
                                        <a href="javascript:;" data-value="3" class="star3"></a>
                                        <a href="javascript:;" data-value="4" class="star4"></a>
                                        <a href="javascript:;" data-value="5" class="star5"></a>
                                    </span>
                                    <input type="hidden" name="sender_rank" value="0">
                                    <span class="degree-text" style="display: none;"><em ectype="number">0</em>分</span>
                                    <span class="comt-error" style="display: none;"><?php echo $this->_var['lang']['Please_rate']; ?></span>
                                </dd>
                            </dl>
                            <div class="op-btn"><a href="javascript:void(0);" class="sc-btn sc-redBg-btn" ectype="storeRateBtn" data-orderid="<?php echo $this->_var['order_id']; ?>"><?php echo $this->_var['lang']['submit_goods']; ?></a></div>
                        </div>
                        <?php else: ?>
                        <h3><s class="icon-02"></s><span><?php echo $this->_var['lang']['comments_think']; ?></span></h3>
                        <?php endif; ?>
                    </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>            
        <?php endif; ?>
        

        
        <?php if ($this->_var['action'] == 'take_list'): ?>
        <div class="user-mod">
            <div class="user-title">
                <h2><?php echo $this->_var['lang']['take_list']; ?></h2>
            </div>
            <div class="take-list-warp clearfix">
                <?php if ($this->_var['take_list']): ?>
                <?php $_from = $this->_var['take_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'take');if (count($_from)):
    foreach ($_from AS $this->_var['take']):
?>
                <div class="tl-item">
                    <div class="item-t">
                            <div class="t-goods">
                            <div class="t-img"><a href="goods.php?id=<?php echo $this->_var['take']['goods_id']; ?>" target="_blank"><img src="<?php if ($this->_var['take']['goods_thumb']): ?><?php echo $this->_var['take']['goods_thumb']; ?><?php endif; ?>"></a></div>
                            <div class="t-info">
                                <div class="info-name"><a href="goods.php?id=<?php echo $this->_var['take']['goods_id']; ?>" class="ftx-03" target="_blank"><?php echo $this->_var['take']['goods_name']; ?></a></div>
                                <div class="info-sku"><?php echo $this->_var['lang']['card_number_label']; ?>：<?php echo $this->_var['take']['gift_sn']; ?></div>
                            </div>
                        </div>
                        <div class="t-statu"><?php if ($this->_var['take']['status'] == 1): ?><?php echo $this->_var['lang']['cs']['101']; ?><?php elseif ($this->_var['take']['status'] == 2): ?><a onclick="if (confirm('<?php echo $this->_var['lang']['confirm_received']; ?>'))location.href='user.php?act=confim_goods&take_id=<?php echo $this->_var['take']['gift_gard_id']; ?>'" class="sc-btn">确认收货</a><?php else: ?>完成<?php endif; ?></div>
                    </div>
                    <div class="item-f">
                        <div class="f-left"><?php echo $this->_var['lang']['gift_address']; ?>：<?php echo $this->_var['take']['address']; ?></div>
                        <div class="f-right"><?php echo $this->_var['take']['user_time']; ?></div>
                    </div>
                </div>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                <?php else: ?>
                <div class="no_records">
                    <i class="no_icon_two"></i>
                    <div class="no_info">
                        <h3><?php 
$k = array (
  'name' => 'get_page_no_records',
  'filename' => $this->_var['filename'],
  'act' => $this->_var['action'],
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?></h3>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>			
        <?php endif; ?>	
        
        
        
        <?php if ($this->_var['action'] == 'complaint_list'): ?>
        <div class="user-mod">
            <div class="user-title">
                <h2><?php echo $this->_var['lang']['transaction_disputes']; ?></h2>
                <ul class="tabs" ectype="dispute-tabs">
                    <li <?php if ($this->_var['is_complaint'] == 0): ?>class="active"<?php endif; ?>><a href="user.php?act=complaint_list"><?php echo $this->_var['lang']['may_apply_order']; ?></a></li>
                    <li <?php if ($this->_var['is_complaint'] == 1): ?>class="active"<?php endif; ?>><a href="user.php?act=complaint_list&is_complaint=1"><?php echo $this->_var['lang']['already_apply_order']; ?></a></li>
                </ul>
            </div>
            <div class="dispute-content" ectype="dispute-content">
                <div class="user-order-list user-dispute-list">
				<?php $_from = $this->_var['orders']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'order');if (count($_from)):
    foreach ($_from AS $this->_var['order']):
?>
                    <dl class="item">
                        <dt class="item-t">
						<?php if ($this->_var['is_complaint'] == 1): ?><div class="t-statu"><?php echo $this->_var['lang']['complaint_state'][$this->_var['order']['complaint_state']]; ?><?php if ($this->_var['order']['has_talk'] == 1): ?><span class="red">--未读信息</span><?php endif; ?></div><?php endif; ?>
                            <div class="t-info">
                                <span class="info-item"><?php echo $this->_var['lang']['order_number']; ?>：<?php echo $this->_var['order']['order_sn']; ?></span>
                                <span class="info-item"><?php echo $this->_var['order']['order_time']; ?></span>
                                <span class="info-item"><?php echo $this->_var['order']['consignee']; ?></span>
                                <span class="info-item">
                                    <a href="<?php echo $this->_var['order']['shop_url']; ?>" class="user-shop-link"><?php echo $this->_var['order']['shop_name']; ?></a>
                                    <?php if ($this->_var['order']['is_IM'] == 1 || $this->_var['order']['is_dsc']): ?>
									<a id="IM" onclick="openWin(this)" href="javascript:;" ru_id="<?php echo $this->_var['order']['ru_id']; ?>"  class="iconfont icon-kefu user-shop-kefu"></a>
									<?php else: ?>
									<?php if ($this->_var['order']['kf_type'] == 1): ?>
									<a href="http://www.taobao.com/webww/ww.php?ver=3&touid=<?php echo $this->_var['order']['kf_ww']; ?>&siteid=cntaobao&status=1&charset=utf-8" class="iconfont icon-kefu user-shop-kefu" target="_blank"></a>
									<?php else: ?>
									<a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $this->_var['order']['kf_qq']; ?>&site=qq&menu=yes" class="iconfont icon-kefu user-shop-kefu" target="_blank"></a>
									<?php endif; ?>
									<?php endif; ?>
                                </span>
                            </div>
							<div class="t-price"><?php echo $this->_var['order']['total_fee']; ?></div>
                        </dt>
                        <dd class="item-c">
                            <div class="c-left">
								<?php $_from = $this->_var['order']['order_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['foo'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['foo']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['foo']['iteration']++;
?>
                                <div class="c-goods">
									<div class="c-img"><a href="<?php echo $this->_var['goods']['url']; ?>"><img src="<?php if ($this->_var['goods']['goods_thumb']): ?><?php echo $this->_var['goods']['goods_thumb']; ?><?php else: ?><?php echo $this->_var['order']['no_picture']; ?><?php endif; ?>" alt=""></a></div>
									
                                    <div class="c-info">
										<div class="o-info-lm">
											<?php if ($this->_var['goods']['extension_code'] == 'package_buy'): ?>
											<?php echo sub_str($this->_var['goods']['goods_name'],30); ?>
											<span class="red"><?php echo $this->_var['lang']['remark_package']; ?></span>
											<?php else: ?>
											<a href="<?php echo $this->_var['goods']['url']; ?>" class="info-name" target="_blank" title="<?php echo $this->_var['goods']['goods_name']; ?>"><?php echo $this->_var['goods']['goods_name']; ?></a>
											<?php if ($this->_var['goods']['trade_id']): ?><a href="user.php?act=trade&tradeId=<?php echo $this->_var['goods']['trade_id']; ?>&snapshot=true" class="trade_snapshot" target="_blank">[<?php echo $this->_var['lang']['trade_snapshot']; ?>]</a><?php endif; ?>
											<?php endif; ?>
										</div>
										<div class="info-price"><b><?php echo $this->_var['goods']['goods_price']; ?></b><i>×</i><span><?php echo $this->_var['goods']['goods_number']; ?></span></div>
									</div>
                                </div>
								<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                            </div>
                            <div class="c-handle">
								<?php if ($this->_var['is_complaint'] == 0): ?>
                                <a href="user.php?act=complaint_apply&order_id=<?php echo $this->_var['order']['order_id']; ?>" class="sc-btn">申请交易纠纷</a>
								<?php else: ?>
								<a href="user.php?act=complaint_apply&complaint_id=<?php echo $this->_var['order']['is_complaint']; ?>" class="sc-btn">查看详情</a>
								<?php if ($this->_var['order']['complaint_state'] == 4): ?>
								<a href="javascript:void();" ectype="del_compalint" data-id="<?php echo $this->_var['order']['is_complaint']; ?>" class="sc-btn">删除</a>
								<?php endif; ?>
								<?php endif; ?>
							</div>
                        </dd>
                    </dl>
					<?php endforeach; else: ?>
					<div class="no_records">
						<i class="no_icon"></i>
						<div class="no_info">
							<h3>
								<?php echo $this->_var['no_records']; ?>
							</h3>
						</div>
					</div>
					<?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
                </div>
                <?php echo $this->fetch('library/pages.lbi'); ?>
            </div> 
        </div>
		<script type="text/javascript">
		 $("*[ectype='del_compalint']").on("click", function () {
			 var _this = $(this);
			 var id = _this.data("id");
			 if(confirm("确定删除吗？")){
				 Ajax.call('ajax_user.php?act=del_compalint', 'compalint_id=' + id, function(data){
					 if(data.error == 1){
						pbDialog(data.message,"",0);
					 }else{
						_this.parents(".item").remove();
					 }
				 }, 'POST', 'JSON');
			 }
		 })     
		</script>
        <?php endif; ?>
        
		
        
        <?php if ($this->_var['action'] == 'complaint_apply'): ?>
		<div class="user-mod">
            <div class="user-title">
                <h2><?php echo $this->_var['lang']['apply_disputes_order']; ?></h2>
            </div>
			<?php if ($this->_var['complaint_id'] != 0): ?>
			<div class="view-dis-order">
                <div class="ii-section iis-state">
                    <div class="stepflex">
                        <dl class="first active"><dt></dt><dd><?php echo $this->_var['lang']['complaint_state']['0']; ?></dd></dl>
                        <dl <?php if ($this->_var['complaint_info']['complaint_state'] > 0): ?>class="active"<?php endif; ?>><dt></dt><dd><?php echo $this->_var['lang']['complaint_state']['1']; ?></dd></dl>
                        <dl <?php if ($this->_var['complaint_info']['complaint_state'] > 1): ?>class="active"<?php endif; ?>><dt></dt><dd><?php echo $this->_var['lang']['complaint_state']['2']; ?></dd></dl>
						<dl <?php if ($this->_var['complaint_info']['complaint_state'] > 2): ?>class="active"<?php endif; ?>><dt></dt><dd><?php echo $this->_var['lang']['complaint_state']['3']; ?></dd></dl>
                        <dl class="last <?php if ($this->_var['complaint_info']['complaint_state'] == 4): ?>active<?php endif; ?>"><dt></dt><dd><?php echo $this->_var['lang']['complaint_state']['4']; ?></dd></dl>
                    </div>
					<?php if ($this->_var['complaint_info']['complaint_state'] != 4): ?>
                    <div class="iis-state-warp">
                        <i class="icon icon-iis-1"></i>
                        <div class="iis-state-info">
                            <div class="tit">您的纠纷单已提交，等待管理员处理。</div>
                            <div class="iis-btn">
                                <a href="user.php?act=arbitration&complaint_id=<?php echo $this->_var['complaint_id']; ?>&complaint_state=4" class="sc-btn">问题已解决</a>
                                <a href="user.php?act=complaint_apply&complaint_id=<?php echo $this->_var['complaint_id']; ?>" class="sc-btn">更新纠纷详情</a>
                            </div>
                        </div>
                    </div>
					<?php endif; ?>
                </div>
			</div>
			<?php endif; ?>
            <div class="dis-order-apply">
                <div class="user-order-list">
                    <dl class="item">
                        <dt class="item-t">
                            <div class="t-info">
                                <span class="info-item"><?php echo $this->_var['lang']['order_number']; ?>：<?php echo $this->_var['order']['order_sn']; ?></span>
                                <span class="info-item"><?php echo $this->_var['order']['order_time']; ?></span>
                                <span class="info-item"><?php echo $this->_var['order']['consignee']; ?></span>
                                <span class="info-item">
                                    <a href="<?php echo $this->_var['order']['shop_url']; ?>" class="user-shop-link"><?php echo $this->_var['order']['shop_name']; ?></a>
                                    <?php if ($this->_var['order']['is_IM'] == 1 || $this->_var['order']['is_dsc']): ?>
									<a id="IM" onclick="openWin(this)" href="javascript:;" ru_id="<?php echo $this->_var['order']['ru_id']; ?>"  class="iconfont icon-kefu user-shop-kefu"></a>
									<?php else: ?>
									<?php if ($this->_var['order']['kf_type'] == 1): ?>
									<a href="http://www.taobao.com/webww/ww.php?ver=3&touid=<?php echo $this->_var['order']['kf_ww']; ?>&siteid=cntaobao&status=1&charset=utf-8" class="iconfont icon-kefu user-shop-kefu" target="_blank"></a>
									<?php else: ?>
									<a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $this->_var['order']['kf_qq']; ?>&site=qq&menu=yes" class="iconfont icon-kefu user-shop-kefu" target="_blank"></a>
									<?php endif; ?>
									<?php endif; ?>
                                </span>
                            </div>
							<div class="t-price"><?php echo $this->_var['order']['total_fee']; ?></div>
                        </dt>
                        <dd class="item-c">
                            <div class="c-left">
								<?php $_from = $this->_var['order']['order_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['foo'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['foo']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['foo']['iteration']++;
?>
                                <div class="c-goods">
									<div class="c-img"><a href="<?php echo $this->_var['goods']['url']; ?>"><img src="<?php if ($this->_var['goods']['goods_thumb']): ?><?php echo $this->_var['goods']['goods_thumb']; ?><?php else: ?><?php echo $this->_var['order']['no_picture']; ?><?php endif; ?>" alt=""></a></div>
                                    <div class="c-info">
										<div class="o-info-lm">
											<?php if ($this->_var['goods']['extension_code'] == 'package_buy'): ?>
											<?php echo sub_str($this->_var['goods']['goods_name'],30); ?>
											<span class="red"><?php echo $this->_var['lang']['remark_package']; ?></span>
											<?php else: ?>
											<a href="<?php echo $this->_var['goods']['url']; ?>" class="info-name" target="_blank" title="<?php echo $this->_var['goods']['goods_name']; ?>"><?php echo $this->_var['goods']['goods_name']; ?></a>
											<?php if ($this->_var['goods']['trade_id']): ?><a href="user.php?act=trade&tradeId=<?php echo $this->_var['goods']['trade_id']; ?>&snapshot=true" class="trade_snapshot" target="_blank">[<?php echo $this->_var['lang']['trade_snapshot']; ?>]</a><?php endif; ?>
											<?php endif; ?>
										</div>
										<div class="info-price"><b><?php echo $this->_var['goods']['goods_price']; ?></b><i>×</i><span><?php echo $this->_var['goods']['goods_number']; ?></span></div>
									</div>
                                </div>
								<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                            </div>
                        </dd>
                    </dl>
                </div>
                <div class="ii-section complaint_apply">
				<form action="user.php" method="post" enctype="multipart/form-data" name="formMsg" id="reportForm" >
                    <div class="user-title">
                    	<?php if ($this->_var['complaint_info']['complaint_state'] > 1): ?>
                        <h2><?php echo $this->_var['lang']['appeal_info']; ?></h2>
                        <?php else: ?>
                        <h2><?php echo $this->_var['lang']['complaint_info']; ?></h2>
                        <?php endif; ?>
                    </div>
                    <div class="user-items">
                        <div class="item">
                            <div class="label"><?php if ($this->_var['complaint_id'] == 0): ?><em class="red">*</em><?php endif; ?><?php echo $this->_var['lang']['complaint_title']; ?>：</div>
                            <div class="value">
                            <?php if ($this->_var['complaint_id'] == 0): ?>
                                <div class="imitate_select w200">
                                    <div class="cite"><span><?php echo $this->_var['lang']['please_select']; ?></span><i class="iconfont icon-down"></i></div>
                                    <ul>
                                        <li><a href="javascript:void(0);" data-value="0" ectype='check_title'><?php echo $this->_var['lang']['please_select']; ?></a></li>
                                        <?php $_from = $this->_var['complaint_title']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'title');if (count($_from)):
    foreach ($_from AS $this->_var['title']):
?>
                                        <li><a href="javascript:void(0);" data-value="<?php echo $this->_var['title']['title_id']; ?>" ectype='check_title'><?php echo $this->_var['title']['title_name']; ?></a></li>
                                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                    </ul>
                                    <input type="hidden" name='title_id' value='0'>
                                </div>
                                <span class="form_prompt ml10"><?php echo $this->_var['lang']['complaint_title_null']; ?></span>
                            <?php else: ?>
                            	<span class="txt-lh ftx-07"><?php echo $this->_var['complaint_info']['title_name']; ?></span>
                            <?php endif; ?>
                            </div>
                        </div>
                        <div class="item">
                            <div class="label"><?php if ($this->_var['complaint_id'] == 0): ?><em class="red">*</em><?php endif; ?><?php echo $this->_var['lang']['problem_desc']; ?>：</div>
                            <div class="value">
                                <?php if ($this->_var['complaint_id'] == 0): ?>
                                <textarea name="complaint_content" class="textarea"></textarea>
                                <div class="form_prompt"></div>
                                <div class="fl red lh20 mt10">尊敬的用户，为了更好的解决您的问题，请您在问题描述中反馈具体纠纷问题，并上传相关证据图片，避免上传外部链接等内容，以免耽误您的纠纷处理。</div>
                                <?php else: ?>
                                <span class="txt-lh ftx-07"><?php echo $this->_var['complaint_info']['complaint_content']; ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="item">
                            <div class="label"><?php echo $this->_var['lang']['evidence_upload']; ?>：</div>
                            <div class="value">
                            <?php if ($this->_var['complaint_id'] == 0): ?>
                                <div class="sc-btn fl" id="uploadbutton"><?php echo $this->_var['lang']['upload_img']; ?></div>
                            <?php endif; ?>
                                <div class="upload-img-box">
                                    <div class="img-lists">
                                        <ul class="img-list-ul" ectype="imglist">
                                            <?php if ($this->_var['img_list']): ?>
                                            <?php $_from = $this->_var['img_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'list');if (count($_from)):
    foreach ($_from AS $this->_var['list']):
?>
                                            <li><a href="<?php echo $this->_var['list']['comment_img']; ?>" target="_blank"><img width="78" height="78" alt="" src="<?php echo $this->_var['list']['comment_img']; ?>"></a><?php if ($this->_var['report_id'] == 0): ?><i class="iconfont icon-cha" ectype="compimg-remove" data-imgid="<?php echo $this->_var['list']['id']; ?>"></i><?php endif; ?></li>
                                            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                </div>
                                <?php if ($this->_var['complaint_id'] == 0): ?>
                                <div class="clear"></div>
                                <div class="fl lh20 mt10">为了能够更快更好地解决问题，请您上传与卖家沟通的记录图片或者其他证明图片</div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php if ($this->_var['complaint_id'] != 0): ?>
                        <div class="item">
                            <div class="label"><?php echo $this->_var['lang']['complaint_time']; ?>：</div>
                            <div class="value">
                                <span class="txt-lh ftx-07"><?php echo $this->_var['complaint_info']['add_time']; ?></span>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php if ($this->_var['complaint_info']['complaint_state'] > 0): ?>
                        
                        <div class="item">
                            <div class="label"><?php echo $this->_var['lang']['complaint_handle_time']; ?>：</div>
                            <div class="value">
                                <span class="txt-lh ftx-07"><?php echo $this->_var['complaint_info']['complaint_handle_time']; ?></span>
                            </div>
                        </div>
                        <div class="item">
                            <div class="label"><?php echo $this->_var['lang']['handle_user']; ?>：</div>
                            <div class="value">
                                <span class="txt-lh ftx-07"><?php echo $this->_var['complaint_info']['handle_user']; ?></span>
                            </div>
                        </div>
                        <?php endif; ?>
                        
                        <?php if ($this->_var['complaint_info']['complaint_state'] > 1): ?>
						<?php if ($this->_var['complaint_info']['ru_id'] > 0): ?>
                        <div class="item">
                            <div class="label"><?php echo $this->_var['lang']['appeal_content']; ?>：</div>
                            <div class="value">
                                <span class="txt-lh ftx-07"><?php echo $this->_var['complaint_info']['appeal_messg']; ?></span>
                            </div>
                        </div>
                        <div class="item">
                            <div class="label"><?php echo $this->_var['lang']['appeal_content']; ?>：</div>
                            <div class="value">
                                <div class="upload-img-box">
                                    <div class="img-lists">
                                        <ul class="img-list-ul">
                                            <?php $_from = $this->_var['complaint_info']['appeal_img']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'list');if (count($_from)):
    foreach ($_from AS $this->_var['list']):
?>
                                            <li><a href="<?php echo $this->_var['list']['img_file']; ?>" target="_blank"><img width="78" height="78" alt="" src="<?php echo $this->_var['list']['img_file']; ?>"></a></li>
                                            <?php endforeach; else: ?>
                                            暂无图片
                                            <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="label"><?php echo $this->_var['lang']['complaint_time']; ?>：</div>
                            <div class="value"><span class="txt-lh ftx-07"><?php echo $this->_var['complaint_info']['appeal_time']; ?></span></div>
                        </div>
						<?php endif; ?>
                        <div class="item">
                            <div class="label"><?php echo $this->_var['lang']['talk_record']; ?>：</div>
                            <div class="value">
                                <div class="talk_list" ectype="talk_list">
									<div class="talk_list_info">
                                    <?php echo $this->fetch('library/talk_list.lbi'); ?>
									</div>
                                </div>
                            </div>
                        </div>
                        <?php if ($this->_var['complaint_info']['complaint_state'] != 4): ?>
                        <div class="item">
                            <div class="label"><?php echo $this->_var['lang']['talk_release']; ?>：</div>
                            <div class="value">
                                <textarea name="talk_content" class="textarea mb10"></textarea>
                                <a href="javascript:;" class="sc-btn sc-redBg-btn" ectype="talk_release" data-type="0"><?php echo $this->_var['lang']['talk_release']; ?></a>
                                <a href="javascript:;" class="sc-btn sc-redBg-btn" ectype="talk_release" data-type="1"><?php echo $this->_var['lang']['talk_refresh']; ?></a>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php endif; ?>
                        <?php if ($this->_var['complaint_info']['complaint_state'] == 4): ?>
                        <div class="item">
                            <div class="label"><?php echo $this->_var['lang']['end_handle_messg']; ?>：</div>
                            <div class="value"><span class="txt-lh ftx-07"><?php echo $this->_var['complaint_info']['end_handle_messg']; ?></span></div>
                        </div>
                        <div class="item">
                            <div class="label"><?php echo $this->_var['lang']['end_handle_time']; ?>：</div>
                            <div class="value"><span class="txt-lh ftx-07"><?php echo $this->_var['complaint_info']['end_handle_time']; ?></span></div>
                        </div>
                        <div class="item">
                            <div class="label"><?php echo $this->_var['lang']['handle_user']; ?>：</div>
                            <div class="value"><span class="txt-lh ftx-07"><?php echo $this->_var['complaint_info']['end_handle_user']; ?></span></div>
                        </div>
                        <?php endif; ?>
                        <div class="item item-button">
                            <div class="label">&nbsp;</div>
                            <div class="value">
                                <input name="complaint_id" type="hidden" value="<?php echo $this->_var['complaint_info']['complaint_id']; ?>">
                                <input name="order_id" type="hidden" value="<?php echo $this->_var['order_id']; ?>">
                                <?php if ($this->_var['complaint_id'] == 0): ?>
                                <input name='act' type='hidden' value='complaint_submit'>
                                <input type="submit" name="submit" id="submitBtn" class="sc-btn sc-redBg-btn" value="确认提交">
                                <?php else: ?>
                                <a href="user.php?act=complaint_list&is_complaint=1" class="sc-btn sc-redBg-btn"> 返回 </a>
                                <?php endif; ?>
                                <?php if ($this->_var['complaint_info']['complaint_state'] == 2): ?>
                                <input name='act' type='hidden' value='arbitration'>
                                <input type="submit" name="submit" class="sc-btn sc-redBg-btn" value="提交仲裁">
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
				</form>
                </div>
            </div>
        </div>
		<script type="text/javascript">
		<?php if ($this->_var['complaint_info']['complaint_state'] == 2 || $this->_var['complaint_info']['complaint_state'] == 3): ?>
        startCheckStalk();
        <?php endif; ?>
		//检查谈话
        function startCheckStalk()
        {
          window.setInterval("Checktalk()", 3000);
        }
        function Checktalk(){
            var complaint_id = $("input[name='complaint_id']").val();
            Ajax.call('ajax_user.php', "act=talk_release&complaint_id=" +  complaint_id + "&type=1", function(data){
                $("[ectype='talk_list'] .talk_list_info").html(data.content);
				var height = $("*[ectype='talk_list'] .talk_list_info").height();
				$("[ectype='talk_list']").scrollTop(height);
            }, 'POST', 'JSON');
        }
             $("*[ectype='check_title']").on("click", function () {
                 var _this = $(this);
                 var val = _this.data("value");
				 if(val == 0){
					_this.parents(".value").find('.form_prompt').html("<?php echo $this->_var['lang']['complaint_title_null']; ?>");
				 }else{
					 Ajax.call('ajax_user.php?act=complaint_title_desc', 'title_id=' + val, function(data){
						 if(data.error == 1){
							pbDialog(data.message,"",0);
						 }else{
							_this.parents(".value").find('.form_prompt').html(data.content);
						 }
					 }, 'POST', 'JSON');
				 }
             })     
             $(document).on('click','*[ectype="talk_release"]',function(){
				   var _this = $(this);
				   var type = _this.data('type');
				   var talk_content = $("textarea[name='talk_content']").val();
				   var complaint_id = $("input[name='complaint_id']").val();
				   var talk_id = _this.data('id');
				   var back = true;
				   if(type == 0 && talk_content == ''){
						back = false;
				   }
				   if(back){
						Ajax.call('ajax_user.php', "act=talk_release&talk_content=" +  talk_content + "&complaint_id=" + complaint_id + "&type=" + type + "&talk_id=" + talk_id, function(data){
							$("[ectype='talk_list'] .talk_list_info").html(data.content);
							var height = $("*[ectype='talk_list'] .talk_list_info").height();
							$("[ectype='talk_list']").scrollTop(height);
							$("textarea[name='talk_content']").val('');
						}, 'POST', 'JSON');
				   }else{
						pbDialog("发布内容不能为空","",0);
				   }
			})
        </script>
		<?php endif; ?>
        
		
        
        <?php if ($this->_var['action'] == 'illegal_report'): ?>
        <div class="user-mod">
            <div class="user-title">
                <h2><?php echo $this->_var['lang']['illegal_report']; ?><?php if ($this->_var['report_time']): ?>--<span class="red"><?php echo $this->_var['lang']['malice_report']; ?><?php echo $this->_var['lang']['malice_report_end']; ?><?php echo $this->_var['report_time']; ?><?php endif; ?></span></h2>
            </div>
            <div class="illegal-report-content">
                <div class="user-order-list">
                   <?php $_from = $this->_var['goods_report']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'report');if (count($_from)):
    foreach ($_from AS $this->_var['report']):
?>
                    <dl class="item">
                        <dt class="item-t">
                            <div class="t-statu"><?php if ($this->_var['report']['report_state'] == 0): ?>未处理<?php elseif ($this->_var['report']['report_state'] == 2): ?>用户取消<?php else: ?><?php if ($this->_var['report']['handle_type'] == 1): ?>无效举报<?php elseif ($this->_var['report']['handle_type'] == 2): ?>恶意举报<?php else: ?>有效举报<?php endif; ?><?php endif; ?></div>
                            <div class="t-info">
                                <span class="info-item">举报类型：<em class="red"><?php echo $this->_var['report']['type_name']; ?></em></span>
                                <span class="info-item">举报主题：<em class="red"><?php echo $this->_var['report']['title_name']; ?></em></span>
                            </div>
                            <div class="fr"><?php echo $this->_var['report']['add_time']; ?></div>
                        </dt>
                        <dd class="item-c">
                            <div class="c-left">
                                <div class="c-goods">
                                    <div class="c-img"><a href="<?php echo $this->_var['report']['url']; ?>" target="_blank"><img src="<?php echo $this->_var['report']['goods_image']; ?>" alt="<?php echo $this->_var['report']['goods_name']; ?>"></a></div>
                                    <div class="c-info">
                                        <div class="info-name"><a href="<?php echo $this->_var['report']['url']; ?>" target="_blank"><?php echo $this->_var['report']['goods_name']; ?></a></div>
                                        <div class="info-store">商家：<span class="ftx-06"><?php echo $this->_var['report']['shop_name']; ?></span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="c-handle">
								<a href="user.php?act=goods_report&report_id=<?php echo $this->_var['report']['report_id']; ?>" class="sc-btn">查看</a>
								<?php if ($this->_var['report']['report_state'] == 0): ?><a href="#" class="sc-btn" ectype="cancel_report" data-type="1" data-state="2" data-id="<?php echo $this->_var['report']['report_id']; ?>">取消</a><?php endif; ?>
								<?php if ($this->_var['report']['handle_type'] > 0 || $this->_var['report']['report_state'] == 2): ?><a href="#" class="sc-btn" ectype="cancel_report" data-type="1" data-state="3" data-id="<?php echo $this->_var['report']['report_id']; ?>">删除</a><?php endif; ?>
							</div>
                        </dd>
                    </dl>
					<?php endforeach; else: ?>
					<div class="no_records">
                    <i class="no_icon_two"></i>
                    <div class="no_info">
                        <h3><?php 
$k = array (
  'name' => 'get_page_no_records',
  'filename' => $this->_var['filename'],
  'act' => $this->_var['action'],
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?></h3>
                    </div>
                </div>
					<?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
                </div>
            </div>
        </div>
        <?php echo $this->fetch('library/pages.lbi'); ?>
             
        <?php endif; ?>
        
        <?php if ($this->_var['action'] == 'goods_report'): ?>
        <div class="user-mod">
            <div class="user-title">
                <h2><?php echo $this->_var['lang']['illegal_report']; ?></h2>
            </div>
            <div class="view-illegal-report">
                <div class="ii-section iis-state">
                	<?php if ($this->_var['goods_report_info']['report_state'] != 2): ?>
                    <div class="stepflex">
                        <dl class="first active"><dt></dt><dd>填写举报内容</dd></dl>
                        <dl <?php if ($this->_var['report_id'] > 0): ?>class="active"<?php endif; ?>><dt></dt><dd>平台审核处理</dd></dl>
                        <dl class="last<?php if ($this->_var['goods_report_info']['handle_type'] > 0): ?> active<?php endif; ?>"><dt></dt><dd>举报完成</dd></dl>
					</div>
                    <?php else: ?>
                    <div class="iis-state-warp">
                    	<i class="icon icon-iis-4"></i>
                        <div class="iis-state-info">
                        	<div class="tit tit60 ftx-01">用户已取消此商品举报</div>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
                <form action="user.php" method="post" enctype="multipart/form-data" name="formMsg" id="reportForm" >
                    <div class="ii-section">
                        <div class="user-items">
                            <div class="item">
                                <div class="label">被举报商家：</div>
                                <div class="value"><span class="txt-lh ftx-06"><?php echo $this->_var['goods_info']['shop_name']; ?></span></div>
                            </div>
                            <div class="item">
                                <div class="label">相关商品：</div>
                                <div class="value">
                                    <div class="p-product">
                                        <div class="img"><a href="<?php echo $this->_var['goods_info']['url']; ?>" target="_blank"><img src="<?php echo $this->_var['goods_info']['goods_thumb']; ?>" alt="<?php echo $this->_var['goods_info']['goods_name']; ?>"></a></div>
                                        <div class="name"><a href="<?php echo $this->_var['goods_info']['url']; ?>" target="_blank"><?php echo $this->_var['goods_info']['goods_name']; ?></a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="label"><?php if ($this->_var['report_id'] == 0): ?><em class="red">*</em><?php endif; ?>举报类型：</div>
                                <div class="value">
									<?php if ($this->_var['report_id'] == 0): ?>
										<?php $_from = $this->_var['report_type']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'type');$this->_foreach['name'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['name']['total'] > 0):
    foreach ($_from AS $this->_var['type']):
        $this->_foreach['name']['iteration']++;
?>
										<div class="radio-item">
											<input type="radio" name="type_id" class="ui-radio" value="<?php echo $this->_var['type']['type_id']; ?>" id="type_<?php echo $this->_var['type']['type_id']; ?>" <?php if (($this->_foreach['name']['iteration'] <= 1)): ?>checked="checked"<?php endif; ?> ectype='check_title'>
											<label for="type_<?php echo $this->_var['type']['type_id']; ?>" class="ui-radio-label"><?php echo $this->_var['type']['type_name']; ?></label>
										</div>
										<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
									<?php else: ?>
										<span class="txt-lh ftx-06"><?php echo $this->_var['goods_report_info']['type_name']; ?>：<?php echo $this->_var['goods_report_info']['type_desc']; ?></span>
									<?php endif; ?>
                                    <div class="form_prompt"></div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="label"><?php if ($this->_var['report_id'] == 0): ?><em class="red">*</em><?php endif; ?>举报主题：</div>
                                <div class="value">
									<?php if ($this->_var['report_id'] == 0): ?>
										<div class="imitate_select w200">
											<div class="cite"><span><?php echo $this->_var['lang']['Please_select']; ?></span><i class="iconfont icon-down"></i></div>
											<ul ectype='report_title'>
												<li><a href="javascript:void(0);" data-value=""><?php echo $this->_var['lang']['Please_select']; ?></a></li>
                                                <?php if ($this->_var['report_title']): ?>
                                                <?php $_from = $this->_var['report_title']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'title');if (count($_from)):
    foreach ($_from AS $this->_var['title']):
?>
												<li><a href="javascript:void(0);" data-value="<?php echo $this->_var['title']['title_id']; ?>"><?php echo $this->_var['title']['title_name']; ?></a></li>
												<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                                <?php endif; ?>
											</ul>
											<input type="hidden" name='title_id' value=''>
										</div>
										<div class="form_prompt"></div>
									 <?php else: ?>
										<span class="txt-lh ftx-06"><?php echo $this->_var['goods_report_info']['title_name']; ?></span>
									 <?php endif; ?>
                                </div>
                            </div>
                            <div class="item">
                                <div class="label"><?php if ($this->_var['report_id'] == 0): ?><em class="red">*</em><?php endif; ?>举报内容：</div>
                                <div class="value">
									<?php if ($this->_var['report_id'] == 0): ?>
										<textarea name="inform_content" class="textarea"></textarea>
										<div class="form_prompt"></div>
									<?php else: ?>
										<span class="txt-lh ftx-06"><?php echo $this->_var['goods_report_info']['inform_content']; ?></span>
									<?php endif; ?>
                                </div>
                            </div>
                            <div class="item">
                                <div class="label">证据上传：</div>
                                <div class="value">
                                    <?php if ($this->_var['report_id'] == 0): ?><div class="sc-btn fl mt5" id='uploadbutton'>上传文件</div><?php endif; ?>
                                    <div class="upload-img-box">
                                        <div class="img-lists">
                                            <ul class="img-list-ul" ectype="imglist">
                                                <?php if ($this->_var['img_list']): ?>
                                                <?php $_from = $this->_var['img_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'list');if (count($_from)):
    foreach ($_from AS $this->_var['list']):
?>
                                                <li><img width="78" height="78" alt="" src="<?php echo $this->_var['list']['comment_img']; ?>"><?php if ($this->_var['report_id'] == 0): ?><i class="iconfont icon-cha" ectype="reimg-remove" data-imgid="<?php echo $this->_var['list']['id']; ?>"></i><?php endif; ?></li>
                                                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                                <?php endif; ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
							<?php if ($this->_var['goods_report_info']['handle_type'] > 0): ?>
							<div class="item">
                                <div class="label"><?php echo $this->_var['lang']['handle_type']; ?>：</div>
                                <div class="value">
										<span class="txt-lh ftx-06"><?php echo $this->_var['lang']['handle_type_desc'][$this->_var['goods_report_info']['handle_type']]; ?></span>
                                </div>
                            </div>
							<div class="item">
                                <div class="label"><?php echo $this->_var['lang']['handle_message']; ?>：</div>
                                <div class="value">
										<span class="txt-lh ftx-06"><?php echo $this->_var['goods_report_info']['handle_message']; ?></span>
                                </div>
                            </div>
							<?php endif; ?>
                            <div class="item item-button">
                                <div class="label">&nbsp;</div>
                                <div class="value">
									<?php if ($this->_var['report_id'] == 0): ?>
                                    <input name='goods_id' type='hidden' value='<?php echo $this->_var['goods_info']['goods_id']; ?>'>
                                    <input name='goods_name' type='hidden' value='<?php echo $this->_var['goods_info']['goods_name']; ?>'>
                                    <input name='goods_image' type='hidden' value='<?php echo $this->_var['goods_info']['goods_thumb']; ?>'>
                                    <input name='act' type='hidden' value='goods_report_submit'>
									<input type="submit" name="submit" id="submitBtn" class="sc-btn sc-redBg-btn" value="确认提交">
									<?php else: ?>
										<?php if ($this->_var['goods_report_info']['report_state'] == 0): ?>
											<input type="button" name="button"  class="sc-btn sc-redBg-btn" value="取消举报" ectype="cancel_report" data-type="0" data-state="2" data-id="<?php echo $this->_var['goods_report_info']['report_id']; ?>">
										<?php endif; ?>
										<?php if ($this->_var['goods_report_info']['handle_type'] > 0 || $this->_var['goods_report_info']['report_state'] == 2): ?>
											<input type="button" class="sc-btn sc-redBg-btn" value="删除" ectype="cancel_report" data-type="0" data-state="3" data-id="<?php echo $this->_var['goods_report_info']['report_id']; ?>">
										<?php endif; ?>
									<?php endif; ?>
								</div>
                            </div>
                        </div>
                    </div>
					<div class="user-prompt mt20">
						<div class="tit"><span>违规举报须知</span><i class="iconfont icon-down"></i></div>
						<div class="info">
							<h3>违规举报须知</h3>
							<p>1、请提供充分的证据以确保举报成功，请珍惜您的会员权利，帮助商城更好地管理网站；</p>
							<p>2、被举报待处理的商品不能反复进行违规提交，处理下架后的商品不能再次举报，商家如重新上架后仍存在违规现象，可再次对该商品进行违规举报；</p>
							<p>3、举报仅针对商品，如情节严重，再做处理</p>
							<p>4、举报时依次选择举报类型及举报主题（必填），填写违规描述（必填），上传5张以内的举证图片（选填），详细的举报内容有助于平台对该条举报的准确处理。</p>
							<p>5、请客观地向商城反映您所遇到的真实情况，以共同维护一个诚信和公平的购物环境。</p>
						</div>
					</div>
                </form>
            </div>
        </div>
        <script type="text/javascript">
             $("*[ectype='check_title']").on("click", function () {
                 var _this = $(this);
                 var val = _this.val();
                 Ajax.call('ajax_user.php?act=checked_report_title', 'type_id=' + val, function(data){
                     var report_f = $("*[ectype='report_title']").parents(".imitate_select");
                     report_f.find("input[name='title_id']").val('0')
                     report_f.find(".cite").find("span").html("<?php echo $this->_var['lang']['Please_select']; ?>");
                     $("*[ectype='report_title']").html(data);
                 }, 'POST', 'JSON');
             })     
             
        </script>
        <?php endif; ?>
        
        
        
        <?php if ($this->_var['action'] == 'invoice'): ?>
        <div class="user-mod">
            <div class="user-title">
                <h2><?php echo $this->_var['lang']['my_invoice']; ?></h2>
                <ul class="tabs">
                    <li class="active"><a href="user.php?act=invoice"><?php echo $this->_var['lang']['order_invoice_state']; ?></a></li>
                    <li><a href="user.php?act=vat_invoice_info"><?php echo $this->_var['lang']['increment_invoice_info']; ?></a></li>
                </ul>
            </div>
            <div id="user_inv_list">
				<?php echo $this->fetch('library/user_inv_list.lbi'); ?>
            </div>
        </div>    
        <?php endif; ?>
		
        <?php if ($this->_var['action'] == 'vat_invoice_info'): ?>
        <div class="user-mod">
            <div class="user-title">
                <h2><?php echo $this->_var['lang']['my_invoice']; ?></h2>
                <ul class="tabs" ectype="invoice-tabs">
                    <li><a href="user.php?act=invoice"><?php echo $this->_var['lang']['order_invoice_state']; ?></a></li>
                    <li  class="active"><a href="user.php?act=vat_invoice_info"><?php echo $this->_var['lang']['increment_invoice_info']; ?></a></li>
                </ul>
            </div>
            <div>
                <div class="increment_invoice_info">
					<?php if ($this->_var['submitted']): ?>
					<div class="ii-section iis-state">
                        <div class="iis-state-warp">
                            <i class="icon icon-iis-<?php if ($this->_var['audit_status'] == 0): ?>1<?php elseif ($this->_var['audit_status'] == 1): ?>3<?php elseif ($this->_var['audit_status'] == 2): ?>2<?php endif; ?>"></i>
                            <div class="iis-state-info">
                                <div class="tit"><?php if ($this->_var['audit_status'] == 0): ?>您的增票资质已提交，等待审核。<?php elseif ($this->_var['audit_status'] == 1): ?>恭喜！您的增票资质信息审核通过。<?php elseif ($this->_var['audit_status'] == 2): ?>抱歉！您的增票资质信息错误，审核不通过。<?php endif; ?></div>
                                <div class="iis-btn">
                                    <a href="user.php?act=vat_update&vat_id=<?php echo $this->_var['vat_id']; ?>" class="sc-btn">修改</a>
                                    <a href="user.php?act=vat_remove&vat_id=<?php echo $this->_var['vat_id']; ?>" class="sc-btn">删除</a>
                                </div>
                            </div>						
                        </div>
                    </div>
                    <div class="ii-section iis-aptitude">
                        <div class="title">增票资质信息</div>
                        <div class="info">
                            <p>单位名称：<?php echo $this->_var['vat_info']['company_name']; ?></p>
                            <p>纳税人识别码：<?php echo $this->_var['vat_info']['tax_id']; ?></p>
                            <p>注册地址：<?php echo $this->_var['vat_info']['company_address']; ?></p>
                            <p>注册电话：<?php echo $this->_var['vat_info']['company_telephone']; ?></p>
                            <p>开户银行：<?php echo $this->_var['vat_info']['bank_of_deposit']; ?></p>
                            <p>银行账户：<?php echo $this->_var['vat_info']['bank_account']; ?></p>
                        </div>
                    </div>
                    <div class="ii-section iis-ticket last-child">
                        <div class="title">票据收件信息
						<?php if ($this->_var['vat_info']['consignee_name'] || $this->_var['vat_info']['consignee_address'] || $this->_var['vat_info']['consignee_mobile_phone'] || $this->_var['vat_info']['consignee_province']): ?>
						<a href="user.php?act=vat_consignee&vat_id=<?php echo $this->_var['vat_id']; ?>" class="ftx-01">修改</a>
						<?php endif; ?>
						</div>
                        <div class="info">
							<?php if (! $this->_var['vat_info']['consignee_name'] && ! $this->_var['vat_info']['consignee_address'] && ! $this->_var['vat_info']['consignee_mobile_phone'] && ! $this->_var['vat_info']['consignee_province']): ?>
                            <p>您还未设置收票地址：<a href="user.php?act=vat_consignee" class="sc-btn">设置</a></p>
							<?php else: ?>
                            <p>收票人姓名：<?php echo $this->_var['vat_info']['consignee_name']; ?></p>
                            <p>收票人手机号：<?php echo $this->_var['vat_info']['consignee_mobile_phone']; ?></p>
                            <p>收票人省份：<?php echo $this->_var['new_vat_consignee_list']['region']; ?></p>
                            <p>收票人地址：<?php echo $this->_var['vat_info']['consignee_address']; ?></p>							
							<?php endif; ?>
                        </div>
                    </div>
                    <div class="user-prompt mt50">
                        <div class="tit"><span>注意事项</span><i class="iconfont icon-down"></i></div>
                        <div class="info">
                            <p>1、我们会在一个工作日内完成审核工作。</p>
                            <p>2、注意有效增值税发票开票资质仅为一个。</p>
                            <p>3、发票常见问题查看<a href="#" class="ftx-05">增票资质帮助</a>。</p>
                            <p>4、本页面信息仅供增值税专用发票-资质审核使用，切勿进行支付相关业务，谨防上当受骗。</p>
                        </div>
                    </div>
					<?php else: ?>
					<form action="user.php" method="post" name="inv_form" ectype="inv_form">
                    <div class="user-items">
                        <div class="item">
                            <div class="label"><em class="red">*</em>单位名称：</div>
                            <div class="value"><input type="text" value="<?php echo $this->_var['vat_info']['company_name']; ?>" name="company_name" class="text"><div class="notic">请正确填写公司名称</div><div class="form_prompt"></div></div>
                        </div>
						<div class="item">
                            <div class="label"><em class="red">*</em>注册地址：</div>
                            <div class="value"><input type="text" value="<?php echo $this->_var['vat_info']['company_address']; ?>" name="company_address" class="text"><div class="notic">请正确填写公司名称</div><div class="form_prompt"></div></div>
                        </div>
                        <div class="item">
                            <div class="label"><em class="red">*</em>纳税人识别码：</div>
                            <div class="value"><input type="text" value="<?php echo $this->_var['vat_info']['tax_id']; ?>" name="tax_id" class="text"><div class="notic">纳税人识别码一般是15到18位数字</div><div class="form_prompt"></div></div>
                        </div>
                        <div class="item">
                            <div class="label"><em class="red">*</em>注册电话：</div>
                            <div class="value"><input type="text" value="<?php echo $this->_var['vat_info']['company_telephone']; ?>" name="company_telephone" class="text"><div class="notic">请正确填写联系方式</div><div class="form_prompt"></div></div>
                        </div>
                        <div class="item">
                            <div class="label"><em class="red">*</em>开户银行：</div>
                            <div class="value"><input type="text" value="<?php echo $this->_var['vat_info']['bank_of_deposit']; ?>" name="bank_of_deposit" class="text"><div class="notic">开户行精确到某某支行</div><div class="form_prompt"></div></div>
                        </div>
                        <div class="item">
                            <div class="label">银行账户：</div>
                            <div class="value"><input type="text" value="<?php echo $this->_var['vat_info']['bank_account']; ?>" name="bank_account" ectype="bank_card" class="text"><div class="notic">请正确银行账号</div><div class="form_prompt"><label class="error" ectype="bname"></label></div></div>
                        </div>
                        <div class="item mb0">
                            <div class="label">&nbsp;</div>
                            <div class="value">
                                <div class="checkbox-item lh30">
                                    <input type="checkbox" name="have_read" checked="checked" value='1' class="ui-checkbox" id="invoice_checkbox">
                                    <label for="invoice_checkbox" class="ui-label">我已阅读并同意<a href="#" target="_blank">《增票资质确认书》</a></label>
                                </div>
								<div class="form_prompt" id="have_read"></div>
                            </div>
                        </div>
                        <div class="item item-button">
                            <div class="label">&nbsp;</div>
                            <div class="value">
                                <input type="submit" class="sc-btn sc-redBg-btn" name="submit" value="提交" ectype="submitBtn">
                                <input type="reset" class="sc-btn" name="reset" value="重置">
								<input type="hidden" name="act" value="<?php echo empty($this->_var['edit']) ? 'vat_insert' : $this->_var['edit']; ?>">
								<input type="hidden" name="status" value="<?php echo empty($this->_var['status']) ? 'insert' : $this->_var['status']; ?>">
								<input type="hidden" name="vat_id" value="<?php echo $this->_var['vat_id']; ?>">
                            </div>
                        </div>
                    </div>
                    </form>
					<?php endif; ?>
                </div>
            </div>
        </div> 
        <?php endif; ?>
		
		<?php if ($this->_var['action'] == 'vat_consignee'): ?>
        <div class="user-mod">
            <div class="user-title">
                <h2><?php echo $this->_var['lang']['my_invoice']; ?></h2>
                <ul class="tabs" ectype="invoice-tabs">
                    <li><a href="user.php?act=invoice"><?php echo $this->_var['lang']['order_invoice_state']; ?></a></li>
                    <li  class="active"><a href="user.php?act=vat_invoice_info"><?php echo $this->_var['lang']['increment_invoice_info']; ?></a></li>
                    <li><a href="javascript:void(0);"><?php echo $this->_var['lang']['invoice_help']; ?></a></li>
                </ul>
            </div>
            <div>
                <div class="increment_invoice_info">
					<div class="ii-section iis-state">
                        <div class="iis-state-warp">
							<?php if ($this->_var['audit_status'] == 0): ?>
                            <i class="icon icon-iis-1"></i>
                            <div class="iis-state-info">
                                <div class="tit">您的增票资质已提交，等待审核。</div>
							<?php elseif ($this->_var['audit_status'] == 1): ?>
                            <i class="icon icon-iis-3"></i>
                            <div class="iis-state-info">
                                <div class="tit">恭喜！您的增票资质信息审核通过。</div>

							<?php elseif ($this->_var['audit_status'] == 2): ?>
                            <i class="icon icon-iis-2"></i>
                            <div class="iis-state-info">
                                <div class="tit">抱歉！您的增票资质信息错误，审核不通过。</div>						
							<?php endif; ?>
                                <div class="iis-btn">
                                    <a href="user.php?act=vat_update&vat_id=<?php echo $this->_var['vat_id']; ?>" class="sc-btn">修改</a>
                                    <a href="user.php?act=vat_remove&vat_id=<?php echo $this->_var['vat_id']; ?>" class="sc-btn">删除</a>
                                </div>
                            </div>								
                        </div>
                    </div>
                    <div class="ii-section iis-aptitude">
                        <div class="title">增票资质信息</div>
                        <div class="info">
                            <p>单位名称：<?php echo $this->_var['vat_info']['company_name']; ?></p>
                            <p>纳税人识别码：<?php echo $this->_var['vat_info']['tax_id']; ?></p>
                            <p>注册电话：<?php echo $this->_var['vat_info']['company_telephone']; ?></p>
                            <p>开户银行：<?php echo $this->_var['vat_info']['bank_of_deposit']; ?></p>
                            <p>银行账户：<?php echo $this->_var['vat_info']['bank_account']; ?></p>
                        </div>
                    </div>
                    <div class="ii-section iis-ticket last-child">
                        <div class="title">票据收件信息</div>
                        <div class="info">
							<form action="user.php" method="post" name="vat_form" id="vat_form">
							<div class="user-items">
								<div class="item">
									<div class="label">收票人姓名：</div>
									<div class="value"><input type="text" value="<?php echo $this->_var['vat_info']['consignee_name']; ?>" name="consignee_name" class="text"></div>
								</div>
								<div class="item">
									<div class="label">收票人手机号：</div>
									<div class="value"><input type="text" value="<?php echo $this->_var['vat_info']['consignee_mobile_phone']; ?>" name="consignee_mobile_phone" class="text"></div>
								</div>
								<div class="item">
									<div class="label">收票人省份：</div>
									<div class="form-value" ectype="regionLinkage">
										<dl class="mod-select mod-select-small" ectype="smartdropdown">
											<dt>
												<span class="txt" ectype="txt"><?php echo $this->_var['lang']['please_select']; ?><?php echo $this->_var['name_of_region']['0']; ?></span>
												<input type="hidden" value="<?php echo $this->_var['consignee']['country']; ?>" name="country">
											</dt>
											<dd ectype="layer">
												<?php $_from = $this->_var['country_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'country');if (count($_from)):
    foreach ($_from AS $this->_var['country']):
?>
												<div class="option" data-value="<?php echo $this->_var['country']['region_id']; ?>" data-text="<?php echo $this->_var['country']['region_name']; ?>" ectype="ragionItem" data-type="1"><?php echo $this->_var['country']['region_name']; ?></div>
												<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
											</dd>
										</dl>
										<dl class="mod-select mod-select-small" ectype="smartdropdown">
											<dt><span class="txt" ectype="txt"><?php echo $this->_var['lang']['please_select']; ?><?php echo $this->_var['name_of_region']['1']; ?></span>
											<input type="hidden" value="<?php echo $this->_var['consignee']['province']; ?>" ectype="ragionItem" name="province"></dt>
											<dd ectype="layer">
												<div class="option" data-value="0"><?php echo $this->_var['lang']['please_select']; ?><?php echo $this->_var['name_of_region']['1']; ?></div>
												<?php $_from = $this->_var['province_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'province_0_85595100_1507521106');if (count($_from)):
    foreach ($_from AS $this->_var['province_0_85595100_1507521106']):
?>
												<div class="option" data-value="<?php echo $this->_var['province_0_85595100_1507521106']['region_id']; ?>" data-text="<?php echo $this->_var['province_0_85595100_1507521106']['region_name']; ?>" data-type="2" ectype="ragionItem"><?php echo $this->_var['province_0_85595100_1507521106']['region_name']; ?></div>
												<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
											</dd>
										</dl>
										<dl class="mod-select mod-select-small" ectype="smartdropdown">
											<dt><span class="txt" ectype="txt"><?php echo $this->_var['lang']['please_select']; ?><?php echo $this->_var['name_of_region']['2']; ?></span>
											<input type="hidden" value="<?php echo $this->_var['consignee']['city']; ?>" name="city" ></dt>
											<dd ectype="layer">
												<div class="option" data-value="0"><?php echo $this->_var['lang']['please_select']; ?><?php echo $this->_var['name_of_region']['2']; ?></div>
												<?php $_from = $this->_var['city_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'city');if (count($_from)):
    foreach ($_from AS $this->_var['city']):
?>
												<div class="option" data-value="<?php echo $this->_var['city']['region_id']; ?>" data-type="3" data-text="<?php echo $this->_var['city']['region_name']; ?>" ectype="ragionItem"><?php echo $this->_var['city']['region_name']; ?></div>
												<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
											</dd>
										</dl>
										<dl class="mod-select mod-select-small" ectype="smartdropdown" style="display:none">
											<dt><span class="txt" ectype="txt"><?php echo $this->_var['lang']['please_select']; ?><?php echo $this->_var['name_of_region']['3']; ?></span>
											<input type="hidden" value="<?php echo $this->_var['consignee']['district']; ?>" name="district"></dt>
											<dd ectype="layer">
												<div class="option" data-value="0"><?php echo $this->_var['lang']['please_select']; ?><?php echo $this->_var['name_of_region']['3']; ?></div>
												<?php $_from = $this->_var['district_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'district');if (count($_from)):
    foreach ($_from AS $this->_var['district']):
?>
												<div class="option" data-value="<?php echo $this->_var['district']['region_id']; ?>" data-type="4" data-text="<?php echo $this->_var['district']['region_name']; ?>" ectype="ragionItem"><?php echo $this->_var['district']['region_name']; ?></div>
												<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
											</dd>
										</dl>
										<dl class="mod-select mod-select-small" ectype="smartdropdown" style="display:none">
											<dt><span class="txt" ectype="txt"><?php echo $this->_var['lang']['please_select']; ?><?php echo $this->_var['name_of_region']['3']; ?></span><input type="hidden" value="<?php echo $this->_var['consignee']['street']; ?>" name="street"></dt>
											<dd ectype="layer">
												<div class="option" data-value="0"><?php echo $this->_var['lang']['please_select']; ?><?php echo $this->_var['name_of_region']['3']; ?></div>
												<?php $_from = $this->_var['street_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'street');if (count($_from)):
    foreach ($_from AS $this->_var['street']):
?>
												<div class="option" data-value="<?php echo $this->_var['street']['region_id']; ?>" data-type="5" data-text="<?php echo $this->_var['street']['region_name']; ?>" ectype="ragionItem"><?php echo $this->_var['street']['region_name']; ?></div>
												<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
											</dd>
										</dl>
									</div>
								</div>
								<div class="item">
									<div class="label">收票人地址：</div>
									<div class="value"><input type="text" value="<?php echo $this->_var['vat_info']['consignee_address']; ?>" name="consignee_address" class="text"></div>
								</div>
								<div class="item item-button">
									<div class="label">&nbsp;</div>
									<div class="value">
										<input type="submit" class="sc-btn sc-redBg-btn" name="submit" value="提交">
										<input type="button" class="sc-btn" name="cannel" value="取消">
										<input type="hidden" name="act" value="vat_consignee">
										<input type="hidden" name="status" value="update">
									</div>
								</div>
							</div>
							</form>						
                        </div>
                    </div>
                    <div class="user-prompt mt50">
                        <div class="tit"><span>注意事项</span><i class="iconfont icon-down"></i></div>
                        <div class="info">
                            <p>1、我们会在一个工作日内完成审核工作。</p>
                            <p>2、注意有效增值税发票开票资质仅为一个。</p>
                            <p>3、发票常见问题查看<a href="#" class="ftx-05">增票资质帮助</a>。</p>
                            <p>4、本页面信息仅供增值税专用发票-资质审核使用，切勿进行支付相关业务，谨防上当受骗。</p>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
		<?php endif; ?>
        
     </div>
</div>
<?php echo $this->fetch('library/common_html.lbi'); ?>

<?php echo $this->fetch('library/page_footer.lbi'); ?>

<?php echo $this->smarty_insert_scripts(array('files'=>'jquery.SuperSlide.2.1.1.js,jquery.yomi.js,common.js,jquery.validation.min.js,jquery.nyroModal.js,perfect-scrollbar/perfect-scrollbar.min.js')); ?>
<?php if ($this->_var['action'] == 'comment_list' || $this->_var['action'] == 'commented_view' || $this->_var['action'] == 'goods_report' || $this->_var['action'] == 'complaint_apply'): ?>
<?php echo $this->smarty_insert_scripts(array('files'=>'plupload.full.min.js')); ?>
<?php endif; ?>
<script type="text/javascript" src="themes/<?php echo $GLOBALS['_CFG']['template']; ?>/js/dsc-common.js"></script>
<script type="text/javascript" src="themes/<?php echo $GLOBALS['_CFG']['template']; ?>/js/jquery.purebox.js"></script>
<script type="text/javascript" src="themes/<?php echo $GLOBALS['_CFG']['template']; ?>/js/ZeroClipboard/ZeroClipboard.js"></script>
<?php if ($this->_var['action'] == 'collection_list' || $this->_var['action'] == 'store_list' || $this->_var['action'] == 'focus_brand'): ?>
<script type="text/javascript" src="themes/<?php echo $GLOBALS['_CFG']['template']; ?>/js/sc_memake.js"></script>
<?php endif; ?>

<script type="text/javascript">
function init() {
    var clip = null;
    var val = $("#affTextarea").text();
    if(val){
        clip = new ZeroClipboard.Client();
        ZeroClipboard.setMoviePath("themes/<?php echo $GLOBALS['_CFG']['template']; ?>/js/ZeroClipboard/ZeroClipboard.swf");
        clip.setHandCursor(true);   
        clip.addEventListener('mouseOver', function (client) {
            clip.setText(val);
        });
        
        clip.addEventListener('complete', function (client, text) {
            pbDialog(fuzhizgantie,"",0,"","",40);
        });
        clip.glue('clip_button', 'clip_container' );
    }
}

$(window).load(function(){
    init();
})

$(function(){
    $(".nyroModal").nyroModal();
});

<?php if ($this->_var['action'] == 'store_list'): ?>
$(".shop-right").slide({mainCell:".shop-bd ul",effect:"left",pnLoop:false,autoPlay:false,autoPage:true,prevCell:".prev",nextCell:".next",vis:4});
<?php endif; ?>

</script>
    
<?php if ($this->_var['action'] == 'add_booking'): ?>
<script type="text/javascript">
$(function(){
    $("#submitBtn").click(function(){
        if($("#formBooking").valid()){
            $("#formBooking").submit();
        }
    });
    $('#formBooking').validate({
        errorPlacement:function(error, element){
            var error_div = element.parents('div.form-value').find('div.form_prompt');
            //element.parents('div.label_value').find(".notic").hide();
            error_div.append(error);
        },
        rules : {
                number : {
                    required : true
                },
                desc : {
                    required : true
                },
                linkman : {
                    required : true
                },
                email : {
                    required : true,
                    email : true
                },
                tel : {
                    required : true
                }

            },
            messages : {
                number : {
                    required : '数量不能为空'
                },
                desc : {
                    required : '描述不能为空'
                },
                linkman : {
                    required : '联系人不能为空'
                },
                email : {
                    required : '邮箱不能为空',
                    email : '邮箱格式不正确'
                },
                tel : {
                    required : '联系电话不可为空'
                }
            }
    });
});
</script>
<?php endif; ?>

<?php if ($this->_var['action'] == 'goods_report' || $this->_var['action'] == 'complaint_apply'): ?>
<script type="text/javascript">
		var url = '';
		<?php if ($this->_var['action'] == 'goods_report'): ?>
        url = "ajax_user.php?act=ajax_report_img&goods_id=<?php echo $this->_var['goods_info']['goods_id']; ?>&sessid=<?php echo $this->_var['sessid']; ?>";
		<?php else: ?>
		url = "ajax_user.php?act=complaint_img&order_id=<?php echo $this->_var['order_id']; ?>&sessid=<?php echo $this->_var['sessid']; ?>";
		<?php endif; ?>
		var uploader_gallery = new plupload.Uploader({//创建实例的构造方法
                runtimes: 'html5,flash,silverlight,html4', //上传插件初始化选用那种方式的优先级顺序
                browse_button: 'uploadbutton', // 上传按钮
                url: url, //远程上传地址
                filters: {
                        max_file_size: '2mb', //最大上传文件大小（格式100b, 10kb, 10mb, 1gb）
                        mime_types: [//允许文件上传类型
                                {title: "files", extensions: "bmp,gif,jpg,png,jpeg"}
                        ]
                },
                multi_selection: true, //true:ctrl多文件上传, false 单文件上传
                init: {
                   FilesAdded: function(up, files) { //文件上传前
                           var len = $("*[ectype='imglist'] li").length;
                                plupload.each(files, function(file){
                                        //遍历文件
                                        len ++;
                                });
                                if(len > 5){
                                        pbDialog("最多只能上传5张图片","",0);
                                }else{
                                        submitBtn();
                                }
                        },
                        FileUploaded: function(up, file, info) { //文件上传成功的时候触发
                                var data = eval("(" + info.response + ")");
                                if(data.error > 0){
                                        pbDialog(data.message,"",0);
                                        return;
                                }else{
                                        $("*[ectype='imglist']").html(data.content);
                                }
                        },
                        UploadComplete:function(up,file){
                                //所有文件上传成功时触发	
                        },
                        Error: function(up, err){
                                //上传出错的时候触发
                                pbDialog(err.message,"",0);
                        }
                }
        });
	
        uploader_gallery.init();
	
        function submitBtn(){
			//设置传参
			uploader_gallery.setOption("multipart_params");
			//开始控件
			uploader_gallery.start();
        };
		
		<?php if ($this->_var['action'] == 'complaint_apply'): ?>
		var height = $("*[ectype='talk_list'] .talk_list_info").height();
		$("[ectype='talk_list']").scrollTop(height);
		
		$("[ectype='talk_list']").perfectScrollbar("destroy");
		$("[ectype='talk_list']").perfectScrollbar();
		
		$(document).on("click","*[ ectype='compimg-remove']",function(){
            var $this = $(this);
            var re_imgId = $this.data("imgid");
            var order_id = $("input[name='order_id']").val();
            Ajax.call('ajax_user.php?act=del_reportpic', 're_imgId=' + re_imgId + '&order_id='+order_id + "&complaint=1", function(data){
                if(data.error > 0){
                    pbDialog(data.message,"",0);
                }else{
                    $("*[ectype='imglist']").html(data.content);
                }
            }, 'POST', 'JSON');
        });   
		$("#submitBtn").click(function(){
            
            if($("#reportForm").valid()){
                $("#reportForm").submit();
            }
        });
        $('#reportForm').validate({
            errorPlacement:function(error, element){
                var error_div = element.parents('div.value').find('div.form_prompt');
                //element.parents('div.label_value').find(".notic").hide();
                error_div.append(error);
            },
            ignore : "",
            rules : {
                title_id : {
                    required : true
                },
                complaint_content : {
                    required : true
                }
            },
            messages : {
                title_id : {
                    required : '<?php echo $this->_var['lang']['complaint_title_null']; ?>'
                },
                complaint_content : {
                    required : '<?php echo $this->_var['lang']['inform_content_null']; ?>'
                }
            }
        });
		<?php endif; ?>
		
		<?php if ($this->_var['action'] == 'goods_report'): ?>
        //删除图片
        $(document).on("click","*[ ectype='reimg-remove']",function(){
            var $this = $(this);
            var re_imgId = $this.data("imgid");
            var goods_id = $("input[name='goods_id']").val();
            Ajax.call('ajax_user.php?act=del_reportpic', 're_imgId=' + re_imgId + '&goods_id='+goods_id, function(data){
                if(data.error > 0){
                    pbDialog(data.message,"",0);
                }else{
                    $("*[ectype='imglist']").html(data.content);
                }
            }, 'POST', 'JSON');
        });   
		
        $("#submitBtn").click(function(){
            if($("#reportForm").valid()){
                $("#reportForm").submit();
            }
        });
        $('#reportForm').validate({
            errorPlacement:function(error, element){
                var error_div = element.parents('div.value').find('div.form_prompt');
                //element.parents('div.label_value').find(".notic").hide();
                error_div.append(error);
            },
            ignore : "",
            rules : {
                title_id : {
                    required : true
                },
                type_id : {
                    required : true
                },
                inform_content : {
                    required : true
                }
            },
            messages : {
                title_id : {
                    required : '<?php echo $this->_var['lang']['title_null']; ?>'
                },
                type_id : {
                    required : '<?php echo $this->_var['lang']['type_null']; ?>'
                },
                inform_content : {
                    required : '<?php echo $this->_var['lang']['inform_content_null']; ?>'
                }
            }
        });
		<?php endif; ?>
</script>
<?php endif; ?>
 
<?php if ($this->_var['action'] == 'vat_consignee'): ?>
<script type="text/javascript" src="themes/<?php echo $GLOBALS['_CFG']['template']; ?>/js/region.js"></script>
<script>
$.levelLink(1);//地区三级联动
</script>
<?php endif; ?>
 
<?php if ($this->_var['action'] == 'vat_invoice_info'): ?>
<script type="text/javascript" src="themes/<?php echo $GLOBALS['_CFG']['template']; ?>/js/region.js"></script>
<script type="text/javascript">

$.levelLink(1);//地区三级联动
$("*[ectype='submitBtn']").click(function(){
	frm  = document.forms['inv_form'];
	if(!frm.elements['have_read'].checked){
		$("#have_read").html("<i>请阅读并同意《增票资质确认书》</i>");
		return false;
	};
	
	if($("*[ectype='inv_form']").valid()){
		$("*[ectype='inv_form']").submit();
	}
});
$("*[ectype='inv_form']").validate({
	errorPlacement:function(error, element){
		var error_div = element.parents('div.value').find('div.form_prompt');
		element.parents('div.value').find(".notic").hide();
		error_div.append(error);
	},
	ignore : "",
	rules : {
		company_name : {
			required : true
		},
		tax_id : {
			required : true,
			minlength : 15
		},
		company_address : {
			required : true
		},
		company_telephone : {
			required : true
		},
		bank_of_deposit : {
			required : true
		}
	},
	messages : {
		company_name : {
			required : "请填写增值发票单位名称"
		},
		tax_id : {
			required : "请填写纳税人识别码",
			minlength: "纳税人识别码位数不正确"
		},
		company_address : {
			required : "请填写注册地址"
		},
		company_telephone : {
			required : "请填写联系电话"
		},
		bank_of_deposit : {
			required : "请填写开户行名称"
		}
	}
});
</script>
<?php endif; ?> 
</body>
</html>