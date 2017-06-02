<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_new_oil".
 *
 * @property string $analysis_id
 * @property string $analysis_date
 * @property string $receive_date
 * @property string $sample_date
 * @property string $group
 * @property string $customer_id
 * @property string $lab_number
 * @property string $sample_name
 * @property int $running_hours_of_oil
 * @property int $running_hours
 * @property string $engine_builder
 * @property string $engine_model
 * @property string $serial_number
 * @property string $engine_location
 * @property string $file_upload
 * @property string $create_at
 * @property string $update_at
 */
class NewOil extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_new_oil';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['analysis_id'], 'required'],
            [['analysis_date', 'receive_date', 'sample_date', 'create_at', 'update_at'], 'safe'],
            [['running_hours_of_oil', 'running_hours'], 'integer'],
            [['analysis_id', 'group', 'customer_id', 'lab_number', 'sample_name', 'engine_builder', 'engine_model', 'serial_number', 'engine_location'], 'string', 'max' => 50],
            [['file_upload'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'analysis_id' => 'Analysis ID',
            'analysis_date' => 'Analysis Date',
            'receive_date' => 'Receive Date',
            'sample_date' => 'Sample Date',
            'group' => 'Group',
            'customer_id' => 'Customer ID',
            'lab_number' => 'Lab Number',
            'sample_name' => 'Sample Name',
            'running_hours_of_oil' => 'Running Hours Of Oil',
            'running_hours' => 'Running Hours',
            'engine_builder' => 'Engine Builder',
            'engine_model' => 'Engine Model',
            'serial_number' => 'Serial Number',
            'engine_location' => 'Engine Location',
            'file_upload' => 'File Upload',
            'create_at' => 'Create At',
            'update_at' => 'Update At',
        ];
    }
}
