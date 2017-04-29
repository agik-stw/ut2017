<?php

namespace app\modules\user\controllers;

use yii\web\Controller;
use app\models\User;
use Yii;
use yii\helpers\Json;
use yii\db\Query;

/**
 * Default controller for the `user` module
 */
class ActionController extends Controller
{
  public function beforeAction($action) {
    $this->enableCsrfValidation = false;
    return parent::beforeAction($action);
}

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {

    }

    /*select data from table tbl_usre*/
    public function actionGetdata()
    {
$query=new Query;
$query->select(['tbl_user.*','tbl_user_level.user_level'])
->from('tbl_user')
->join('JOIN',
'tbl_user_level','
tbl_user_level.level_id=tbl_user.level_id');
$command = $query->createCommand();
$data = $command->queryAll();

$output = array(
      /*"sEcho" => "0",
      "iTotalRecords" => "0",
      "iTotalDisplayRecords" => "0",*/
      "data" => $data
  );
return Json::encode($output);

    }

/*select data from table tbl_user*/
    public function actionGetdatabyid($username)
    {
$data=User::find()->where(['username'=>$username])->One();
return Json::encode($data);

    }


    /*delete data*/
    public function actionDeletedata($username){

      $delete=User::deleteAll('username = :username', [':username' => $username]);
      if ($delete) {
        return Json::encode(['responses'=>'Deleted!','message'=>'Your data has been deleted','status'=>'success']);
      }else{
        return Json::encode(['responses'=>'Error!','message'=>'Your data Not deleted','status'=>'error']);
      }
    }

    public function actionAdd_data(){
  $request = Yii::$app->request;
$user=new User;
$user->data_id=$_REQUEST['data_id'];
$user->username=$_REQUEST['username'];
$user->password2=$_REQUEST['password'];
$user->password=Yii::$app->getSecurity()->generatePasswordHash($_REQUEST['password']);
$user->level_id=$_REQUEST['level'];
$user->nama=$_REQUEST['nama'];
$save=$user->save();
if ($save) {
  return Json::encode(['responses'=>'Saved!','message'=>'Your data has been saved','status'=>'success']);
}else{
  return Json::encode(['responses'=>'Vailed!','message'=>'Your data not saved','status'=>'error']);
}
    }

}
