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
        $sql = 'SELECT u.user_rank,u.user_id, u.user_name, u.nick_name, u.mobile_phone,s.id,s.user_id ' . ' FROM ' .
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
    admin_priv('users_manage');
    $smarty->assign('ur_here', $_LANG['01_shareholder_list']);
    $smarty->assign('action_link', array('text' => $_LANG['04_shareholder_add'], 'href' => 'shareholder.php?act=add'));
    $user_list = user_list();
    $smarty->assign('user_list', $user_list['user_list']);
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

} else if ($_REQUEST['act'] == 'msg') {

} else if ($_REQUEST['act'] == 'add') {
    admin_priv('users_manage');

    $smarty->assign('ur_here', $_LANG['04_shareholder_add']);
    $smarty->assign('action_link2', array('text' => $_LANG['01_shareholder_list'], 'href' => 'shareholder.php?act=list'));
    $smarty->display('shareholder_add.dwt');
} else if ($_REQUEST['act'] == 'insert') {
    admin_priv('users_manage');

    $username = (empty($_POST['username']) ? '' : trim($_POST['username']));
    $phone = (empty($_POST['phone']) ? '' : trim($_POST['phone']));
    $principal = (empty($_POST['principal']) ? '' : trim($_POST['principal']));

    $sql = 'select * from ' . $ecs->table('users') . ' where user_name = \'' . $username . '\' and mobile_phone = \'' . $phone . '\'';

    if (0 >= $db->getOne($sql)) {
        sys_msg('该用户不存在！', 1);
    }
    echo $username;
}