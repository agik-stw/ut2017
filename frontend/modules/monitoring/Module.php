<?php

namespace app\modules\monitoring;

/**
 * monitoring module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\monitoring\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
$this->modules=[
        'fuel' => [
            'class' => 'app\modules\monitoring\fuel\Module',
        ],
        'used_oil' => [
            'class' => 'app\modules\monitoring\used_oil\Module',
        ],
        'new_oil' => [
            'class' => 'app\modules\monitoring\new_oil\Module',
        ],
        'unit_no_history' => [
            'class' => 'app\modules\monitoring\unit_no_history\Module',
        ],
        'machine_health' => [
            'class' => 'app\modules\monitoring\machine_health\Module',
        ],
    ];
        // custom initialization code goes here
    }
}
