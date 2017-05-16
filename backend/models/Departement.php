<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_departement".
 *
 * @property string $departement_id
 * @property string $departement_name
 * @property string $note
 */
class Departement extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_departement';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['departement_id'], 'required'],
            [['departement_id', 'departement_name'], 'string', 'max' => 50],
            [['note'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'departement_id' => 'Departement ID',
            'departement_name' => 'Departement Name',
            'note' => 'Note',
        ];
    }
}
