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
        $ex_where = ' WHERE 1 ';
        if ($filter['keywords']) {
            $ex_where .= ' AND (u.user_name LIKE \'%' . mysql_like_quote($filter['keywords']) . '%\')';
        }

        $filter['record_count'] = $GLOBALS['db']->getOne('SELECT COUNT(*) FROM ' . $GLOBALS['ecs']->table('users') . ' AS u inner join'
            . $GLOBALS['ecs']->table('shareholder') . 'as s on u.user_id = s.user_id' . $ex_where);
        $filter = page_and_size($filter);
        $sql = 'SELECT u.user_id, u.user_name, u.nick_name, u.mobile_phone,s.id,s.share_principal,s.share_date,FORMAT (s.share_principal * (SELECT stock_price FROM ' . $GLOBALS['ecs']->table('share_stock') . ' WHERE stock_status = 1 ),2) AS profit' . ' FROM ' .
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
} else if ($_REQUEST['act'] == 'apply') {

} else if ($_REQUEST['act'] == 'option') {
    $share_id = (empty($_GET['share_id']) ? '' : trim($_GET['share_id']));
    $sql = 'SELECT u.user_id, u.user_name as username, u.nick_name, u.mobile_phone as phone,s.id,s.share_principal as principal ,s.share_date,FORMAT (s.share_principal * (SELECT stock_price FROM `shop`.`dsc_share_stock` WHERE stock_status = 1 ),2) AS profit FROM `shop`.`dsc_users` AS u inner join`shop`.`dsc_shareholder`as s on u.user_id = s.user_id WHERE s.id = \'' . $share_id . '\'';
    $editShare = $db->getRow($sql);

    $smarty->assign('ur_here', $_LANG['05_shareholder_edit']);
    $smarty->assign('form_action', 'edit');
    $smarty->assign('shareholder_info', $editShare);
    $smarty->assign('action_link2', array('text' => $_LANG['01_shareholder_list'], 'href' => 'shareholder.php?act=list'));
    $smarty->display('shareholder_list_edit.dwt');
} else if ($_REQUEST['act'] == 'add') {
    $smarty->assign('ur_here', $_LANG['04_shareholder_add']);
    $smarty->assign('form_action', 'insert');
    $smarty->assign('action_link2', array('text' => $_LANG['01_shareholder_list'], 'href' => 'shareholder.php?act=list'));
    $smarty->display('shareholder_add.dwt');
} else if ($_REQUEST['act'] == 'insert') {
    $username = (empty($_POST['username']) ? '' : trim($_POST['username']));
    $phone = (empty($_POST['phone']) ? '' : trim($_POST['phone']));
    $principal = (empty($_POST['principal']) ? '' : trim($_POST['principal']));
    if (empty($username)) {
        sys_msg('用户名不能为空!', 1);
    } else if (empty($principal)) {
        sys_msg('请输入金额!', 1);
    }
    $getUserId = 'select user_id  from ' . $ecs->table('users') . ' where user_name = \'' . $username . '\' and mobile_phone = \'' . $phone . '\'';
    $userId = $db->getOne($getUserId);
    if (empty($userId)) {
        sys_msg('该用户不存在！', 1);
    } else {
        if (!empty($db->getOne('select id  from ' . $ecs->table('shareholder') . ' where user_id = \'' . $userId . '\''))) {
            sys_msg('该用户已是股东！', 1);
        }
    }

    $sql = 'insert into ' . $ecs->table('shareholder') . '(user_id,share_principal,share_date) ' . ' VALUES (\'' . $userId . '\', \'' . $principal . '\', SYSDATE())';

    $db->query($sql);

    $link[] = array('text' => $_LANG['go_back'], 'href' => 'shareholder.php?act=list');
    sys_msg(sprintf($_LANG['add_success'], htmlspecialchars(stripslashes($_POST['username']))), 0, $link);
} else if ($_REQUEST['act'] == 'edit') {
    $username = (empty($_POST['username']) ? '' : trim($_POST['username']));
    $phone = (empty($_POST['phone']) ? '' : trim($_POST['phone']));
    $principal = (empty($_POST['principal']) ? '' : trim($_POST['principal']));
    if (empty($principal)) {
        sys_msg('请输入金额!', 1);
    }
    $getUserId = 'select user_id  from ' . $ecs->table('users') . ' where user_name = \'' . $username . '\' and mobile_phone = \'' . $phone . '\'';

    $userId = $db->getOne($getUserId);

    $sql = 'update ' . $ecs->table('shareholder') . ' SET share_principal = ' . $principal . ',share_date = SYSDATE() where user_id = ' . $userId . '';

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
    $lnk[] = array('text' => $_LANG['go_back'], 'href' => 'shareholder.php?act=list');
    sys_msg(sprintf($_LANG['batch_remove_success'], $count), 0, $lnk);
}