<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_fuel".
 *
 * @property string $report_id
 * @property string $report_date
 * @property string $receive_date
 * @property string $sample_date
 * @property string $group
 * @property string $customer_id
 * @property string $departement_id
 * @property string $lab_number
 * @property string $Job_number
 * @property string $detail_of_sample
 * @property int $target_lead_time
 * @property int $actual_lead_time
 * @property int $Alert
 * @property string $file_upload
 * @property string $create_at
 * @property string $update_at
 */
class Fuel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_fuel';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['report_id'], 'required'],
            [['report_date', 'receive_date', 'sample_date', 'create_at', 'update_at'], 'safe'],
            [['target_lead_time', 'actual_lead_time', 'Alert'], 'integer'],
            [['report_id', 'group', 'customer_id', 'departement_id', 'lab_number', 'Job_number'], 'string', 'max' => 50],
            [['detail_of_sample', 'file_upload'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'report_id' => 'Report ID',
            'report_date' => 'Report Date',
            'receive_date' => 'Receive Date',
            'sample_date' => 'Sample Date',
            'group' => 'Group',
            'customer_id' => 'Customer ID',
            'departement_id' => 'Departement ID',
            'lab_number' => 'Lab Number',
            'Job_number' => 'Job Number',
            'detail_of_sample' => 'Detail Of Sample',
            'target_lead_time' => 'Target Lead Time',
            'actual_lead_time' => 'Actual Lead Time',
            'Alert' => 'Alert',
            'file_upload' => 'File Upload',
            'create_at' => 'Create At',
            'update_at' => 'Update At',
        ];
    }
}
