<?php
/**
 * Created by PhpStorm.
 * User: 王立强
 * Date: 2017/10/11
 * Time: 14:24
 */

function user_list()
{
    $result = get_filter();
    if ($result === false) {
        $filter['keywords'] = empty($_REQUEST['keywords']) ? '' : trim($_REQUEST['keywords']);
        if (isset($_REQUEST['is_ajax']) && ($_REQUEST['is_ajax'] == 1)) {
            $filter['keywords'] = json_str_iconv($filter['keywords']);
        }
        $ex_where = ' WHERE share_status = 1 ';
        if ($filter['keywords']) {
            $ex_where .= ' AND (u.user_name LIKE \'%' . mysql_like_quote($filter['keywords']) . '%\')';
        }

        $filter['record_count'] = $GLOBALS['db']->getOne('SELECT COUNT(*) FROM ' . $GLOBALS['ecs']->table('users') . ' AS u inner join'
            . $GLOBALS['ecs']->table('shareholder') . 'as s on u.user_id = s.user_id' . $ex_where);
        $filter = page_and_size($filter);
        $sql = 'SELECT u.user_id, u.user_name,u.mobile_phone,s.id,s.share_realname,s.share_phone,s.share_number,s.share_principal,s.share_date,s.share_bonus
            ,FORMAT (s.share_number * (SELECT stock_price FROM ' . $GLOBALS['ecs']->table('share_stock') . ' WHERE stock_status = 1 ) - s.share_principal,2) AS profit
            ,FORMAT (s.share_number * (SELECT stock_price FROM ' . $GLOBALS['ecs']->table('share_stock') . ' WHERE stock_status = 1 ),2) AS total'
            . ' FROM ' .
            $GLOBALS['ecs']->table('users') . ' AS u inner join' . $GLOBALS['ecs']->table('shareholder') . 'as s on u.user_id = s.user_id' . $ex_where . ' '
            . ' LIMIT ' . $filter['start'] . ',' . $filter['page_size'];
        $filter['keywords'] = stripslashes($filter['keywords']);
        set_filter($filter, $sql);
    } else {
        $sql = $result['sql'];
        $filter = $result['filter'];
    }
    $user_list = $GLOBALS['db']->getAll($sql);
    $count = count($user_list);
    $getStock = 'select stock_id,stock_price,stock_date,stock_status from ' . $GLOBALS['ecs']->table('share_stock') . ' where stock_status = 1';
    $share_stock = $GLOBALS['db']->getRow($getStock);
    $arr = array('user_list' => $user_list, 'share_stock' => $share_stock, 'filter' => $filter, 'page_count' => $filter['page_count'], 'record_count' => $filter['record_count']);
    return $arr;
}

function user_apply()
{
    $result = get_filter();
    if ($result === false) {
        $filter['keywords'] = empty($_REQUEST['keywords']) ? '' : trim($_REQUEST['keywords']);
        if (isset($_REQUEST['is_ajax']) && ($_REQUEST['is_ajax'] == 1)) {
            $filter['keywords'] = json_str_iconv($filter['keywords']);
        }
        $ex_where = ' WHERE share_status = 0 ';
        if ($filter['keywords']) {
            $ex_where .= ' AND (u.user_name LIKE \'%' . mysql_like_quote($filter['keywords']) . '%\')';
        }

        $filter['record_count'] = $GLOBALS['db']->getOne('SELECT COUNT(*) FROM ' . $GLOBALS['ecs']->table('users') . ' AS u inner join'
            . $GLOBALS['ecs']->table('shareholder') . 'as s on u.user_id = s.user_id' . $ex_where);
        $filter = page_and_size($filter);
        $sql = 'SELECT u.user_id, u.user_name,u.mobile_phone,s.id,s.share_realname,s.share_phone,s.share_number,s.share_principal,s.share_date
            ,FORMAT (s.share_number * (SELECT stock_price FROM ' . $GLOBALS['ecs']->table('share_stock') . ' WHERE stock_status = 1 ) - s.share_principal,2) AS profit
            ,FORMAT (s.share_number * (SELECT stock_price FROM ' . $GLOBALS['ecs']->table('share_stock') . ' WHERE stock_status = 1 ),2) AS total'
            . ' FROM ' .
            $GLOBALS['ecs']->table('users') . ' AS u inner join' . $GLOBALS['ecs']->table('shareholder') . 'as s on u.user_id = s.user_id' . $ex_where . ' '
            . ' LIMIT ' . $filter['start'] . ',' . $filter['page_size'];
        $filter['keywords'] = stripslashes($filter['keywords']);
        set_filter($filter, $sql);
    } else {
        $sql = $result['sql'];
        $filter = $result['filter'];
    }

    $user_list = $GLOBALS['db']->getAll($sql);

    $count = count($user_list);
    $getStock = 'select stock_id,stock_price,stock_date,stock_status from ' . $GLOBALS['ecs']->table('share_stock') . ' where stock_status = 1';
    $share_stock = $GLOBALS['db']->getRow($getStock);
    $arr = array('user_list' => $user_list, 'share_stock' => $share_stock, 'filter' => $filter, 'page_count' => $filter['page_count'], 'record_count' => $filter['record_count']);
    return $arr;
}


