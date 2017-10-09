<?php
//源码由 旺旺:dongshaolin2008所有  禁止倒卖 一经发现停止任何服务！
function get_next_time($cron)
{
	$y = local_date('Y', $GLOBALS['timestamp']);
	$mo = local_date('n', $GLOBALS['timestamp']);
	$d = local_date('j', $GLOBALS['timestamp']);
	$w = local_date('w', $GLOBALS['timestamp']);
	$h = local_date('G', $GLOBALS['timestamp']);
	$sh = $sm = 0;
	$sy = $y;

	if ($cron['day']) {
		$sd = $cron['day'];
		$smo = $mo + 1;
	}
	else {
		$sd = $d;
		$smo = $mo;

		if ($cron['week'] != '') {
			$sd += ($cron['week'] - $w) + 7;
		}
	}

	if ($cron['hour']) {
		$sh = $cron['hour'];
		if (empty($cron['day']) && ($cron['week'] == '')) {
			$sd++;
		}
	}

	$next = local_strtotime($sy . '-' . $smo . '-' . $sd . ' ' . $sh . ':' . $sm . ':0');

	if ($next < $GLOBALS['timestamp']) {
		if ($cron['m']) {
			return ($GLOBALS['timestamp'] + 60) - intval(local_date('s', $GLOBALS['timestamp']));
		}
		else {
			return $GLOBALS['timestamp'];
		}
	}
	else {
		return $next;
	}
}

function get_cron_info()
{
	$crondb = array();
	$sql = 'SELECT * FROM ' . $GLOBALS['ecs']->table('crons') . ' WHERE enable = 1 AND nextime < ' . $GLOBALS['timestamp'];
	$query = $GLOBALS['db']->query($sql);

	while ($rt = $GLOBALS['db']->fetch_array($query)) {
		$rt['cron'] = array('day' => $rt['day'], 'week' => $rt['week'], 'm' => $rt['minute'], 'hour' => $rt['hour']);
		$rt['cron_config'] = unserialize($rt['cron_config']);
		$rt['minute'] = trim($rt['minute']);
		$rt['allow_ip'] = trim($rt['allow_ip']);
		$crondb[] = $rt;
	}

	return $crondb;
}

function make_error_arr($msg, $file)
{
	$file = str_replace(ROOT_PATH, '', $file);
	return array('info' => $msg, 'file' => $file, 'time' => $GLOBALS['timestamp']);
}

function write_error_arr($err_arr)
{
	if (!empty($err_arr)) {
		$query = '';

		foreach ($err_arr as $key => $val) {
			$query .= ($query ? ',(\'' . $val['info'] . '\', \'' . $val['file'] . '\', \'' . $val['time'] . '\')' : '(\'' . $val['info'] . '\', \'' . $val['file'] . '\', \'' . $val['time'] . '\')');
		}

		if ($query) {
			$sql = 'INSERT INTO ' . $GLOBALS['ecs']->table('error_log') . '(info, file, time) VALUES ' . $query;
			$GLOBALS['db']->query($sql);
		}
	}
}

function check_method()
{
	if ('4.2' <= PHP_VERSION) {
		$if_cron = (PHP_SAPI == 'cli' ? true : false);
	}
	else {
		$if_cron = (php_sapi_name() == 'cgi' ? true : false);
	}

	if (!empty($GLOBALS['_CFG']['cron_method'])) {
		if (!$if_cron) {
			exit('Hacking attempt');
		}
	}
	else if ($if_cron) {
		exit('Hacking attempt');
	}
	else {
		if (!isset($_GET['t']) || (60 < ($GLOBALS['timestamp'] - intval($_GET['t']))) || empty($_SERVER['HTTP_REFERER'])) {
			exit();
		}
	}
}

define('IN_ECS', true);
require './init.php';
$timestamp = gmtime();
check_method();
$error_log = array();

if (isset($set_modules)) {
	$set_modules = false;
	unset($set_modules);
}

$crondb = get_cron_info();

foreach ($crondb as $key => $cron_val) {
	if (file_exists(ROOT_PATH . 'includes/modules/cron/' . $cron_val['cron_code'] . '.php')) {
		if (!empty($cron_val['allow_ip'])) {
			$allow_ip = explode(',', $cron_val['allow_ip']);
			$server_ip = real_server_ip();

			if (!in_array($server_ip, $allow_ip)) {
				continue;
			}
		}

		if (!empty($cron_val['minute'])) {
			$m = explode(',', $cron_val['minute']);
			$m_now = intval(local_date('i', $timestamp));

			if (!in_array($m_now, $m)) {
				continue;
			}
		}

		if (!empty($cron_val['alow_files'])) {
			$f_info = parse_url($_SERVER['HTTP_REFERER']);
			$f_now = basename($f_info['path']);
			$f = explode(' ', $cron_val['alow_files']);

			if (!in_array($f_now, $f)) {
				continue;
			}
		}

		if (!empty($cron_val['cron_config'])) {
			foreach ($cron_val['cron_config'] as $k => $v) {
				$cron[$v['name']] = $v['value'];
			}
		}

		include_once ROOT_PATH . 'includes/modules/cron/' . $cron_val['cron_code'] . '.php';
	}
	else {
		$error_log[] = make_error_arr('includes/modules/cron/' . $cron_val['cron_code'] . '.php not found!', __FILE__);
	}

	$close = ($cron_val['run_once'] ? 0 : 1);
	$next_time = get_next_time($cron_val['cron']);
	$sql = 'UPDATE ' . $ecs->table('crons') . 'SET thistime = \'' . $timestamp . '\', nextime = \'' . $next_time . '\', enable = ' . $close . ' ' . 'WHERE cron_id = \'' . $cron_val['cron_id'] . '\' LIMIT 1';
	$db->query($sql);
}

write_error_arr($error_log);

?>
