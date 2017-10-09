<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="<?php echo $this->_var['keywords']; ?>" />
<meta name="Description" content="<?php echo $this->_var['description']; ?>" />

<title><?php echo $this->_var['page_title']; ?></title>



<link rel="shortcut icon" href="favicon.ico" />
<?php echo $this->fetch('library/js_languages_new.lbi'); ?>
</head>

<body>
    <?php echo $this->fetch('library/page_header_common.lbi'); ?>
    <div class="content">
        <div class="banner exchange-banner">
            <div class="w w1200 relative">
                <?php 
$k = array (
  'name' => 'get_adv_child',
  'ad_arr' => $this->_var['activity_top_banner'],
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>
                <div class="exchange-score">
                	<?php if ($this->_var['user_id']): ?>
                    <div class="u-info">
                        <a href="user.php" class="u-avatar"><img src="<?php if ($this->_var['info']['user_picture']): ?><?php echo $this->_var['info']['user_picture']; ?><?php else: ?>themes/<?php echo $GLOBALS['_CFG']['template']; ?>/images/touxiang.jpg<?php endif; ?>" alt=""></a>
                        <div class="u-name"><a href="user.php"><?php echo $this->_var['info']['username']; ?></a></div>
                    </div>
                    <div class="score-info">
                        <div class="item">
                            <p>可用积分</p>
                            <div class="num"><?php echo $this->_var['info']['pay_points']; ?></div>
                        </div>
                        <div class="item">
                            <p>余额（元）</p>
                            <div class="num"><?php echo $this->_var['info']['user_money']; ?></div>
                        </div>
                    </div>
                    <?php else: ?>
                    <div class="u-info">
                        <a href="user.php" class="u-avatar"><img src="themes/<?php echo $GLOBALS['_CFG']['template']; ?>/images/touxiang.jpg" alt=""></a>
                        <div class="u-name"><strong>Hi,欢迎来到<?php echo $GLOBALS['_CFG']['shop_name']; ?></strong></div>
                    </div>
                    <div class="score-info">
                        <a href="<?php echo $this->_var['site_domain']; ?>user.php" class="login-button"><?php echo $this->_var['lang']['please_login']; ?></a>
                        <a href="user.php?act=register" class="register_button">立即注册</a>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="exchange-cate">
            <div class="w w1200">
                <a href="exchange.php" <?php if ($this->_var['cat_id'] == 0): ?>class="curr"<?php endif; ?>><?php echo $this->_var['lang']['all']; ?></a><i class="point">·</i>
                <?php $_from = $this->_var['category_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cat');$this->_foreach['name'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['name']['total'] > 0):
    foreach ($_from AS $this->_var['cat']):
        $this->_foreach['name']['iteration']++;
?>
                <a <?php if ($this->_var['cat_id'] == $this->_var['cat']['cat_id']): ?>class="curr"<?php endif; ?> href="exchange.php?sort=<?php echo $this->_var['pager']['search']['sort']; ?>&cat_id=<?php echo $this->_var['cat']['cat_id']; ?>#exchange_list"><?php if ($this->_var['cat']['cat_alias_name']): ?><?php echo $this->_var['cat']['cat_alias_name']; ?><?php else: ?><?php echo $this->_var['cat']['cat_name']; ?><?php endif; ?></a><?php if (! ($this->_foreach['name']['iteration'] == $this->_foreach['name']['total'])): ?><i class="point">·</i><?php endif; ?>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </div>
        </div>
        <div class="exchange-main">
            <div class="w w1200">
                <div class="mod-list-sort">
                    <div class="sort-t">排序：</div>
                    <div class="sort-l">
                        <a href="exchange.php?sort=goods_id&order=<?php if ($this->_var['pager']['search']['sort'] == 'goods_id' && $this->_var['pager']['search']['order'] == 'ASC'): ?>DESC<?php else: ?>ASC<?php endif; ?>#exchange_list" class="sort-item <?php if ($this->_var['pager']['search']['sort'] == 'goods_id'): ?> curr<?php endif; ?>">默认<i class="iconfont <?php if ($this->_var['pager']['search']['sort'] == 'goods_id' && $this->_var['pager']['search']['order'] == 'ASC'): ?>icon-up1<?php else: ?>icon-down1<?php endif; ?>"></i></a>
                        <a href="exchange.php?sort=sales_volume&order=<?php if ($this->_var['pager']['search']['sort'] == 'sales_volume' && $this->_var['pager']['search']['order'] == 'ASC'): ?>DESC<?php else: ?>ASC<?php endif; ?>#exchange_list" class="sort-item <?php if ($this->_var['pager']['search']['sort'] == 'sales_volume'): ?>curr<?php endif; ?>">兑换量<i class="iconfont <?php if ($this->_var['pager']['search']['sort'] == 'sales_volume' && $this->_var['pager']['search']['order'] == 'ASC'): ?>icon-up1<?php else: ?>icon-down1<?php endif; ?>"></i></a>
                        <a href="exchange.php?sort=exchange_integral&order=<?php if ($this->_var['pager']['search']['sort'] == 'exchange_integral' && $this->_var['pager']['search']['order'] == 'ASC'): ?>DESC<?php else: ?>ASC<?php endif; ?>#exchange_list" class="sort-item <?php if ($this->_var['pager']['search']['sort'] == 'exchange_integral'): ?>curr<?php endif; ?>">积分值<i class="iconfont <?php if ($this->_var['pager']['search']['sort'] == 'exchange_integral' && $this->_var['pager']['search']['order'] == 'ASC'): ?>icon-up1<?php else: ?>icon-down1<?php endif; ?>"></i></a>
                    </div>
                </div>
                 <?php if ($this->_var['goods_list']): ?>
                <ul class="exchange-list clearfix">
                    <?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
                        <?php if ($this->_var['goods']['goods_id']): ?>
                            <li class="mod-shadow-card">
                                <a  href="<?php echo $this->_var['goods']['url']; ?>" target="_blank" class="img"><img src="<?php echo $this->_var['goods']['goods_thumb']; ?>" alt="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>" title="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>" ></a>
                                <div class="clearfix">
                                    <div class="score"><?php echo $this->_var['lang']['integral']; ?> <?php echo $this->_var['goods']['exchange_integral']; ?></div>
                                    <div class="market"><?php echo $this->_var['goods']['market_price']; ?></div>
                                </div>
                                <a  href="<?php echo $this->_var['goods']['url']; ?>" target="_blank" class="name" title="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>"><?php echo htmlspecialchars($this->_var['goods']['name']); ?></a>
                                <div class="already">
                                    <i class="iconfont icon-package"></i>
                                    <?php echo empty($this->_var['goods']['sales_volume']) ? '0' : $this->_var['goods']['sales_volume']; ?><?php echo $this->_var['lang']['People_exchange']; ?>
                                </div>
                                <a href="<?php echo $this->_var['goods']['url']; ?>" class="ex-btn" target="_blank"><?php echo $this->_var['lang']['Redeem_now']; ?></a>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                </ul>
                <?php echo $this->fetch('library/pages.lbi'); ?>
                <?php else: ?>
                <div class="no_records no_records_tc">
                    <i class="no_icon_two"></i>
                    <div class="no_info">
                        <h3><?php echo $this->_var['lang']['information_null']; ?></h3>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php 
$k = array (
  'name' => 'user_menu_position',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>
    <?php echo $this->fetch('library/page_footer.lbi'); ?>
    
    <?php echo $this->smarty_insert_scripts(array('files'=>'cart_common.js,cart_quick_links.js')); ?>
    <script type="text/javascript" src="themes/<?php echo $GLOBALS['_CFG']['template']; ?>/js/dsc-common.js"></script>
    <script type="text/javascript" src="themes/<?php echo $GLOBALS['_CFG']['template']; ?>/js/jquery.purebox.js"></script>
</body>
</html>
