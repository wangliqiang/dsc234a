<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="<?php echo $this->_var['keywords']; ?>" />
<meta name="Description" content="<?php echo $this->_var['description']; ?>" />

<title><?php echo $this->_var['page_title']; ?></title>



<link rel="shortcut icon" href="favicon.ico" />
<?php echo $this->fetch('library/js_languages_new.lbi'); ?>
<link rel="stylesheet" type="text/css" href="themes/<?php echo $GLOBALS['_CFG']['template']; ?>/css/suggest.css" />
</head>

<body>
	<?php echo $this->fetch('library/page_header_common.lbi'); ?>
    <div class="content">
        <div class="banner street-banner">
            <?php 
$k = array (
  'name' => 'get_adv_child',
  'ad_arr' => $this->_var['store_street_ad'],
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>
        </div>
        <div class="street-main">
            <div class="w w1200">
                <div class="selector gb-selector street-filter-wapper">
                    <?php if ($this->_var['categories_pro']): ?>
                    <div class="s-line">
                        <div class="s-l-wrap">
                            <div class="s-l-tit"><span><?php echo $this->_var['lang']['category']; ?>：</span></div>
                            <div class="s-l-value">
                                <div class="s-l-v-list">
                                    <ul>
                                        <li class="curr"><a href="javascript:void(0);"  data-val="0" data-type="search_cat" data-region="6" ectype="street_area"><?php echo $this->_var['lang']['all_attribute']; ?></a></li>
                                        <?php $_from = $this->_var['categories_pro']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cat');if (count($_from)):
    foreach ($_from AS $this->_var['cat']):
?>
                                        <li><a href="javascript:void(0);"  data-val="<?php echo $this->_var['cat']['id']; ?>" data-type="search_cat" data-region="6" ectype="street_area"><?php if ($this->_var['cat']['cat_alias_name']): ?><?php echo $this->_var['cat']['cat_alias_name']; ?><?php else: ?><?php echo $this->_var['cat']['cat_name']; ?><?php endif; ?></a></li>
                                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php if ($this->_var['province_list']): ?>
                    <div class="s-line">
                        <div class="s-l-wrap">
                            <div class="s-l-tit"><span><?php echo $this->_var['lang']['province']; ?>：</span></div>
                            <div class="s-l-value">
                                <div class="s-l-v-list">
                                    <ul>
                                        <li <?php if (! $this->_var['store_province']): ?>class="curr"<?php endif; ?>><a href="javascript:void(0);" data-val="0" data-type="search_city" data-region="1" ectype="street_area"><?php echo $this->_var['lang']['all_attribute']; ?></a></li>
                                        <?php $_from = $this->_var['province_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'province_0_06160600_1507433672');if (count($_from)):
    foreach ($_from AS $this->_var['province_0_06160600_1507433672']):
?>
                                        <li <?php if ($this->_var['province_0_06160600_1507433672']['region_id'] == $this->_var['store_province']): ?>class="curr"<?php endif; ?>><a href="javascript:void(0);" data-val="<?php echo $this->_var['province_0_06160600_1507433672']['region_id']; ?>" data-type="search_city" data-region="1" ectype="street_area" ><?php echo $this->_var['province_0_06160600_1507433672']['region_name']; ?></a></li>
                                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="store_city"></div>
                    <div id="store_district"></div>
                    <?php endif; ?>
                    <input name="store_user" id="res_store_user" value="" type="hidden" />
                    <input name="store_province" id="res_store_province" value="" type="hidden" />
                    <input name="store_city" id="res_store_city" value="" type="hidden" />
                    <input name="store_district" id="res_store_district" value="" type="hidden" />
                    <div class="s-line">
                        <div class="s-l-wrap">
                            <div class="s-l-tit"><span><?php echo $this->_var['lang']['sort_order_street']; ?>：</span></div>
                            <div class="s-l-value">
                                <div class="mod-list-sort">
                                    <div class="sort-l">
                                        <!--<a href="javascript:void(0);" class="sort-item curr" ectype="seller_sort" data-sort='shop_id' data-order='DESC'><?php echo $this->_var['lang']['default']; ?></a>-->
                                        <a href="javascript:void(0);" class="sort-item" ectype="seller_sort" data-sort='sort_order' data-order='DESC'><?php echo $this->_var['lang']['index_hot']; ?><i class="iconfont icon-up1"></i></a>
                                        <a href="javascript:void(0);" class="sort-item" ectype="seller_sort" data-sort='sales_volume' data-order='DESC'><?php echo $this->_var['lang']['sales_volume']; ?><i class="iconfont icon-up1"></i></a>
                                        <a href="javascript:void(0);" class="sort-item" ectype="seller_sort" data-sort='goods_number' data-order='DESC'><?php echo $this->_var['lang']['score_street']; ?><i class="iconfont icon-up1"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="street-list" ectype="store_shop_list" id="store_shop_list">
					<?php echo $this->fetch('/library/store_shop_list.lbi'); ?>
                </div>
                <div class="sellerlist" ectype="pages_ajax" id="pages_ajax">
                	<?php echo $this->fetch('/library/pages_ajax.lbi'); ?>
                </div>
            </div>
        </div>
    </div>
    <input name="area_list" value="" type="hidden" />
    <input name="user_id" value="<?php echo $this->_var['user_id']; ?>" type="hidden" />
    <?php 
$k = array (
  'name' => 'user_menu_position',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>

    <?php echo $this->fetch('library/page_footer.lbi'); ?>
    
    <?php echo $this->smarty_insert_scripts(array('files'=>'jquery.SuperSlide.2.1.1.js,common.js,cart_common.js,parabola.js,shopping_flow.js,cart_quick_links.js')); ?>
	<script type="text/javascript" src="themes/<?php echo $GLOBALS['_CFG']['template']; ?>/js/dsc-common.js"></script>
    <script type="text/javascript" src="themes/<?php echo $GLOBALS['_CFG']['template']; ?>/js/jquery.purebox.js"></script>
    <script type="text/javascript" src="themes/<?php echo $GLOBALS['_CFG']['template']; ?>/js/masonry.pkgd.min.js"></script>
    <script type="text/javascript" src="themes/<?php echo $GLOBALS['_CFG']['template']; ?>/js/imagesloaded.pkgd.js"></script>
    <script type="text/javascript">
        function street(){
			$('.street-list').masonry('destroy');
			
			var masonryOptions = {
				columWidth: '.grid-sizer',
				gutter: '.gutter-sizer',
				itemSelector: '.street-list-item',
				percentPosition: true
			}
			
			var $grid = $('.street-list').masonry( masonryOptions );

			$grid.imagesLoaded().progress(function() {
				$grid.masonry();
			});
		}
		street();
    </script>
</body>
</html>
