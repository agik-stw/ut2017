<?php

namespace app\modules\monitoring\machine_health\controllers;

use yii\web\Controller;

/**
 * Default controller for the `machine_health` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
