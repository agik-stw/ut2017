<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_import".
 *
 * @property int $id
 * @property string $file
 * @property string $to_table
 * @property string $type_file
 * @property string $date
 * @property string $import_by
 */
class Import extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_import';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date'], 'safe'],
            [['file', 'to_table', 'type_file', 'import_by'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'file' => 'File',
            'to_table' => 'To Table',
            'type_file' => 'Type File',
            'date' => 'Date',
            'import_by' => 'Import By',
        ];
    }
}
