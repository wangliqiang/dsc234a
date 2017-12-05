<?php
namespace app\http\user\controllers;

class Account extends \app\http\base\controllers\Frontend
{
    /**
     * 用户id
     * @var
     */
    public $user_id;

    public function __construct()
    {
        parent::__construct();
        $this->user_id = $_SESSION['user_id'];
        $this->actionchecklogin();
        L(require LANG_PATH . C('shop.lang') . '/user.php');
        L(require LANG_PATH . C('shop.lang') . '/flow.php');
        $files = array('order', 'clips', 'payment', 'transaction');
        $this->load_helper($files);
    }

    public function actionIndex()
    {
        $surplus_amount = get_user_surplus($this->user_id);
        $this->assign('surplus_amount', $surplus_amount ? $surplus_amount : 0);
        $frozen_money = get_user_frozen($this->user_id);
        $this->assign('frozen_money', $frozen_money ? $frozen_money : 0);
        $this->assign('record_count', my_bonus($this->user_id));
        $sql = ' SELECT COUNT(*) AS num, SUM(card_money) AS money FROM {pre}value_card WHERE user_id = \'' . $this->user_id . '\' ';
        $vc = $this->db->getRow($sql);
        $vc['money'] = price_format($vc['money']);
        $this->assign('value_card', $vc);
        $pay_points = $this->db->getOne('SELECT  pay_points FROM {pre}users WHERE user_id=\'' . $this->user_id . '\'');
        $this->assign('pay_points', $pay_points ? $pay_points : 0);
        $this->assign('page_title', L('label_user_surplus'));
        $this->display();
    }

    public function actionShareholder()
    {
        $sql = 'select user_name,mobile_phone from {pre}users where user_id = \'' . $this->user_id . '\'';
        $userinfo = $this->db->getRow($sql);
        $this->assign('userinfo', $userinfo);
        $this->assign('page_title', '成为共享');
        $this->display();
    }

    public function actionShareholderDetail()
    {
        $getShareHolderInfo = 'SELECT u.user_id, u.user_name, u.mobile_phone,s.id,s.share_realname,s.share_number,s.share_principal,s.share_bonus,s.share_date,s.share_status,(SELECT stock_price FROM ' . $GLOBALS['ecs']->table('share_stock') . ' WHERE stock_status = 1 ) as price,FORMAT (s.share_number * (SELECT stock_price FROM ' . $GLOBALS['ecs']->table('share_stock') . ' WHERE stock_status = 1) - s.share_principal,2) AS profit,FORMAT (s.share_number * (SELECT stock_price FROM ' . $GLOBALS['ecs']->table('share_stock') . ' WHERE stock_status = 1),2) AS total FROM ' . $GLOBALS['ecs']->table('users') . ' AS u inner join' . $GLOBALS['ecs']->table('shareholder') . 'as s on u.user_id = s.user_id WHERE s.user_id = \'' . $this->user_id . '\'';
        $shareHolderInfo = $this->db->getRow($getShareHolderInfo);
        $this->assign('shareholder', $shareHolderInfo);
        $this->assign('page_title', '收益信息');
        $this->display();
    }

    public function actionAddShareholder()
    {

        $realname = (empty($_POST['realname']) ? '' : trim($_POST['realname']));
        $identity = (empty($_POST['identity']) ? '' : trim($_POST['identity']));
        $phone = $_POST['mobile_phone'];
        $country = '1';
        $province = $_POST['province_region_id'];
        $city = $_POST['city_region_id'];
        $district = $_POST['district_region_id'];
        $address_detail = $_POST['address'];

        $sql = 'insert into {pre}shareholder (user_id,share_realname,share_identity,share_phone,country,province,city,district,share_address,share_date,share_status) '
            . ' VALUES (\'' . $this->user_id . '\',\'' . $realname . '\',\'' . $identity . '\',\'' . $phone . '\',\'' . $country . '\',\'' . $province . '\',\'' . $city . '\',\'' . $district . '\',\'' . $address_detail . '\', SYSDATE(),0)';
        $this->db->query($sql);

        $this->redirect('user/index/index');
    }

