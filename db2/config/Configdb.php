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
	];

}