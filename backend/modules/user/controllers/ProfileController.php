<?php

namespace backend\modules\user\controllers;

use yii\web\Controller;

/**
 * Profile controller for the `user` module
 */
class ProfileController extends Controller
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
