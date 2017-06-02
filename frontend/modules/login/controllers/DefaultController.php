<?php

namespace app\modules\login\controllers;

use app\models\loginForm;
use yii\web\Controller;
use Yii;

/**
 * Default controller for the `login` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->renderPartial('index');
    }

}