function get_regions_log($type = 0, $parent = 0)
{
    $sql = 'SELECT region_id, region_name FROM ' . $GLOBALS['ecs']->table('region') . ' WHERE region_type = \'' . $type . '\' AND parent_id = \'' . $parent . '\'';
    return $GLOBALS['db']->GetAll($sql);
}

define('IN_ECS', true);
require dirname(__FILE__) . '/includes/init.php';
$adminru = get_admin_ru_id();

if ($adminru['ru_id'] == 0) {
    $smarty->assign('priv_ru', 1);
} else {
    $smarty->assign('priv_ru', 0);
}

if ($_REQUEST['act'] == 'list') {

    $smarty->assign('ur_here', $_LANG['01_shareholder_list']);
    $smarty->assign('action_link', array('text' => $_LANG['04_shareholder_add'], 'href' => 'shareholder.php?act=add'));
    $user_list = user_list();
    $smarty->assign('user_list', $user_list['user_list']);
    $smarty->assign('share_stock', $user_list['share_stock']);
    $smarty->assign('filter', $user_list['filter']);
    $smarty->assign('record_count', $user_list['record_count']);
    $smarty->assign('page_count', $user_list['page_count']);
    $smarty->assign('full_page', 1);
    $smarty->assign('sort_user_id', '<img src="images/sort_desc.gif">');

    $smarty->display('shareholder_list.dwt');

} else if ($_REQUEST['act'] == 'query') {
    $user_list = user_list();
    $smarty->assign('user_list', $user_list['user_list']);
    $smarty->assign('filter', $user_list['filter']);
    $smarty->assign('record_count', $user_list['record_count']);
    $smarty->assign('page_count', $user_list['page_count']);
    make_json_result($smarty->fetch('shareholder_list.dwt'), '', array('filter' => $user_list['filter'], 'page_count' => $user_list['page_count']));
} else if ($_REQUEST['act'] == 'option') {

    $country_list = get_regions_steps(0, 0);
    $province_list = get_regions_steps(1, 1);
    $city_list = get_regions_steps(2, $consignee['province']);
    $district_list = get_regions_steps(3, $consignee['city']);

    $share_id = (empty($_GET['share_id']) ? '' : trim($_GET['share_id']));
    $sql = 'SELECT u.user_id, u.user_name as username, u.mobile_phone as phone,s.id,s.share_principal as principal ,s.share_date,
      s.country,
      s.province,
      s.city,
      s.district,
	  s.share_address,
	  s.share_identity,
	  s.share_realname,
	  s.share_number,
      FORMAT (s.share_principal * (SELECT stock_price FROM ' . $ecs->table('share_stock') . ' WHERE stock_status = 1 ),2) AS profit FROM ' . $ecs->table('users') . ' AS u inner join ' . $ecs->table('shareholder') . ' as s on u.user_id = s.user_id WHERE s.id = \'' . $share_id . '\'';
    $editShare = $db->getRow($sql);
    $smarty->assign('ur_here', $_LANG['05_shareholder_edit']);
    $smarty->assign('form_action', 'edit');
    $smarty->assign('shareholder_info', $editShare);
    $smarty->assign('country_list', $country_list);
    $smarty->assign('province_list', $province_list);
    $smarty->assign('city_list', $city_list);
    $smarty->assign('district_list', $district_list);
    $smarty->assign('action_link2', array('text' => $_LANG['01_shareholder_list'], 'href' => 'shareholder.php?act=list'));
    $smarty->display('shareholder_list_edit.dwt');

} else if ($_REQUEST['act'] == 'share_bonus') {
    $share_id = (empty($_GET['share_id']) ? '' : trim($_GET['share_id']));
    $sql = 'select id,user_id,share_realname,share_phone,share_number,share_principal,share_date from ' . $ecs->table('shareholder') . ' where id = \'' . $share_id . '\'';
    $bonus = $db->getRow($sql);
    $smarty->assign('ur_here', '分红');
    $smarty->assign('bonus', $bonus);
    $smarty->assign('form_action', 'bonus_confirm');
    $smarty->assign('action_link2', array('text' => $_LANG['01_shareholder_list'], 'href' => 'shareholder.php?act=list'));
    $smarty->display('shareholder_list_bonus.dwt');
} else if($_REQUEST['act'] == 'bonus_confirm'){
    $id = (empty($_POST['id']) ? '' : trim($_POST['id']));
    $share_bonus = (empty($_POST['share_bonus']) ? '' : trim($_POST['share_bonus']));

    $sql ='update ' . $ecs->table('shareholder') . ' SET  share_bonus = ' . $share_bonus . ' where id = ' . $id . '';
    $db->query($sql);
    if ($db->affected_rows()) {
        ecs_header("Location: shareholder.php?act=list");
    }
} else if ($_REQUEST['act'] == 'add') {
    $country_list = get_regions_steps(0, 0);
    $province_list = get_regions_steps(1, 1);
    $city_list = get_regions_steps(2, $consignee['province']);
    $district_list = get_regions_steps(3, $consignee['city']);
    $smarty->assign('sn', $sn);
    $smarty->assign('country_list', get_regions());
    $smarty->assign('ur_here', $_LANG['04_shareholder_add']);
    $smarty->assign('form_action', 'insert');
    $smarty->assign('country_list', $country_list);
    $smarty->assign('province_list', $province_list);
    $smarty->assign('city_list', $city_list);
    $smarty->assign('district_list', $district_list);
    $smarty->assign('action_link2', array('text' => $_LANG['01_shareholder_list'], 'href' => 'shareholder.php?act=list'));
    $smarty->display('shareholder_add.dwt');

} else if ($_REQUEST['act'] == 'insert') {
    $username = (empty($_POST['username']) ? '' : trim($_POST['username']));
    $realname = (empty($_POST['realname']) ? '' : trim($_POST['realname']));
    $identity = (empty($_POST['identity']) ? '' : trim($_POST['identity']));
    $phone = $_POST['phone'];
    $principal = $_POST['principal'];
    $country = $_POST['country'];
    $province = $_POST['province'];
    $city = $_POST['city'];
    $district = $_POST['district'];
    $address_detail = $_POST['address_detail'];
    $share_number = $_POST['share_number'];

    $getUserId = 'select user_id  from ' . $ecs->table('users') . ' where user_name = \'' . $username . '\' and mobile_phone = \'' . $phone . '\'';
    $userId = $db->getOne($getUserId);
    if (empty($userId)) {
        sys_msg('该用户没注册或手机号不正确', 1);
    } else {
        if (!empty($db->getOne('select id  from ' . $ecs->table('shareholder') . ' where user_id = \'' . $userId . '\''))) {
            sys_msg('该用户已是股东！', 1);
        }
    }

    $sql = 'insert into ' . $ecs->table('shareholder') . '(user_id,share_realname,share_identity,share_phone,country,province,city,district,share_address,share_number,share_principal,share_date,share_status) '
        . ' VALUES (\'' . $userId . '\',\'' . $realname . '\',\'' . $identity . '\',\'' . $phone . '\',\'' . $country . '\',\'' . $province . '\',\'' . $city . '\',\'' . $district . '\',\'' . $address_detail . '\',\'' . $share_number . '\', \'' . $principal . '\', SYSDATE(),1)';

    $db->query($sql);

    $link[] = array('text' => $_LANG['go_back'], 'href' => 'shareholder.php?act=list');
    sys_msg(sprintf($_LANG['add_success'], htmlspecialchars(stripslashes($_POST['username']))), 0, $link);
} else if ($_REQUEST['act'] == 'edit') {
    $username = (empty($_POST['username']) ? '' : trim($_POST['username']));
    $realname = (empty($_POST['realname']) ? '' : trim($_POST['realname']));
    $identity = (empty($_POST['identity']) ? '' : trim($_POST['identity']));
    $phone = $_POST['phone'];
    $principal = $_POST['principal'];
    $country = $_POST['country'];
    $province = $_POST['province'];
    $city = $_POST['city'];
    $district = $_POST['district'];
    $address_detail = $_POST['address_detail'];
    $share_number = $_POST['share_number'];


    $getUserId = 'select user_id  from ' . $ecs->table('users') . ' where user_name = \'' . $username . '\' and mobile_phone = \'' . $phone . '\'';

    $userId = $db->getOne($getUserId);

    $sql = 'update ' . $ecs->table('shareholder') . ' SET  country = ' . $country . ',province = ' . $province . ',city = ' . $city . ',district = ' . $district . ',share_address = \'' . $address_detail . '\',share_number = ' . $share_number . ',share_principal = ' . $principal . ',share_date = SYSDATE(),share_status = 1 where user_id = ' . $userId . '';

    $db->query($sql);

    $links[0]['text'] = $_LANG['goto_list'];
    $links[0]['href'] = 'shareholder.php?act=list&' . list_link_postfix();
    $links[1]['text'] = $_LANG['go_back'];
    $links[1]['href'] = 'javascript:history.back()';
    sys_msg($_LANG['update_success'], 0, $links);
} else if ($_REQUEST['act'] == 'delete') {
    $share_id = (empty($_GET['share_id']) ? '' : trim($_GET['share_id']));

    $sql = 'delete from' . $ecs->table('shareholder') . ' where id = ' . $share_id . '';
    $db->query($sql);
    if ($db->affected_rows()) {
        ecs_header("Location: shareholder.php?act=list");
    }
} else if ($_REQUEST['act'] == 'apply') {

    $smarty->assign('ur_here', '申请列表');
    $user_list = user_apply();
    $smarty->assign('user_list', $user_list['user_list']);
    $smarty->assign('share_stock', $user_list['share_stock']);
    $smarty->assign('filter', $user_list['filter']);
    $smarty->assign('record_count', $user_list['record_count']);
    $smarty->assign('page_count', $user_list['page_count']);
    $smarty->assign('full_page', 1);
    $smarty->assign('sort_user_id', '<img src="images/sort_desc.gif">');
    $smarty->display('shareholder_apply.dwt');
} else if ($_REQUEST['act'] == 'apply_edit') {

    $username = (empty($_POST['username']) ? '' : trim($_POST['username']));
    $realname = (empty($_POST['realname']) ? '' : trim($_POST['realname']));
    $identity = (empty($_POST['identity']) ? '' : trim($_POST['identity']));
    $phone = $_POST['phone'];
    $principal = $_POST['principal'];
    $country = $_POST['country'];
    $province = $_POST['province'];
    $city = $_POST['city'];
    $district = $_POST['district'];
    $address_detail = $_POST['address_detail'];
    $share_number = $_POST['share_number'];


    $getUserId = 'select user_id  from ' . $ecs->table('users') . ' where user_name = \'' . $username . '\' and mobile_phone = \'' . $phone . '\'';

    $userId = $db->getOne($getUserId);

    $sql = 'update ' . $ecs->table('shareholder') . ' SET  country = ' . $country . ',province = ' . $province . ',city = ' . $city . ',district = ' . $district . ',share_address = \'' . $address_detail . '\',share_number = ' . $share_number . ',share_principal = ' . $principal . ',share_date = SYSDATE(),share_status = 1 where user_id = ' . $userId . '';

    $db->query($sql);

    $links[0]['text'] = $_LANG['goto_list'];
    $links[0]['href'] = 'shareholder.php?act=apply&' . list_link_postfix();
    $links[1]['text'] = $_LANG['go_back'];
    $links[1]['href'] = 'javascript:history.back()';
    sys_msg($_LANG['update_success'], 0, $links);
} else if ($_REQUEST['act'] == 'apply_query') {

    $user_list = user_apply();
    $smarty->assign('user_list', $user_list['user_list']);
    $smarty->assign('filter', $user_list['filter']);
    $smarty->assign('record_count', $user_list['record_count']);
    $smarty->assign('page_count', $user_list['page_count']);
    make_json_result($smarty->fetch('shareholder_apply.dwt'), '', array('filter' => $user_list['filter'], 'page_count' => $user_list['page_count']));

} else if ($_REQUEST['act'] == 'apply_option') {

    $share_id = (empty($_GET['share_id']) ? '' : trim($_GET['share_id']));
    $sql = 'SELECT u.user_id, u.user_name as username, u.mobile_phone as phone,s.id,s.share_principal as principal ,s.share_date,
      s.country,
      s.province,
      s.city,
      s.district,
	  s.share_address,
	  s.share_identity,
	  s.share_realname,
	  s.share_number,
      FORMAT (s.share_principal * (SELECT stock_price FROM ' . $ecs->table('share_stock') . ' WHERE stock_status = 1 ),2) AS profit FROM ' . $ecs->table('users') . ' AS u inner join ' . $ecs->table('shareholder') . 'as s on u.user_id = s.user_id WHERE s.id = \'' . $share_id . '\'';
    $editShare = $db->getRow($sql);

    $smarty->assign('ur_here', '详情');
    $smarty->assign('form_action', 'apply_edit');
    $smarty->assign('shareholder_info', $editShare);
    $smarty->assign('action_link2', array('text' => $_LANG['01_shareholder_list'], 'href' => 'shareholder.php?act=apply'));
    $smarty->display('shareholder_apply_edit.dwt');
} else if ($_REQUEST['act'] == 'apply_remove') {
    $share_id = (empty($_GET['share_id']) ? '' : trim($_GET['share_id']));

    $sql = 'update ' . $ecs->table('shareholder') . ' SET share_date = SYSDATE(),share_status = 2 where id = ' . $share_id . '';

    $db->query($sql);

    $links[0]['text'] = $_LANG['goto_list'];
    $links[0]['href'] = 'shareholder.php?act=apply&' . list_link_postfix();
    $links[1]['text'] = $_LANG['go_back'];
    $links[1]['href'] = 'javascript:history.back()';
    sys_msg('您已驳回该会员的入股申请', 0, $links);
} else if ($_REQUEST['act'] == 'mgt') {
    $smarty->assign('ur_here', '股指管理');

    $sql = 'select stock_id,stock_price,stock_date,stock_status from ' . $ecs->table('share_stock') . 'order by stock_status desc';
    $share_stock = $db->getAll($sql);

    $smarty->assign('share_stock', $share_stock);
    $smarty->assign('form_action', 'mgt_add');
    $smarty->assign('record_count', $user_list['record_count']);
    $smarty->assign('page_count', $user_list['page_count']);
    $smarty->assign('full_page', 1);
    $smarty->assign('sort_user_id', '<img src="images/sort_desc.gif">');
    $smarty->display('shareholder_mgt.dwt');
} else if ($_REQUEST['act'] == 'mgt_add') {
    $principal = (empty($_POST['principal']) ? '' : trim($_POST['principal']));

    $update = 'UPDATE ' . $ecs->table('share_stock') . ' SET stock_status = 0';
    echo $update;
    $db->query($update);

    $sql = 'INSERT INTO ' . $ecs->table('share_stock') . ' (stock_price,stock_date,stock_status) VALUES (\'' . $principal . '\',SYSDATE(),1)';

    $db->query($sql);

    if ($db->affected_rows()) {
        ecs_header("Location: shareholder.php?act=mgt");
    }
} else if ($_REQUEST['act'] == 'mgt_option') {

    $stock_id = (empty($_GET['stock_id']) ? '' : trim($_GET['stock_id']));
    $update = 'UPDATE ' . $ecs->table('share_stock') . ' SET stock_status = 0';
    echo $update;
    $db->query($update);

    $sql = 'UPDATE ' . $ecs->table('share_stock') . ' SET stock_status = 1 where stock_id = \'' . $stock_id . '\'';

    $db->query($sql);

    if ($db->affected_rows()) {
        ecs_header("Location: shareholder.php?act=mgt");
    }
} else if ($_REQUEST['act'] == 'mgt_remove') {

    $stock_id = (empty($_GET['stock_id']) ? '' : trim($_GET['stock_id']));
    $update = 'UPDATE ' . $ecs->table('share_stock') . ' SET stock_status = 0';
    echo $update;
    $db->query($update);

    $sql = 'delete from' . $ecs->table('share_stock') . 'where stock_id = \'' . $stock_id . '\'';

    $db->query($sql);

    if ($db->affected_rows()) {
        ecs_header("Location: shareholder.php?act=mgt");
    }
}