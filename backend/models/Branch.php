<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_branch".
 *
 * @property string $branch
 * @property string $login
 * @property string $password
 * @property string $entrydate
 * @property string $updatedate
 * @property string $loginpusat
 * @property string $passwordpusat
 * @property string $reports_to
 * @property int $userlevel
 */
class Branch extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_branch';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['branch'], 'required'],
            [['entrydate', 'updatedate'], 'safe'],
            [['userlevel'], 'integer'],
            [['branch', 'reports_to'], 'string', 'max' => 100],
            [['login', 'password', 'loginpusat', 'passwordpusat'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'branch' => 'Branch',
            'login' => 'Login',
            'password' => 'Password',
            'entrydate' => 'Entrydate',
            'updatedate' => 'Updatedate',
            'loginpusat' => 'Loginpusat',
            'passwordpusat' => 'Passwordpusat',
            'reports_to' => 'Reports To',
            'userlevel' => 'Userlevel',
        ];
    }
}
