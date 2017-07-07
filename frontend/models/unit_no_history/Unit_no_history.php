<?php

namespace app\models\unit_no_history;

use Yii;
use db2\config\Configdb;
use Doctrine\DataTables;

class Unit_no_history
{

    public function get_data(){
\Yii::$app->response->format=\Yii\web\Response::FORMAT_JSON;

    $conn=Configdb::connections();

    $sql="`tx`.`grouploc` AS `grouploc`,`tx`.`ComponentID` AS `ComponentID`,`tx`.`COMPONENT` AS `Component`,`tx`.`ADD_MET` AS `Serial_No`,`tx`.`UNIT_NO` AS `Unit_No`,`tx`.`MODEL` AS `Model`,`tx`.`customer_id` AS `Customer`,`tx`.`EVAL_CODE` AS `Eval_Code`,`tx`.`SAMPL_DT1` AS `Sample_Date`,`tx`.`RECV_DT1` AS `Received_Date`,`tx`.`RPT_DT1` AS `Report_Date`,`tx`.`Lab_No` AS `Lab_No`,`tx`.`HRS_KM_TOT` AS `Meter_Reading`";

$datatables = (new DataTables\Builder())
    ->withQueryBuilder(
        $conn->createQueryBuilder()
            ->select('tx.*')
            ->from('unit_no','tx')
    )
    ->withRequestParams($_REQUEST);
return $datatables->getResponse();

}
    
}