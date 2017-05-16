<?php

namespace app\modules\monitoring\unit_no_history\controllers;

use yii\web\Controller;

/**
 * Default controller for the `unit_no_history` module
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
