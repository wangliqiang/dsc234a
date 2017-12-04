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
        $ex_where = ' WHERE 1=1';
        if ($filter['keywords']) {
            $ex_where .= ' AND (u.nick_name LIKE \'%' . mysql_like_quote($filter['keywords']) . '%\')';
        }

        $filter['record_count'] = $GLOBALS['db']->getOne('SELECT COUNT(*) FROM ' . $GLOBALS['ecs']->table('users') . ' AS u ' . $ex_where);
        $filter = page_and_size($filter);
        $sql = 'SELECT user_id,user_name,nick_name,mobile_phone FROM ' .
            $GLOBALS['ecs']->table('users')  . ' AS u ' . $ex_where . ' order by u.reg_time desc '
            . ' LIMIT ' . $filter['start'] . ',' . $filter['page_size'];
        $filter['keywords'] = stripslashes($filter['keywords']);
        set_filter($filter, $sql);
    } else {
        $sql = $result['sql'];
        $filter = $result['filter'];
    }
    $user_list = $GLOBALS['db']->getAll($sql);
    $count = count($user_list);
    $arr = array('user_list' => $user_list, 'filter' => $filter, 'page_count' => $filter['page_count'], 'record_count' => $filter['record_count']);
    return $arr;
}

function dis_user_list($user_phone)
{
    $result = get_filter();
    if ($result === false) {
        $filter['keywords'] = empty($_REQUEST['keywords']) ? '' : trim($_REQUEST['keywords']);
        if (isset($_REQUEST['is_ajax']) && ($_REQUEST['is_ajax'] == 1)) {
            $filter['keywords'] = json_str_iconv($filter['keywords']);
        }
        $ex_where = ' WHERE recommender = \'' . $user_phone . '\'';
        if ($filter['keywords']) {
            $ex_where .= ' AND (u.user_name LIKE \'%' . mysql_like_quote($filter['keywords']) . '%\')';
        }

        $filter['record_count'] = $GLOBALS['db']->getOne('SELECT COUNT(*) FROM ' . $GLOBALS['ecs']->table('users') . ' AS u ' . $ex_where);
        $filter = page_and_size($filter);
        $sql = 'SELECT u.user_id, u.user_name,u.nick_name,u.mobile_phone,FORMAT(SUM(order_amount)*(select dis_percent from ' . $GLOBALS['ecs']->table('distribution') . ')/100,2) as dis_price FROM ' . $GLOBALS['ecs']->table('users') . ' as u 
            INNER JOIN ' . $GLOBALS['ecs']->table('order_info') . ' as i ON u.user_id = i.user_id 
            INNER JOIN ' . $GLOBALS['ecs']->table('order_goods') . ' AS g ON i.order_id = g.order_id' . $ex_where . ' and i.pay_status = 2  order by u.reg_time desc '
            . ' LIMIT ' . $filter['start'] . ',' . $filter['page_size'];
        $filter['keywords'] = stripslashes($filter['keywords']);
        set_filter($filter, $sql);
    } else {
        $sql = $result['sql'];
        $filter = $result['filter'];
    }
    $user_list = $GLOBALS['db']->getAll($sql);
    $count = count($user_list);
    $arr = array('user_list' => $user_list, 'filter' => $filter, 'page_count' => $filter['page_count'], 'record_count' => $filter['record_count']);
    return $arr;
}

