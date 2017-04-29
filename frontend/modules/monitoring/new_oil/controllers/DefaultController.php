<?php

namespace app\modules\monitoring\new_oil\controllers;

use yii\web\Controller;

/**
 * Default controller for the `new_oil` module
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