    public function actionDistribution()
    {
        $sql = 'select user_name,mobile_phone from {pre}users where user_id = \'' . $this->user_id . '\'';
        $dis_phone = $this->db->getRow($sql);
        $dis_list = 'SELECT u.user_id, u.user_name,u.mobile_phone,FORMAT(SUM(order_amount)*(select dis_percent from ' . $GLOBALS['ecs']->table('distribution') . ')/100,2) as dis_price FROM ' . $GLOBALS['ecs']->table('users') . ' as u
            INNER JOIN ' . $GLOBALS['ecs']->table('order_info') . ' as i ON u.user_id = i.user_id
            INNER JOIN ' . $GLOBALS['ecs']->table('order_goods') . ' AS g ON i.order_id = g.order_id  WHERE recommender = \'' . $dis_phone['mobile_phone'] . '\' and i.pay_status = 2 ';
        $user_list = $this->db->getAll($dis_list);
        $dis_amount = $this->db->getOne('select dis_amount from dsc_users where user_id = \'' . $this->user_id . '\'');

        $totalAmount = 0;
        foreach ($user_list as $k => $v) {
            $totalAmount += $v['dis_price'];
        }
        $this->assign('user_list', $user_list);
        $this->assign('dis_user', $dis_phone);//用户
        $this->assign("teamCount", count($user_list));
        $this->assign('totalAmount', $totalAmount);//总分红
        $this->assign('dis_amount', $dis_amount);//已分红
        $this->assign('surplus_amount', $totalAmount - $dis_amount);//剩余分红
        $this->assign('page_title', '分销信息');
        $this->display();
    }

    public function actionDistributionApply()
    {
        $this->assign('page_title', '申请分成');
        $this->display();
    }

    public function actionDistributionApplyAdd()
    {
        $dis_money = (empty($_POST['dis_money']) ? '' : trim($_POST['dis_money']));
        $dis_memo = (empty($_POST['dis_memo']) ? '' : trim($_POST['dis_memo']));
        $dis_status = '申请中';
        $sql = 'insert into {pre}distribution_apply (user_id,dis_money,dis_memo,dis_status,dis_date) VALUES (' . $this->user_id . ',' . $dis_money . ',\'' . $dis_memo . '\',\'' . $dis_status . '\',SYSDATE())';
        $this->db->query($sql);
        $this->redirect('user/account/distribution');
    }

    public function actionDistributionDetail()
    {

        $sql = 'select d.id,d.user_id,d.dis_money,d.dis_memo,d.dis_status,d.dis_date,u.user_name,u.mobile_phone from {pre}distribution_apply as d INNER JOIN {pre}users as u ON d.user_id = u.user_id where d.user_id = \'' . $this->user_id . '\' order by d.dis_date desc';
        $applyList = $this->db->getAll($sql);
        $record_count = 'select count(*) from {pre}distribution_apply as d INNER JOIN {pre}users as u ON d.user_id = u.user_id where d.user_id = \'' . $this->user_id . '\'';
        if (IS_AJAX) {
            $page = I('page', 1, 'intval');
            $offset = 10;
            $page_size = ceil($record_count / $offset);
            exit(json_encode(array('applyList' => $applyList, 'totalPage' => $page_size)));
        }

        $this->assign('page_title', '分成明细');
        $this->display();
    }

    public function actionDistributionOrder()
    {

        $sql = 'select user_name,mobile_phone from {pre}users where user_id = \'' . $this->user_id . '\'';
        $dis_phone = $this->db->getRow($sql);
        $goods = 'SELECT u.user_id, u.user_name,u.mobile_phone,g.goods_id,g.goods_name,g.market_price,i.order_id,i.order_sn,i.goods_amount,i.pay_name,i.consignee,
          FORMAT(order_amount*(select dis_percent from ' . $GLOBALS['ecs']->table('distribution') . ')/100,2) as dis_price 
          FROM ' . $GLOBALS['ecs']->table('users') . ' as u
            INNER JOIN ' . $GLOBALS['ecs']->table('order_info') . ' as i ON u.user_id = i.user_id
            INNER JOIN ' . $GLOBALS['ecs']->table('order_goods') . ' AS g ON i.order_id = g.order_id  
            WHERE recommender = \'' . $dis_phone['mobile_phone'] . '\' and i.pay_status = 2 ';
        $list = $this->db->getAll($goods);
        if (IS_AJAX) {
            $page = I('page', 1, 'intval');
            $offset = 10;
            $page_size = ceil(count($list) / $offset);

            exit(json_encode(array('goods_list' => $list, 'totalPage' => $page_size)));
        }

        $this->assign('page_title', '分成订单');
        $this->display();
    }

    public function actionDetail()
    {
        $account_type = 'user_money';
        $sql = 'SELECT COUNT(*) FROM  {pre}account_log WHERE user_id = ' . $this->user_id . ' AND ' . $account_type . ' <> 0 ';
        $record_count = $this->db->getOne($sql);
        $pager = get_pager('user.php', array('act' => $action), $record_count, $page);
        $surplus_amount = get_user_surplus($this->user_id);
        $account_log = array();
        $sql = 'SELECT * FROM {pre}account_log WHERE user_id = ' . $this->user_id . ' AND ' . $account_type . ' <> 0 ORDER BY log_id DESC limit 0,10';
        $res = $this->db->getAll($sql);

        foreach ($res as $row) {
            $row['change_time'] = local_date($GLOBALS['_CFG']['date_format'], $row['change_time']);
            $row['type'] = 0 < $row[$account_type] ? '+' : '';
            $row['short_change_desc'] = sub_str($row['change_desc'], 60);
            $temp = explode(',', $row['short_change_desc']);

            if (count($temp) == 2) {
                $row['short_change_desc_part1'] = $temp[0];
                $row['short_change_desc_part2'] = $temp[1];
            }

            $row['amount'] = $row[$account_type];
            $account_log[] = $row;
        }

        $this->assign('account_log', $account_log);
        $this->assign('page_title', L('account_detail'));
        $this->display();
    }

