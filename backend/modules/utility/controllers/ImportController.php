<?php

namespace app\modules\utility\controllers;

use yii\web\Controller;
use yii\db\Query;
use Yii;
use app\components\Random;
use app\models\Import;
use yii\helpers\Url;

/**
 * Default controller for the `utility` module
 */
class ImportController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
 

    public function beforeAction($action){
    $session=Yii::$app->session;
        if (!$session['username']) {
            return Yii::$app->getResponse()->redirect(Url::toRoute('/login'));
        }
        return parent::beforeAction($action);
}


    public function actionIndex()
    {
     
$connection = Yii::$app->db;
$command = $connection->createCommand("show tables");     
$data=$command->queryAll();
/*return $data;*/
        return $this->render('index',['table'=>$data]);
    }


    public function actionProcess(){
        \Yii::$app->response->format=\Yii\web\Response::FORMAT_JSON;
        $table_name=$_REQUEST['table_name'];
        $type_import=$_REQUEST['type_import'];
        $uploadName='csv_file';
    $uploadPath = './upload_import/';
    $file = "upload_import/test.csv";
    

//upload file terlebih dahulu
   /* if (isset($_FILES[$fileName])) {
    $filename='import_'.$_FILES[$fileName]['name'].'_'.Random::randName().'.csv';

            $file = \yii\web\UploadedFile::getInstanceByName($fileName);
    $savefile=$file->saveAs($uploadPath.$filename);
            if ($savefile) {
               return ['responses'=>'Saved','message'=>'Data is saved','status'=>'success'];


            }else{
              return ['responses'=>'Saved','message'=>'Data is saved','status'=>'error'];
            }

    }*/
     
        

    $filename='import_'.$_FILES[$uploadName]['name'].'_'.Random::randName().'.csv';
    Yii::$app->session['fileimport'] = $filename;

            $file = \yii\web\UploadedFile::getInstanceByName($uploadName);
    $savefile=$file->saveAs($uploadPath.$filename);


        
 $handle = fopen($uploadPath.$filename, "r");
 while(($filesop = fgetcsv($handle, 1000, ",")) !==false)
 {
$data= explode(';',$filesop[0]);
$cc=array();
for ($i=0; $i<count($data) ; $i++) { 
    $dataJoin=$data[$i];

//masukan/push $dataJoin ke $cc
array_push($cc,$dataJoin);
}
//gabung data dengan "',"
$bb="'".implode("',", $cc)."'";

//replace data "," menjadi ",'"
$dd=str_replace(",", ",'", $bb);


//insert data dari $dd ke database
$sql="INSERT INTO $table_name VALUES ($dd)";
 $query = Yii::$app->db->createCommand($sql)->execute();

 }

 if($savefile && $query){
    $this->insert($filename,$table_name,$type_import,Yii::$app->session['name']);
return ['responses'=>'Success','message'=>'Data is Imported','status'=>'success'];
 }else{
return ['responses'=>'Success','message'=>'Data not Imported','status'=>'error'];
 }
    }


    public function actionGet(){
        \Yii::$app->response->format=\Yii\web\Response::FORMAT_JSON;
$model=Import::find()->all();
return ['data'=>$model];
    }

//delete data dan unlink data
    public function actionDelete(){
        \Yii::$app->response->format=\Yii\web\Response::FORMAT_JSON;
        $id=$_REQUEST['id'];
        $model=Import::find()->where(['id'=>$id])->one();
        $file=$model['file'];
        
        if (unlink('./upload_import/'.$file) && Import::deleteAll('id = :id', [':id' => $id])) {
           return ['responses'=>'Success','message'=>'Data is Deleted','status'=>'success'];
        }else{
            return ['responses'=>'Invalid','message'=>'Data not Deleted','status'=>'error'];
        }

    }

    //download file
    public function actionDownload(){
        $id=$_REQUEST['id'];
        $model=Import::find()->where(['id'=>$id])->one();
        $file=$model['file'];
$download='./upload_import/'.$file;
        return Yii::$app->response->sendFile($download);
    }

//fungsi insert data
    function insert($file,$to_table,$type_file,$import_by){
$model=new Import;
$model->file=$file;
$model->to_table=$to_table;
$model->type_file=$type_file;
$model->import_by=$import_by;
$model->save();
    }
}