function apply_user_list($status)
{
    $result = get_filter();
    if ($result === false) {
        $filter['keywords'] = empty($_REQUEST['keywords']) ? '' : trim($_REQUEST['keywords']);
        if (isset($_REQUEST['is_ajax']) && ($_REQUEST['is_ajax'] == 1)) {
            $filter['keywords'] = json_str_iconv($filter['keywords']);
        }
        $ex_where = ' WHERE 1 = 1';
        if ($filter['keywords']) {
            $ex_where .= ' AND (u.user_name LIKE \'%' . mysql_like_quote($filter['keywords']) . '%\')';
        }

        $filter['record_count'] = $GLOBALS['db']->getOne('SELECT COUNT(*) FROM ' . $GLOBALS['ecs']->table('users') . ' AS u ' . $ex_where);
        $filter = page_and_size($filter);
        $sql = 'select d.id,d.user_id,d.dis_money,d.dis_memo,d.dis_status,d.dis_date,u.user_name,u.mobile_phone 
            from ' . $GLOBALS['ecs']->table('distribution_apply') . ' as d 
            INNER JOIN ' . $GLOBALS['ecs']->table('users') . ' as u ON d.user_id = u.user_id '
            . $ex_where . ' and d.dis_status = \'' . $status . '\' order by d.dis_date desc '
            . ' LIMIT ' . $filter['start'] . ',' . $filter['page_size'];
        $filter['keywords'] = stripslashes($filter['keywords']);
        set_filter($filter, $sql);
    } else {
        $sql = $result['sql'];
        $filter = $result['filter'];
    }
    $user_list = $GLOBALS['db']->getAll($sql);
    $count = count($user_list);
    $arr = array('user_list' => $user_list, 'filter' => $filter, 'page_count' => $filter['page_count'], 'record_count' => $filter['record_count']);
    return $arr;
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

    $smarty->assign('ur_here', '分销商列表');
    $user_list = user_list();
    $smarty->assign('user_list', $user_list['user_list']);
    $smarty->assign('filter', $user_list['filter']);
    $smarty->assign('record_count', $user_list['record_count']);
    $smarty->assign('page_count', $user_list['page_count']);
    $smarty->assign('full_page', 1);
    $smarty->assign('sort_user_id', '<img src="images/sort_desc.gif">');

    $smarty->display('distribution_list.dwt');
} else if ($_REQUEST['act'] == 'query') {
    $user_list = user_list();
    $smarty->assign('user_list', $user_list['user_list']);
    $smarty->assign('filter', $user_list['filter']);
    $smarty->assign('record_count', $user_list['record_count']);
    $smarty->assign('page_count', $user_list['page_count']);
    make_json_result($smarty->fetch('distribution_list.dwt'), '', array('filter' => $user_list['filter'], 'page_count' => $user_list['page_count']));
} else if ($_REQUEST['act'] == 'goDetail') {
    $user_id = (empty($_GET['user_id']) ? '' : trim($_GET['user_id']));
    $sql = 'SELECT user_name,nick_name,mobile_phone FROM ' . $ecs->table('users') . ' WHERE user_id = \'' . $user_id . '\' ';
    $dis_phone = $db->getRow($sql);
    $user_list = dis_user_list($dis_phone['mobile_phone']);

    foreach ($user_list['user_list'] as $k => $v) {
        $totalAmount += $v['dis_price'];
    }

    $dis_amount = $db->getOne('select dis_amount from dsc_users where user_id = \'' . $user_id . '\'');

    $smarty->assign('ur_here', $dis_phone['user_name'] . '的分销');
    $smarty->assign('user_list', $user_list['user_list']);
    $smarty->assign('user_name', $dis_phone['user_name']);//用户
    $smarty->assign('nick_name', $dis_phone['nick_name']);//用户
    $smarty->assign('mobile_phone', $dis_phone['mobile_phone']);//用户
    $smarty->assign('totalAmount', $totalAmount);//总分红
    $smarty->assign('dis_amount', $dis_amount);//已分红
    $smarty->assign('surplus_amount', $totalAmount - $dis_amount);//剩余分红
    $smarty->assign('record_count', $user_list['record_count']);
    $smarty->assign('page_count', $user_list['page_count']);
    $smarty->assign('action_link2', array('href' => 'distribution.php?act=list'));
    $smarty->assign('full_page', 1);
    $smarty->assign('sort_user_id', '<img src="images/sort_desc.gif">');

    $smarty->display('distribution_detail.dwt');
} else if ($_REQUEST['act'] == 'apply_list') {
    $smarty->assign('menu_select', array('action' => '03_distribution_config', 'current' => '待审核'));
    $smarty->assign('ur_here', '分成申请');
    $smarty->assign('action_link', array('href' => 'shareholder.php?act=add'));
    $user_list = apply_user_list('申请中');
    $smarty->assign('user_list', $user_list['user_list']);
    $smarty->assign('share_stock', $user_list['share_stock']);
    $smarty->assign('filter', $user_list['filter']);
    $smarty->assign('record_count', $user_list['record_count']);
    $smarty->assign('page_count', $user_list['page_count']);
    $smarty->assign('full_page', 1);
    $smarty->assign('flag', 0);
    $smarty->assign('sort_user_id', '<img src="images/sort_desc.gif">');
    $smarty->display('distribution_list_apply.dwt');
} else if ($_REQUEST['act'] == 'apply_list_over') {
    $smarty->assign('menu_select', array('action' => '03_distribution_config', 'current' => '审核通过'));
    $smarty->assign('ur_here', '分成申请');
    $smarty->assign('action_link', array('href' => 'shareholder.php?act=add'));
    $user_list = apply_user_list('审核通过');
    $smarty->assign('user_list', $user_list['user_list']);
    $smarty->assign('share_stock', $user_list['share_stock']);
    $smarty->assign('filter', $user_list['filter']);
    $smarty->assign('record_count', $user_list['record_count']);
    $smarty->assign('page_count', $user_list['page_count']);
    $smarty->assign('full_page', 1);
    $smarty->assign('flag', 1);
    $smarty->assign('sort_user_id', '<img src="images/sort_desc.gif">');
    $smarty->display('distribution_list_apply.dwt');
} else if ($_REQUEST['act'] == 'apply_list_reject') {
    $smarty->assign('menu_select', array('action' => '03_distribution_config', 'current' => '已驳回'));
    $smarty->assign('ur_here', '分成申请');
    $smarty->assign('action_link', array('href' => 'shareholder.php?act=add'));
    $user_list = apply_user_list('已驳回');
    $smarty->assign('user_list', $user_list['user_list']);
    $smarty->assign('share_stock', $user_list['share_stock']);
    $smarty->assign('filter', $user_list['filter']);
    $smarty->assign('record_count', $user_list['record_count']);
    $smarty->assign('page_count', $user_list['page_count']);
    $smarty->assign('full_page', 1);
    $smarty->assign('flag', 1);
    $smarty->assign('sort_user_id', '<img src="images/sort_desc.gif">');
    $smarty->display('distribution_list_apply.dwt');
} else if ($_REQUEST['act'] == 'apply_option') {
    $id = (empty($_GET['id']) ? '' : trim($_GET['id']));
    $dis_status = '审核通过';
    $sql = 'update ' . $ecs->table("distribution_apply") . ' set dis_status = \'' . $dis_status . '\',dis_date = SYSDATE() where id = ' . $id . '';
    $db->query($sql);
    if ($db->affected_rows()) {
        ecs_header("Location: distribution.php?act=apply_list_over");
    }
} else if ($_REQUEST['act'] == 'apply_reject') {
    $id = (empty($_GET['id']) ? '' : trim($_GET['id']));
    $dis_status = '已驳回';
    $sql = 'update ' . $ecs->table("distribution_apply") . ' set dis_status = \'' . $dis_status . '\',dis_date = SYSDATE() where id = ' . $id . '';
    $db->query($sql);
    if ($db->affected_rows()) {
        ecs_header("Location: distribution.php?act=apply_list_reject");
    }
} else if ($_REQUEST['act'] == 'mgt') {
    $smarty->assign('ur_here', '分销比例设置');

    $sql = 'select id,dis_percent,dis_status from ' . $ecs->table('distribution') . '';

    $dis_percent = $db->getRow($sql);

    $smarty->assign('dis_percent', $dis_percent);
    $smarty->assign('form_action', 'dis_config');
    $smarty->assign('full_page', 1);
    $smarty->assign('sort_user_id', '<img src="images/sort_desc.gif">');
    $smarty->display('distribution_mgt.dwt');
} else if ($_REQUEST['act'] == 'dis_config') {
    $dis_id = (empty($_POST['id']) ? '' : trim($_POST['id']));
    $dis_percent = (empty($_POST['dis_percent']) ? '' : trim($_POST['dis_percent']));

    $sql = 'update ' . $ecs->table('distribution') . 'set dis_percent= ' . $dis_percent . ' where id = ' . $dis_id . '';

    $db->query($sql);

    if ($db->affected_rows()) {
        ecs_header("Location: distribution.php?act=mgt");
    }
}