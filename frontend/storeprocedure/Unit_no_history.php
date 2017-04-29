<?php
namespace app\storeprocedure;
use Yii;
ini_set('memory_limit', '-1');
class Unit_no_history{
	public static function getdata(){

$connection = Yii::$app->db;
$command = $connection->createCommand('call newOil()');     
return $command->queryAll();
	}
}