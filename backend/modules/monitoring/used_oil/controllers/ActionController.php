<?php

namespace app\modules\monitoring\used_oil\controllers;
use app\storeprocedure\UsedOil;
use yii\helpers\Json;
use app\models\TbTransaction;
use kartik\mpdf\Pdf;
/*use app\plugins\fpdf181\FPDF;*/
use Yii;
use yii\db\Query;




class ActionController extends \yii\web\Controller
{
    public function actionIndex()
    {
        /*return $this->render('index');*/
    }

    public function actionTestdata()
    {
     $requestData = $_REQUEST;
        
        $columns = array(
            0 => 'id',
            1 => 'employee_name',
            2 => 'employee_salary',
            3 => 'employee_age'
             );
        
       $sql = "SELECT  * from tbl_transaction where 1=1 limit 100";
       
        $data = Yii::$app->db->createCommand($sql)->queryAll();
        
        $totalData = count($data);
        $totalFiltered = $totalData;
     
        // $sql.="WHERE 1=1";
        
       /* if (!empty($requestData['search']['value']))
        {
            $sql.=" AND ( employee_name LIKE '" . $requestData['search']['value'] . "%' ";
            $sql.=" OR employee_salary LIKE '" . $requestData['search']['value'] . "%'";
            $sql.=" OR employee_age LIKE '" . $requestData['search']['value'] . "%')";
          
        }*/
        $data = Yii::$app->db->createCommand($sql)->queryAll();
        $totalFiltered = count($data);
       
        $sql.=" ORDER BY " . $columns[$requestData['order'][0]['column']] . "   " . $requestData['order'][0]['dir'] . "  LIMIT " . $requestData['start'] . " ," . 
        $requestData['length'] . "   ";
       
        $result = Yii::$app->db->createCommand($sql)->queryAll();
       
        $data = array();
        $i=1;
        
        foreach ($result as $key => $row)
        {
          
            $nestedData = array();
            $url = Url::to(['employee/update', 'id' => $row['id']]);
            $nestedData[] = $i;
            $nestedData[] = $row["grouploc"];
            $nestedData[] = '<a href="'.$url.'"><span class="glyphicon glyphicon-pencil"></span></a>';
             $data[] = $nestedData;
             $i++;
        }
        
        $json_data = array(
            "draw" => intval($requestData['draw']), 
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data   // total data array
        );

        echo json_encode($json_data);
    }

//get data berdasarkan lab number
    public function actionGetdata_by_labnumber($labNumber)
    {
$connection = Yii::$app->db;
$command = $connection->createCommand('call usedOilby_labNumber("'.$labNumber.'")');     
$data=$command->queryOne();
return Json::encode($data);

    }

      public function actionGetdata_by_date($date1,$date2)
    {
        \Yii::$app->response->format=\Yii\web\Response::FORMAT_JSON;
        $query=new Query;
     
        $query->select(['tbl_transaction.grouploc','tbl_transaction.branch','tbl_transaction.name as customer_name',
    'tbl_transaction.lab_no','tbl_transaction.sampl_dt1 as sample_date','tbl_transaction.recv_dt1 as receive_date',
'tbl_transaction.rpt_dt1 as report_date','tbl_transaction.unit_no as unit_number','tbl_transaction.COMPONENT as component_name','tbl_transaction.model','tbl_transaction.oil_change','tbl_transaction.filter_code','(select "") as cmp',
'(select "") as mp','(select case tbl_transaction.eval_code when "N" then "Normal"
when "B" then "Attention"
when "C" then "Urgent"
when " " then "Normal"
when null then "Normal" end) as eval_code','(select "")as blank'])
  ->from('tbl_transaction')
  ->where(['between','tbl_transaction.recv_dt1',$date1,$date2]);
return ['data'=>$query->all()];

    }


    public function actionReport($type,$labNumber){
      $data=TbTransaction::find()
      ->where(['lab_no'=>$labNumber])
      ->one();

  $content2=\yii2mod\c3\chart\Chart::widget([
    'options' => [
            'id' => 'popularity_chart'
    ],
    'clientOptions' => [
       'data' => [
            'x' => 'x',
            'columns' => [
                ['x', 'week 1', 'week 2', 'week 3', 'week 4'],
                ['Popularity', 10, 20, 30, 50]
            ],
            'colors' => [
                'Popularity' => '#4EB269',
            ],
        ],
        'axis' => [
            'x' => [
                'label' => 'Month',
                'type' => 'category'
            ],
            'y' => [
                'label' => [
                    'text' => 'Popularity',
                    'position' => 'outer-top'
                ],
                'min' => 0,
                'max' => 100,
                'padding' => ['top' => 10, 'bottom' => 0]
            ]
        ]
    ]
]);

      switch ($type) {
        case 'pdf':
        Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
        $connt=$this->renderPartial('report_process_others',['labNumber'=>$labNumber,'data'=>$data]);
return $connt;
      $htmlContent=$this->renderAjax('pdf4',['labNumber'=>$labNumber,'data'=>$data]);
     $pdf = new Pdf([
        // set to use core fonts only
        /*'mode' => Pdf::MODE_UTF8, */
        // A4 paper format
        'format' => Pdf::FORMAT_A4, 
        // portrait orientation
        'orientation' => Pdf::ORIENT_PORTRAIT, 
        // stream to browser inline
        /*'destination' => Pdf::DEST_BROWSER,*/ 
        // your html content input
        'content' => $htmlContent,  
        // format content from your own css file if needed or use the
        // enhanced bootstrap css built by Krajee for mPDF formatting 
        'cssFile' =>'@web/report/pdf.css',
         // call mPDF methods on the fly
        'methods' => [ 
            /*'SetHeader'=>['Oil Analysis Report'],*/ 
            'SetFooter'=>['Page. {PAGENO}'],
        ]
    ]);
return $pdf->render();
          break;
          case 'excel':
         echo 'ini laporan excel, lab number : '.$labNumber;
          break;
        
        default:
          
          break;
      }

    }



}
