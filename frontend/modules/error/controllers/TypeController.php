<?php

namespace app\modules\error\controllers;

use yii\web\Controller;

/**
 * Default controller for the `error` module
 */
class TypeController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function action404()
    {
    	
        return $this->renderPartial('404');

    }
}