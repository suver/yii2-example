<?php

namespace backend\modules\user\controllers;

use suver\settings\Settings;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

/**
 * Profile controller for the `user` module
 */
class ProfileController extends Controller
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


        return $this->render('index');
    }

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionSettings()
    {
        var_dump(Settings::get('param-int')->configure(Settings::TYPE_INT)->set(4));
        var_dump(Settings::get('param-varchar')->configure(Settings::TYPE_VARCHAR)->set("string"));
        var_dump(Settings::get('param-text')->configure(Settings::TYPE_TEXT)->set("text"));
        var_dump(Settings::get('param-array')->configure(Settings::TYPE_ARRAY)->set([1,2,3,4]));
        var_dump(Settings::get('param-param')->configure(Settings::TYPE_PARAM, [1 => ['text'=>'one'],2 => ['text'=>'two'],3 => ['text'=>'threa']])->set(3));
        var_dump(Settings::get('param-option')->configure(Settings::TYPE_OPTIONS, [1=>'one', 2=>'two'])->set(2));


        var_dump(Settings::get('param-option')->value(1));

        exit;

        return $this->render('settings');
    }
}
