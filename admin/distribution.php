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
    $smarty->assign('action_link', array('text' => $_LANG['04_shareholder_add'], 'href' => 'shareholder.php?act=add'));
    $user_list = user_list();
    $smarty->assign('user_list', $user_list['user_list']);
    $smarty->assign('share_stock', $user_list['share_stock']);
    $smarty->assign('filter', $user_list['filter']);
    $smarty->assign('record_count', $user_list['record_count']);
    $smarty->assign('page_count', $user_list['page_count']);
    $smarty->assign('full_page', 1);
    $smarty->assign('sort_user_id', '<img src="images/sort_desc.gif">');

    $smarty->display('distribution_list.dwt');
}else if($_REQUEST['act'] == 'apply_list'){
    $smarty->assign('ur_here', '提现申请');
    $smarty->assign('action_link', array('text' => $_LANG['04_shareholder_add'], 'href' => 'shareholder.php?act=add'));
    $user_list = user_list();
    $smarty->assign('user_list', $user_list['user_list']);
    $smarty->assign('share_stock', $user_list['share_stock']);
    $smarty->assign('filter', $user_list['filter']);
    $smarty->assign('record_count', $user_list['record_count']);
    $smarty->assign('page_count', $user_list['page_count']);
    $smarty->assign('full_page', 1);
    $smarty->assign('sort_user_id', '<img src="images/sort_desc.gif">');
    $smarty->display('distribution_list_apply.dwt');
} else if ($_REQUEST['act'] == 'mgt') {
    $smarty->assign('ur_here', '分销比例设置');

    $sql = 'select stock_id,stock_price,stock_date,stock_status from ' . $ecs->table('share_stock') . 'order by stock_status desc';
    $share_stock = $db->getAll($sql);

    $smarty->assign('share_stock', $share_stock);
    $smarty->assign('form_action', 'mgt_add');
    $smarty->assign('record_count', $user_list['record_count']);
    $smarty->assign('page_count', $user_list['page_count']);
    $smarty->assign('full_page', 1);
    $smarty->assign('sort_user_id', '<img src="images/sort_desc.gif">');
    $smarty->display('distribution_mgt.dwt');
}