    public function actionDistributionTeam()
    {

        $sql = 'select user_name,mobile_phone from {pre}users where user_id = \'' . $this->user_id . '\'';
        $dis_phone = $this->db->getRow($sql);
        $dis_list = 'SELECT u.user_id, u.user_name,u.mobile_phone,FORMAT(SUM(order_amount)*(select dis_percent from ' . $GLOBALS['ecs']->table('distribution') . ')/100,2) as dis_price FROM ' . $GLOBALS['ecs']->table('users') . ' as u
            INNER JOIN ' . $GLOBALS['ecs']->table('order_info') . ' as i ON u.user_id = i.user_id
            INNER JOIN ' . $GLOBALS['ecs']->table('order_goods') . ' AS g ON i.order_id = g.order_id  WHERE recommender = \'' . $dis_phone['mobile_phone'] . '\' and i.pay_status = 2 ';
        $user_list = $this->db->getAll($dis_list);

        if (IS_AJAX) {
            $page = I('page', 1, 'intval');
            $offset = 10;
            $page_size = ceil(count($user_list) / $offset);
            exit(json_encode(array('user_list' => $user_list, 'totalPage' => $page_size)));
        }

        $this->assign('page_title', '我的团队');
        $this->display();
    }

    public function actionDeposit()
    {
        $surplus_id = (isset($_GET['id']) ? intval($_GET['id']) : 2);
        $account = get_surplus_info($surplus_id);
        $payment_list = get_online_payment_list(false);

        foreach ($payment_list as $key => $val) {
            if (!file_exists(ADDONS_PATH . 'payment/' . $val['pay_code'] . '.php')) {
                unset($payment_list[$key]);
            }
        }

        $this->assign('payment', $payment_list);
        $this->assign('order', $account);
        $this->assign('process_type', $surplus_id);
        $this->assign('page_title', L('account_user_charge'));
        $this->display();
    }

    public function actionAccountRaply()
    {
        $surplus_amount = get_user_surplus($this->user_id);

        if (empty($surplus_amount)) {
            $surplus_amount = 0;
        }

        $sql = 'SELECT * FROM {pre}users_real WHERE review_status = 1 AND user_id=' . $this->user_id;
        $result = $this->db->getRow($sql);

        if (!$result) {
            ecs_header('Location: ' . url('user/profile/realname'));
        }

        $bank = array(
            array('bank_name' => $result['bank_name'], 'bank_card' => substr($result['bank_card'], 0, 4) . '******' . substr($result['bank_card'], -4), 'bank_region' => $result['bank_name'], 'bank_user_name' => $result['real_name'], 'bank_card_org' => $result['bank_card'], 'bank_mobile' => $result['bank_mobile'])
        );
        $this->assign('bank', $bank);
        $this->assign('surplus_amount', price_format($surplus_amount, false));
        $this->assign('page_title', L('label_user_surplus'));
        $this->display();
    }

