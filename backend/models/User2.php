<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_user".
 *
 * @property string $data_id
 * @property int $userid
 * @property string $nama
 * @property string $username
 * @property string $password
 * @property string $password2
 * @property int $level_id
 */
class User2 extends \yii\db\ActiveRecord
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
            [['data_id', 'userid'], 'required'],
            [['userid', 'level_id'], 'integer'],
            [['data_id', 'nama', 'username', 'password2'], 'string', 'max' => 50],
            [['password'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'data_id' => 'Data ID',
            'userid' => 'Userid',
            'nama' => 'Nama',
            'username' => 'Username',
            'password' => 'Password',
            'password2' => 'Password2',
            'level_id' => 'Level ID',
        ];
    }
}
