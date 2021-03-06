<?php

/* 发送短信时机数组 */
$send_time = array(
    '客户下单时' => 'sms_order_placed',
    '客户付款时' => 'sms_order_payed',
    '商家发货时' => 'sms_order_shipped',
    '门店提货码' => 'store_order_code',
    '客户注册时' => 'sms_signin',
    '客户密码找回时' => 'sms_find_signin',
    '验证码通知' => 'sms_code',
    '商品降价时' => 'sms_price_notic',
    '修改商家密码时' => 'sms_seller_signin',
    '会员充值/提现时' => 'user_account_code'
);
/* 默认模板数组 */
$template = array(
    'sms_order_placed' => '您有新订单，收货人：${consignee}，联系方式：${order_mobile}，请您及时查收.',
    'sms_order_payed' => '您有新订单，收货人：${consignee}，联系方式：${order_mobile}，已付款成功.',
    'sms_order_shipped' => '尊敬的${user_name}用户，您的订单已发货，收货人${consignee}，请您及时查收.',
    'store_order_code' => '尊敬的${user_name}用户，您的提货码是：${code}，请不要把提货码泄露给其他人，如非本人操作，可不用理会.',
    'sms_signin' => '您的验证码是：${code}，请不要把验证码泄露给其他人，如非本人操作，可不用理会',
    'sms_find_signin' => '验证码${code}，用于密码找回，如非本人操作，请及时检查账户安全',
    'sms_code' => '您的验证码是：${code}，请不要把验证码泄露给其他人，如非本人操作，可不用理会',
    'sms_price_notic' => '尊敬的${user_name}用户，您关注的商品${goods_sn}，赶快下单吧！',
    'sms_seller_signin' => '亲爱的${seller_name}，您的新账号：${login_name}，新密码 ：${password}，如非本人操作，请及时核对。',
    'user_account_code' => '尊敬的${user_name}，您于${add_time}发出的${fmt_amount}元${process_type}申请于${op_time}${examine}审核，账户余额为：${user_money}，祝您购物愉快。',
);

$sms_shop_mobile = isset($GLOBALS['_CFG']['sms_shop_mobile']) ? $GLOBALS['_CFG']['sms_shop_mobile'] : 11111111111;
$test = array(
    'user_name' => '测试账号',
    'order_sn' => '0000000123456789',
    'code' => get_mt_rand(6),
    'shop_name' => "大商创",
    'consignee' => "模板堂",
    'store_address' => '上海 上海 普陀区 中山北路3553号301室',
    'order_region' => "上海普陀区",
    'address' => "中山北路3993弄301室",
    'order_mobile' => $sms_shop_mobile,
    'product' => "测试账号",
    'goods_sn' => "ECS000001",
    'seller_name' => "B2B2C系统",
    'login_name' => "ecmoban_dsc",
    'password' => 'admin123'
);
?>