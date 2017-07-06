<?php
namespace db2\config;
use yii\base\Action;
class Configdb extends Action{
	public static $params=[
	'dbname' => 'ut_2015',
    'user' => 'root',
    'password' => '',
    'host' => 'localhost',
    'driver' => 'pdo_mysql',
    'port'=>3306
	];


public static function connections(){
$connection = \Doctrine\DBAL\DriverManager::getConnection(
	Configdb::$params,
	new \Doctrine\DBAL\Configuration()
	);
return $connection;
}

}