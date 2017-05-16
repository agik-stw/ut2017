<?php
namespace app\storeprocedure;
use Yii;
ini_set('memory_limit', '-1');
class UsedOil{
	public static function getdata($data_id){

$connection = Yii::$app->db;
$command = $connection->createCommand('call getTransactionUsedOil("'.$data_id.'")');     
return $command->queryAll();
	}
}