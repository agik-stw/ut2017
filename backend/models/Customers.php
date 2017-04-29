<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_customers".
 *
 * @property int $CustomerID
 * @property string $Name
 * @property string $Address
 * @property string $Branch
 * @property string $login
 * @property string $password
 * @property string $entrydate
 * @property string $updatedate
 * @property string $loginpusat
 * @property string $passwordpusat
 * @property int $owner
 * @property int $reports_to
 * @property int $userlevel
 * @property int $ownerid
 */
class Customers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_customers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['entrydate', 'updatedate'], 'safe'],
            [['owner', 'reports_to', 'userlevel', 'ownerid'], 'integer'],
            [['Name', 'Address', 'Branch'], 'string', 'max' => 50],
            [['login', 'password', 'loginpusat', 'passwordpusat'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'CustomerID' => 'Customer ID',
            'Name' => 'Name',
            'Address' => 'Address',
            'Branch' => 'Branch',
            'login' => 'Login',
            'password' => 'Password',
            'entrydate' => 'Entrydate',
            'updatedate' => 'Updatedate',
            'loginpusat' => 'Loginpusat',
            'passwordpusat' => 'Passwordpusat',
            'owner' => 'Owner',
            'reports_to' => 'Reports To',
            'userlevel' => 'Userlevel',
            'ownerid' => 'Ownerid',
        ];
    }
}