    public function actionAccount()
    {
        if (I('surplus_type') == 1) {
            $real_id = $this->db->table('users_real')->where(array('user_id' => $this->user_id))->find();

            if (empty($real_id)) {
                show_message(L('user_real'));
            }
        }

        $amount = (isset($_POST['amount']) ? floatval($_POST['amount']) : 0);

        if ($amount <= 0) {
            show_message(L('amount_gt_zero'));
        }

        $surplus = array('user_id' => $this->user_id, 'rec_id' => !empty($_POST['rec_id']) ? intval($_POST['rec_id']) : 0, 'process_type' => isset($_POST['surplus_type']) ? intval($_POST['surplus_type']) : 0, 'payment_id' => isset($_POST['payment_id']) ? intval($_POST['payment_id']) : 0, 'user_note' => isset($_POST['user_note']) ? trim($_POST['user_note']) : '', 'amount' => $amount);

        if ($surplus['process_type'] == 1) {
            if (config('shop.sms_signin')) {
                if (($_POST['mobile'] != $_SESSION['sms_mobile']) || ($_POST['mobile_code'] != $_SESSION['sms_mobile_code'])) {
                    show_message(L('mobile_code_fail'), L('back_input_code'), '', 'error');
                }
            }

            $sur_amount = get_user_surplus($this->user_id);

            if ($sur_amount < $amount) {
                $content = L('surplus_amount_error');
                show_message($content, L('back_page_up'), '', 'info');
            }

            if (empty($_POST['bank_number']) || empty($_POST['real_name'])) {
                $content = L('account_withdraw_deposit');
                show_message($content, L('account_submit_information'), '', 'warning');
            }

            $frozen_money = $amount;
            $amount = '-' . $amount;
            $surplus['payment'] = '';
            $surplus['rec_id'] = insert_user_account($surplus, $amount);

            if (0 < $surplus['rec_id']) {
                $user_account_fields = array('user_id' => $surplus['user_id'], 'account_id' => $surplus['rec_id'], 'bank_number' => !empty($_POST['bank_number']) ? trim($_POST['bank_number']) : '', 'real_name' => !empty($_POST['real_name']) ? trim($_POST['real_name']) : '');
                insert_user_account_fields($user_account_fields);
                log_account_change($this->user_id, $amount, $frozen_money, 0, 0, '【' . L('application_withdrawal') . '】' . $surplus['user_note'], ACT_ADJUSTING);
                unset($_SESSION['sms_mobile']);
                unset($_SESSION['sms_mobile_code']);
                $content = L('surplus_appl_submit');
                show_message($content, L('back_account_log'), url('log'), 'info');
            } else {
                $content = L('process_false');
                show_message($content, L('back_page_up'), '', 'info');
            }
        } else {
            if ($surplus['payment_id'] <= 0) {
                show_message(L('select_payment_pls'));
            }

            $payment_info = array();
            $payment_info = payment_info($surplus['payment_id']);
            $surplus['payment'] = $payment_info['pay_name'];

            if (0 < $surplus['rec_id']) {
                $surplus['rec_id'] = update_user_account($surplus);
            } else {
                $surplus['rec_id'] = insert_user_account($surplus, $amount);
            }

            $payment = unserialize_config($payment_info['pay_config']);
            $order = array();
            $order['order_sn'] = $surplus['rec_id'];
            $order['user_name'] = $_SESSION['user_name'];
            $order['surplus_amount'] = $amount;
            $payment_info['pay_fee'] = pay_fee($surplus['payment_id'], $order['surplus_amount'], 0);
            $order['order_amount'] = $amount + $payment_info['pay_fee'];
            $order['log_id'] = insert_pay_log($surplus['rec_id'], $order['order_amount'], $type = PAY_SURPLUS, 0);

            if (!file_exists(ADDONS_PATH . 'payment/' . $payment_info['pay_code'] . '.php')) {
                unset($payment_info['pay_code']);
                ecs_header('Location: ' . url('user/account/log'));
            } else {
                include_once ADDONS_PATH . 'payment/' . $payment_info['pay_code'] . '.php';
                $pay_obj = new $payment_info['pay_code']();
                $payment_info['pay_button'] = $pay_obj->get_code($order, $payment);
                if (strpos($payment_info['pay_button'], '微信中') && (!is_wechat_browser() || empty($_SESSION['openid']))) {
                    $payment_info['pay_button'] = '<a class="box-flex btn-submit min-two-btn" type="button" href="' . url('user/account/payment', array('pay_name' => '微信支付', 'orderid' => $order['order_sn'], 'totalfee' => $_POST['amount'], 'goodname' => '充值')) . '">微信支付</a>';
                }
                $this->assign('payment', $payment_info);
                $this->assign('pay_fee', price_format($payment_info['pay_fee'], false));
                $this->assign('amount', price_format($amount, false));
                $this->assign('order', $order);
                $this->assign('type', 1);
                $this->assign('page_title', L('account_charge'));
                $this->assign('but', $payment_info['pay_button']);
                $this->display();
            }
        }
    }

