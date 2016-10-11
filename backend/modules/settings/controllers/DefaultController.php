<?php

namespace backend\modules\settings\controllers;

use backend\modules\settings\forms\SettingsForm;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

/**
 * Default controller for the `settings` module
 */
class DefaultController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['*'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $model = new SettingsForm();

        if ($model->load(\Yii::$app->request->post()) && $model->validate() && $model->save()) {
            // данные в $model удачно проверены

            // делаем что-то полезное с $model ...

            return $this->render('index', ['model' => $model]);
        } else {
            return $this->render('index', ['model' => $model]);
        }
    }
}
