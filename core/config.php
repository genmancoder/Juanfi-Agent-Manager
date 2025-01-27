<?php
//Database credentials
define('DB_SERVER', 'localhost');//Db Ip, default: localhost
define('DB_USERNAME', 'root');//Db username
define('DB_PASSWORD', '');//Db Password
define('DB_NAME', 'JuanFi');//Db name
define('DB_PORT', '3306');//Db port

// Mikrotik credentials
define('MT_SERVER', '10.0.0.1');//Mikrotik IP
define('MT_USERNAME', 'admin');//Mikrotik Username
define('MT_PASSWORD', 'g3nm@n'); //Mikrotik Password
define('MT_PORT', '8728'); //Mikrotik port
//Settings
$CURRENCY = '₱';
$INTERFACE = "ether1"; //Interface Data Usage
$REFRESH = 15000; //Topstats refreshh 15000 = 15sec
$SHARE = 70; //Max 100, examples: 70=70%, 50=50%


//Dont touch this
$db = new PDO('mysql:host='. DB_SERVER . ';dbname='. DB_NAME . ';charset=utf8',DB_USERNAME, DB_PASSWORD);
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$db->setAttribute (PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->exec("set names utf8");

error_reporting(0);
ini_set('display_errors', 0);



if (!$db) {
	die("Error: Unable to connect " . $db->connect_error);
}
