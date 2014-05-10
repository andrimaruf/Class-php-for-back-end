<?php if ( !defined('BASEPATH') ) exit('No direct script access allowed');

class Core
{
	public $storetitle;
	private static $instance;
	static $db;
	function __construct()
	{
		$dbc = new MysqliDb(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        self::$db = $dbc::getInstance();
		$this->storetitle = $this->get_core('title');
	}

	public static function getInstance()
    {
        if (!isset(self::$instance))
        {
            self::$instance = new Core();
        }
        return self::$instance;
    }

}