    public function actionPayment()
    {
        $pay_name = $_GET['pay_name'];
        $orderid = $_GET['orderid'];
        $totalfee = $_GET['totalfee'] * 100;
        $subject = $_GET['goodname'];//描述
        if ($pay_name === '微信支付') {//微信支付
            $nonce_str = md5($orderid);
            $spbill_create_ip = $this->getIp();
            $trade_type = 'MWEB';//交易类型 具体看API 里面有详细介绍
            $notify_url = notify_url(basename(__FILE__, '.php')); //回调地址
            $scene_info = '{"h5_info":{"type":"Wap","wap_url":"http://www.nongyepark.net/mobile","wap_name":"微信支付"}}';  //场景信息
            //对参数按照key=value的格式，并按照参数名ASCII字典序排序生成字符串
            $appid = 'wx8bf3494ef096a20c';
            $mch_id = '1430990802';
            $key = 'oGf1Acf04q9b3C1Pb4ZpcsE0T4P41q4S';
            $signA = "appid=$appid&body=$subject&mch_id=$mch_id&nonce_str=$nonce_str&notify_url=$notify_url&out_trade_no=$orderid&scene_info=$scene_info&spbill_create_ip=$spbill_create_ip&total_fee=$totalfee&trade_type=$trade_type";
            $strSignTmp = $signA . "&key=$key"; //拼接字符串
            $sign = strtoupper(md5($strSignTmp)); // MD5 后转换成大写
            $post_data = "<xml>
                       <appid>wx8bf3494ef096a20c</appid>
                       <mch_id>1430990802</mch_id>
                       <body>$subject</body>
                       <nonce_str>$nonce_str</nonce_str>
                       <notify_url>$notify_url</notify_url>
                       <out_trade_no>$orderid</out_trade_no>
                       <scene_info>$scene_info</scene_info>
                       <spbill_create_ip>$spbill_create_ip</spbill_create_ip>
                       <total_fee>$totalfee</total_fee>
                       <trade_type>$trade_type</trade_type>
                       <sign>$sign</sign>
                   </xml>";//拼接成XML格式
            $url = "https://api.mch.weixin.qq.com/pay/unifiedorder";//微信传参地址
            $dataxml = $this->http_post($url, $post_data); //后台POST微信传参地址  同时取得微信返回的参数，http_post方法请看下文
            $objectxml = (array)simplexml_load_string($dataxml, 'SimpleXMLElement', LIBXML_NOCDATA); //将微信返回的XML 转换成数组
            if ($objectxml['return_code'] == 'SUCCESS') {
                if ($objectxml['result_code'] == 'SUCCESS') {//如果这两个都为此状态则返回mweb_url，详情看‘统一下单’接口文档
                    $this->assign('url', $objectxml['mweb_url']);
//                    return $objectxml['mweb_url']; //mweb_url是微信返回的支付连接要把这个连接分配到前台
                }
                if ($objectxml['result_code'] == 'FAIL') {
                    echo $objectxml['err_code_des'];
                }
            }
        }
        $this->assign('page_title', '微信支付');
        $this->display();
    }

