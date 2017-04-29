<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_user_level".
 *
 * @property int $level_id
 * @property string $user_level
 * @property string $role
 * @property string $keterangan
 */
class UserLevel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_user_level';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_level', 'role'], 'string', 'max' => 50],
            [['keterangan'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'level_id' => 'Level ID',
            'user_level' => 'User Level',
            'role' => 'Role',
            'keterangan' => 'Keterangan',
        ];
    }
}
