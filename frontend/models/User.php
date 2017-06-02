<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_user".
 *
 * @property string $userid
 * @property string $data_id
 * @property string $nama
 * @property string $username
 * @property string $password
 * @property string $password2
 * @property int $level_id
 * @property string $status
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username'], 'required'],
            [['level_id'], 'integer'],
            [['userid', 'data_id', 'nama', 'username', 'password2', 'status'], 'string', 'max' => 50],
            [['password'], 'string', 'max' => 100],
            [['username'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'userid' => 'Userid',
            'data_id' => 'Data ID',
            'nama' => 'Nama',
            'username' => 'Username',
            'password' => 'Password',
            'password2' => 'Password2',
            'level_id' => 'Level ID',
            'status' => 'Status',
        ];
    }
}