    function http_post($url, $data)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_URL, $url);
        if (stripos($url, "https://") !== FALSE) {
            curl_setopt($ch, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        } else {
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, TRUE);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);//严格校验
        }
        curl_setopt($ch, CURLOPT_REFERER, 'www.ilaike.net/mobile');
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $res = curl_exec($ch);
        curl_close($ch);
        return $res;
    }

    //获取用户真实IP
    public static function getIp()
    {
        $ip = '';
        if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        $ip_arr = explode(',', $ip);
        return $ip_arr[0];
    }

    public function actionLog()
    {
        $sql = 'SELECT COUNT(*) FROM {pre}user_account  WHERE user_id = \'' . $this->user_id . '\'  AND process_type ' . db_create_in(array(SURPLUS_SAVE, SURPLUS_RETURN));
        $record_count = $this->db->getOne($sql);

        if (IS_AJAX) {
            $page = I('page', 1, 'intval');
            $offset = 10;
            $page_size = ceil($record_count / $offset);
            $limit = ' LIMIT ' . (($page - 1) * $offset) . ',' . $offset;
            $log_list = get_account_log($this->user_id, '', '', '', $count, $limit);
            exit(json_encode(array('log_list' => $log_list['log_list'], 'totalPage' => $page_size, 'count' => $count)));
        }

        $this->assign('page_title', L('account_apply_record'));
        $this->display();
    }

    public function actionAccountDetail()
    {
        $page = (isset($_REQUEST['page']) ? intval($_REQUEST['page']) : 1);
        $id = (isset($_REQUEST['id']) ? intval($_REQUEST['id']) : '');
        $log_detail = get_account_log($this->user_id, $pager['size'], $pager['start'], $id);
        $account_log = $log_detail['log_list'];

        if (!$account_log) {
            $this->redirect('user/account/log');
        }

        foreach ($account_log as $key => $val) {
            $account_log[$key]['pay_fee'] = empty($val['pay_fee']) ? price_format(0) : price_format($val['pay_fee']);
        }

        $this->assign('surplus_amount', price_format($surplus_amount, false));
        $this->assign('account_log', $account_log);
        $this->assign('pager', $pager);
        $this->assign('page_title', L('account_details'));
        $this->display('account');
    }

    public function actionCancel()
    {
        $id = (isset($_GET['id']) ? intval($_GET['id']) : 0);
        if (($id == 0) || ($this->user_id == 0)) {
            ecs_header('Location: ' . url('user/account/log'));
            exit();
        }

        $result = del_user_account($id, $this->user_id);

        if ($result) {
            ecs_header('Location: ' . url('user/account/log'));
            exit();
        }
    }

    public function actionBonus()
    {
        if (IS_AJAX) {
            $page = I('page', 0, 'intval');
            $size = I('size', 0, 'intval');
            $type = I('type', 0, 'intval');
            $num = get_user_conut_bonus($this->user_id);
            $bonus = get_user_bouns_list($this->user_id, $type, $size, ($page - 1) * $size);
            $result['totalPage'] = ceil($num / $size);
            $result['bonus'] = $bonus;
            echo json_encode($result);
            exit();
        }

        $bonus1 = get_user_bouns_list($this->user_id, 0, 15, 0);
        $bonus2 = get_user_bouns_list($this->user_id, 1, 15, 0);
        $bonus3 = get_user_bouns_list($this->user_id, 2, 15, 0);
        $status['one'] = count($bonus1);
        $status['two'] = count($bonus2);
        $status['three'] = count($bonus3);
        $this->assign('status', $status);
        $this->assign('page_title', L('account_discount_list'));
        $this->display();
    }

    public function actionCoupont()
    {
        $size = 10;
        $page = I('page', 1, 'intval');
        $status = I('status', 0, 'intval');

        if (IS_AJAX) {
            $coupons_list = get_coupons_lists($size, $page, $status);
            exit(json_encode(array('coupons_list' => $coupons_list, 'totalPage' => $coupons_list['totalpage'])));
        }

        $this->assign('status', $status);
        $this->assign('page_title', L('coupont_list'));
        $this->display();
    }

    public function actionAddbonus()
    {
        if (IS_POST) {
            $bouns_sn = (isset($_POST['bonus_sn']) ? intval($_POST['bonus_sn']) : '');
            $bouns_password = (isset($_POST['bouns_password']) ? $_POST['bouns_password'] : '');

            if (add_bonus($this->user_id, $bouns_sn, $bouns_password)) {
                show_message(L('add_bonus_sucess'), L('back_up_page'), url('user/account/bonus'), 'info');
            } else {
                show_message(L('add_bonus_false'), L('back_up_page'), url('user/account/bonus'));
            }
        }

        $this->assign('page_title', L('add_bonus'));
        $this->display();
    }

    public function actionExchange()
    {
        $page = (isset($_REQUEST['page']) ? intval($_REQUEST['page']) : 1);
        $account_type = 'pay_points';
        $sql = 'SELECT COUNT(*) FROM {pre}account_log  WHERE user_id = \'' . $this->user_id . '\'  AND ' . $account_type . ' <> 0 ';
        $record_count = $this->db->getOne($sql);
        $pager = get_pager(url('user/account/exchange'), array(), $record_count, $page);
        $pay_points = $this->db->getOne('SELECT  pay_points FROM {pre}users WHERE user_id=\'' . $this->user_id . '\'');

        if (empty($pay_points)) {
            $pay_points = 0;
        }

        $account_log = array();
        $sql = 'SELECT * FROM {pre}account_log  WHERE user_id = \'' . $this->user_id . '\'  AND ' . $account_type . ' <> 0   ORDER BY log_id DESC';
        $res = $GLOBALS['db']->selectLimit($sql, $pager['size'], $pager['start']);

        foreach ($res as $row) {
            $row['change_time'] = local_date(C('shop.date_format'), $row['change_time']);
            $row['type'] = 0 < $row[$account_type] ? L('account_inc') : L('account_dec');
            $row['user_money'] = price_format(abs($row['user_money']), false);
            $row['frozen_money'] = price_format(abs($row['frozen_money']), false);
            $row['rank_points'] = abs($row['rank_points']);
            $row['pay_points'] = abs($row['pay_points']);
            $row['short_change_desc'] = sub_str($row['change_desc'], 60);
            $row['amount'] = $row[$account_type];
            $account_log[] = $row;
        }

        $this->assign('pay_points', $pay_points);
        $this->assign('account_log', $account_log);
        $this->assign('pager', $pager);
        $this->display();
    }

    public function actionchecklogin()
    {
        if (!$this->user_id) {
            $url = urlencode(__HOST__ . $_SERVER['REQUEST_URI']);

            if (IS_POST) {
                $url = urlencode($_SERVER['HTTP_REFERER']);
            }

            ecs_header('Location: ' . url('user/login/index', array('back_act' => $url)));
            exit();
        }
    }

    public function actionPay()
    {
        $surplus_id = (isset($_GET['id']) ? intval($_GET['id']) : 0);
        $payment_id = (isset($_GET['pid']) ? intval($_GET['pid']) : 0);

        if ($surplus_id == 0) {
            ecs_header('Location: ' . url('user/account_log'));
            exit();
        }

        if ($payment_id == 0) {
            ecs_header('Location: ' . url('user/account_deposit', array('id' => $surplus_id)));
            exit();
        }

        $order = array();
        $order = get_surplus_info($surplus_id);
        $payment_info = array();
        $payment_info = payment_info($payment_id);

        if (!empty($payment_info)) {
            $payment = unserialize_config($payment_info['pay_config']);
            $order['order_sn'] = $surplus_id;
            $order['log_id'] = get_paylog_id($surplus_id, $pay_type = PAY_SURPLUS);
            $order['user_name'] = $_SESSION['user_name'];
            $order['surplus_amount'] = $order['amount'];
            $payment_info['pay_fee'] = pay_fee($payment_id, $order['surplus_amount'], 0);
            $order['order_amount'] = $order['surplus_amount'] + $payment_info['pay_fee'];
            $order_amount = $this->db->getOne('SELECT order_amount FROM {pre}pay_log WHERE log_id = \'' . $order['log_id'] . '\'');
            $this->db->getOne('SELECT COUNT(*) FROM {pre}order_goods WHERE order_id=\'' . $order['order_id'] . '\'AND is_real = 1');

            if ($order_amount != $order['order_amount']) {
                $this->db->query('UPDATE {pre}pay_log SET order_amount = \'' . $order['order_amount'] . '\' WHERE log_id = \'' . $order['log_id'] . '\'');
            }

            if (!file_exists(ADDONS_PATH . 'payment/' . $payment_info['pay_code'] . '.php')) {
                unset($payment_info['pay_code']);
            } else {
                include_once ADDONS_PATH . 'payment/' . $payment_info['pay_code'] . '.php';
                $pay_obj = new $payment_info['pay_code']();
                $payment_info['pay_button'] = $pay_obj->get_code($order, $payment);
            }
        }
    }

    public function actionCardList()
    {
        if (IS_AJAX) {
            $id = I('id');

            if (empty($id)) {
                exit();
            }

            $this->model->table('user_bank')->where(array('id' => $id))->delete();
            exit();
        }

        $card_list = get_card_list($this->user_id);
        $this->assign('card_list', $card_list);
        $this->assign('page_title', L('account_card_list'));
        $this->display();
    }

    public function actionAddCard()
    {
        if (IS_POST) {
            $bank_card = I('bank_card', '');
            $pre = '/^\\d*$/';

            if (!preg_match($pre, $bank_card)) {
                show_message('请输入正确的卡号');
            }

            $bank_region = I('bank_region', '');
            $bank_name = I('bank_name', '');
            $bank_user_name = I('bank_user_name', '');
            $user_id = $this->user_id;

            if ($this->user_id < 0) {
                show_message('请重新登录');
            }

            $sql = "INSERT INTO {pre}user_bank (bank_name,bank_region,bank_card,bank_user_name,user_id)\r\n                    value('" . $bank_name . '\',\'' . $bank_region . '\',' . $bank_card . ',\'' . $bank_user_name . '\',' . $user_id . ')';

            if ($this->db->query($sql)) {
                show_message(L('account_add_success'), L('account_back_list'), url('card_list'), 'success');
            } else {
                show_message(L('account_add_error'), L('account_add_continue'), url('add_card'), 'fail');
            }
        }

        $this->assign('page_title', L('account_add_card'));
        $this->display();
    }

    public function get_user_coupons_list($user_id = '', $is_use = false, $total = false, $cart_goods = false, $user = true)
    {
        $time = gmtime();
        if ($is_use && $total && $cart_goods) {
            foreach ($cart_goods as $k => $v) {
                $res[$v['ru_id']][] = $v;
            }

            foreach ($res as $k => $v) {
                foreach ($v as $m => $n) {
                    $store_total[$k] += $n['goods_price'] * $n['goods_number'];
                }
            }

            foreach ($cart_goods as $k => $v) {
                foreach ($store_total as $m => $n) {
                    $where = ' WHERE cu.is_use=0 AND c.cou_end_time > ' . $time . ' AND ' . $time . '>c.cou_start_time AND ' . $n . ' >= c.cou_man AND cu.user_id =\'' . $user_id . "'\r\n                        AND (c.cou_goods =0 OR FIND_IN_SET('" . $v['goods_id'] . '\',c.cou_goods)) AND c.ru_id=\'' . $v['ru_id'] . '\'';
                    $sql = ' SELECT c.*,cu.*,o.order_sn,o.add_time FROM ' . $GLOBALS['ecs']->table('coupons_user') . ' cu LEFT JOIN ' . $GLOBALS['ecs']->table('coupons') . ' c ON c.cou_id=cu.cou_id LEFT JOIN ' . $GLOBALS['ecs']->table('order_info') . ' o ON cu.order_id=o.order_id ' . $where . ' ';
                    $arrr[] = $GLOBALS['db']->getAll($sql);
                }
            }

            foreach ($arrr as $k => $v) {
                foreach ($v as $m => $n) {
                    $arr[$n['uc_id']] = $n;
                }
            }

            return $arr;
        } else {
            if (!empty($user_id) && $user) {
                $where = ' WHERE cu.user_id IN(' . $user_id . ')';
            } else if (!empty($user_id)) {
                $where = ' WHERE cu.user_id IN(' . $user_id . ') GROUP BY c.cou_id';
            }

            $res = $GLOBALS['db']->getAll(' SELECT c.*,cu.*,o.order_sn,o.add_time FROM ' . $GLOBALS['ecs']->table('coupons_user') . ' cu LEFT JOIN ' . $GLOBALS['ecs']->table('coupons') . ' c ON c.cou_id=cu.cou_id LEFT JOIN ' . $GLOBALS['ecs']->table('order_info') . ' o ON cu.order_id=o.order_id ' . $where . ' ');
            return $res;
        }
    }

    public function actionValueCard()
    {
        if (IS_AJAX) {
            $this->size = 4;
            $page = I('page', 1, 'intval');
            $bind_vc = get_user_bind_vc_list($this->user_id, $page, 0, '', 1, $this->size);
            exit(json_encode(array('list' => $bind_vc, 'totalPage' => $bind_vc['totalPage'])));
        }

        $this->assign('page_title', L('vc_list'));
        $this->display();
    }

    public function actionValueCardInfo()
    {
        $vid = I('vid', '', 'intval');
        $info = value_cart_info($vid);

        if ($info['user_id'] != $this->user_id) {
            ecs_header('Location: ' . url('user/account/value_card'));
            exit();
        }

        if (IS_AJAX) {
            $this->size = 5;
            $page = I('page', 1, 'intval');
            $value_card_info = value_card_use_info($vid, $page, $this->size);
            exit(json_encode(array('list' => $value_card_info, 'totalPage' => $value_card_info['totalPage'])));
        }

        if ($info['is_rec'] == 1) {
            $pay_url = url('user/account/pay_value_card', array('vid' => $vid));
            $this->assign('pay_url', $pay_url);
        }

        $this->assign('page_title', L('vc_info'));
        $this->assign('vid', $vid);
        $this->display();
    }

    public function actionAddValueCard()
    {
        if (IS_POST) {
            $value_card_sn = trim(I('post.value_card_sn'));
            $password = compile_str(I('post.password'));

            if (0 < gd_version()) {
                if (empty($_POST['captcha'])) {
                    exit(json_encode(array('status' => 'n', 'info' => L('invalid_captcha'))));
                }

                $validator = new \Think\Verify();

                if (!$validator->check($_POST['captcha'])) {
                    exit(json_encode(array('status' => 'n', 'info' => L('invalid_captcha'))));
                }
            }

            $result = add_value_card($this->user_id, $value_card_sn, $password);

            if ($result == 1) {
                exit(json_encode(array('status' => 'n', 'info' => L('vc_use_expire'))));
            }

            if ($result == 2) {
                exit(json_encode(array('status' => 'n', 'info' => L('vc_is_used'))));
            }

            if ($result == 3) {
                exit(json_encode(array('status' => 'n', 'info' => L('vc_is_used_by_other'))));
            }

            if ($result == 4) {
                exit(json_encode(array('status' => 'n', 'info' => L('vc_not_exist'))));
            }

            if ($result == 5) {
                exit(json_encode(array('status' => 'n', 'info' => L('vc_limit_expire'))));
            }

            if ($result == 0) {
                exit(json_encode(array('status' => 'y', 'info' => L('add_value_card_sucess'), 'url' => url('user/account/value_card'))));
            }
        }

        $this->assign('page_title', L('add_vc'));
        $this->display();
    }

    public function actionPayValueCard()
    {
        $vid = I('vid', '', 'intval');

        if (empty($vid)) {
            exit(json_encode(array('status' => 'y', 'url' => url('user/account/value_card'))));
        }

        if (IS_POST) {
            $pay_card_sn = trim(I('post.pay_card_sn'));
            $password = compile_str(I('post.password'));
            $vid = I('post.vid');

            if (0 < gd_version()) {
                if (empty($_POST['captcha'])) {
                    exit(json_encode(array('status' => 'n', 'info' => L('invalid_captcha'))));
                }

                $validator = new \Think\Verify();

                if (!$validator->check($_POST['captcha'])) {
                    exit(json_encode(array('status' => 'n', 'info' => L('invalid_captcha'))));
                }
            }

            $result = use_pay_card($this->user_id, $vid, $pay_card_sn, $password);

            if ($result == 0) {
                exit(json_encode(array('status' => 'y', 'info' => L('use_pay_card_sucess'), 'url' => url('user/account/value_card_info', array('vid' => $vid)))));
            }

            if ($result == 1) {
                exit(json_encode(array('status' => 'n', 'info' => L('pc_not_exist'))));
            }

            if ($result == 2) {
                exit(json_encode(array('status' => 'n', 'info' => L('pc_is_used'))));
            }

            if ($result == 3) {
                exit(json_encode(array('status' => 'n', 'info' => L('vc_use_expire'))));
            }
        }

        $this->assign('vid', $vid);
        $this->assign('page_title', L('pay_vc'));
        $this->display();
    }
}

?>
