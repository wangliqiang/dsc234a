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
<link rel="stylesheet" type="text/css" href="themes/<?php echo $GLOBALS['_CFG']['template']; ?>/css/select.css" />
</head>

<body>
	<?php echo $this->fetch('library/page_header_category.lbi'); ?>
	<div class="w w1390">
    	<div class="crumbs-nav">
            <div class="crumbs-nav-main clearfix">
                 <?php echo $this->fetch('library/ur_here.lbi'); ?>
            </div>
        </div>
    </div>
    <div class="container">
    	<div class="w w1390">
            <?php echo $this->fetch('library/goods_list.lbi'); ?>
        </div>
    </div>
    <?php 
$k = array (
  'name' => 'user_menu_position',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>
    	 
	<?php echo $this->fetch('library/duibi.lbi'); ?>
    
    <?php echo $this->fetch('library/page_footer.lbi'); ?>
    
    <?php echo $this->smarty_insert_scripts(array('files'=>'jquery.SuperSlide.2.1.1.js,common.js,compare.js,cart_common.js,parabola.js,shopping_flow.js,cart_quick_links.js,jd_choose.js')); ?>
	<script type="text/javascript" src="themes/<?php echo $GLOBALS['_CFG']['template']; ?>/js/dsc-common.js"></script>
    <script type="text/javascript" src="themes/<?php echo $GLOBALS['_CFG']['template']; ?>/js/jquery.purebox.js"></script>
	<script type="text/javascript">
	$(function(){
		$(".gl-i-wrap").slide({mainCell:".sider ul",effect:"left",pnLoop:false,autoPlay:false,autoPage:true,prevCell:".sider-prev",nextCell:".sider-next",vis:5});
		
		//对比
		Compare.init();
	});
	
	//删除历史记录
    function delHistory(goods_id){
        pbDialog(json_languages.delete_history,"",0,'','',"",true,function delete_history(){
			Ajax.call('history_list.php', 'act=delHistory&goods_id=' + goods_id, function(){
				location.reload();
			}, 'GET', 'JSON');
		});
    }
    </script>
</body>
</html>
