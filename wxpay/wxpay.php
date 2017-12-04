<?php
/**
 * Created by PhpStorm.
 * User: 王立强
 * Date: 2017/11/13
 * Time: 9:19
 */

define('IN_ECS', true);
require dirname(__FILE__) . '/../includes/init.php';

$dataxml = file_get_contents('php://input');

$objectxml = (array)simplexml_load_string($dataxml, 'SimpleXMLElement', LIBXML_NOCDATA); //将微信返回的XML 转换成数组
if ($objectxml['return_code'] == 'SUCCESS') {
    if ($objectxml['result_code'] == 'SUCCESS') {//如果这两个都为此状态则返回mweb_url，详情看‘支付回调’接口文档
        // 改变订单状态
        $notify = 'UPDATE dsc_order_info SET order_status = 1,confirm_time = SYSDATE(),pay_status = 2,pay_time = SYSDATE() WHERE order_sn = \'' . $objectxml['out_trade_no'] . '\'';

        $GLOBALS['db']->query($notify);
    }
    if ($objectxml['result_code'] == 'FAIL') {
        echo $objectxml['err_code_des'];
    }
}
