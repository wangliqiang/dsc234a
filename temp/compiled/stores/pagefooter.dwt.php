<?php echo $this->smarty_insert_scripts(array('files'=>'jquery.purebox.js')); ?>
<script type="text/javascript">
$(function(){
	$(document).on("mouseenter",".list-div tbody td",function(){
		$(this).parents("tr").addClass("tr_bg_blue");
	});
	
	$(document).on("mouseleave",".list-div tbody td",function(){
		$(this).parents("tr").removeClass("tr_bg_blue");
	});
	
	//底部悬浮在浏览器底部
	/*$(document).ready(function(e){
    	var wheight = $(window).height();
		
		var height = $(".header").outerHeight() + $(".content").outerHeight() + $(".footer").outerHeight();
		if(wheight > height){
			$(".footer").css({"position":"absolute","bottom":0});
		}else{
			$(".footer").css({"position":"static","bottom":0});
		}
    });*/
});
</script>
<script>
	/* 检查新订单的时间间隔 */
	var NEW_ORDER_INTERVAL = 180000;
	/* 开始检查新订单；*/
	function startCheckOrder()
	{
	  checkOrder();
	  window.setInterval("checkOrder()", NEW_ORDER_INTERVAL);
	}
	function checkOrder(){
		Ajax.call('index.php?is_ajax=1&act=check_order','', checkOrderResponse, 'GET', 'JSON');
	}
	/* *
	 * 处理检查订单的反馈信息
	 */
	function checkOrderResponse(data)
	{
	  //出错屏蔽
	  if (data.error != 0)
	  {
		return;
	  }
	  try
	  {
		var new_orders = data.new_orders ? data.new_orders :0;
		var total = parseInt(new_orders);
		$('.order').html("(" + total + ")");
	  }
	  catch (e) {}
	}
</script>
<div class="footer">
	<p>版权所有 © 2005-2017 上海商创网络科技有限公司，并保留所有权利。</p>
</div>
</body>
</html>