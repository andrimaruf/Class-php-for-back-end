<?php
$libpath = 'lib';
if (realpath($libpath) !== FALSE)
{
	$libpath = realpath($libpath).'/';
}
$libpath = rtrim($libpath, '/').'/';

if ( ! is_dir($libpath))
{
	exit("Your system folder path does not appear to be set correctly. Please open the following file and correct this: " . pathinfo(__FILE__, PATHINFO_BASENAME));
}
define('BASEPATH', str_replace("\\", "/", $libpath));

require_once( BASEPATH . 'config.init.php');

require_once( BASEPATH . 'MysqliDb.Class.php');
$dbc = new MysqliDb(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$db = $dbc::getInstance();

require_once(BASEPATH . 'core.class.php');
$Core = Core::getInstance();

require_once(BASEPATH . 'function.php');

$scripts = array();
