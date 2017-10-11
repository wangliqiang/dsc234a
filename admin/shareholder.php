<?php
/**
 * Created by PhpStorm.
 * User: 王立强
 * Date: 2017/10/11
 * Time: 14:24
 */

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
    $smarty->assign('menu_select', array('action' => 'shareholder_mgt', 'current' => '01_shareholder_list'));
    $sql = 'SELECT rank_id, rank_name, min_points FROM ' . $ecs->table('user_rank') . ' ORDER BY min_points ASC ';
    $rs = $db->query($sql);
    $ranks = array();

    while ($row = $db->FetchRow($rs)) {
        $ranks[$row['rank_id']] = $row['rank_name'];
    }

    $smarty->assign('user_ranks', $ranks);
    $smarty->assign('ur_here', $_LANG['01_shareholder_list']);
    $smarty->assign('action_link', array('text' => $_LANG['04_shareholder_add'], 'href' => 'shareholder.php?act=add'));
    $smarty->assign('filter', $user_list['filter']);
    $smarty->assign('record_count', $user_list['record_count']);
    $smarty->assign('page_count', $user_list['page_count']);
    $smarty->assign('full_page', 1);
    $smarty->assign('sort_user_id', '<img src="images/sort_desc.gif">');

    $smarty->display('shareholder_list.dwt');

} else if ($_REQUEST['act'] == 'apply') {

} else if ($_REQUEST['act'] == 'msg') {

} else if ($_REQUEST['act'] == 'add') {
    echo '添加';
}