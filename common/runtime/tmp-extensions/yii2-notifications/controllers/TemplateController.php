<?php

namespace suver\notifications\controllers;

use suver\notifications\models\NotificationsTemplate;
use suver\notifications\models\search\NotificationsTemplateSearch;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * Template controller for the `notifications` module
 */
class TemplateController extends Controller
{

    //public $layout = 'main';

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all NotificationsTemplate models.
     * @return mixed
     */
    public function actionIndex()
    {
        $module = \suver\notifications\Module::getInstance();
        $searchModel = new NotificationsTemplateSearch();
        $dataProvider = $searchModel->search(\Yii::$app->request->queryParams);

        return $this->render('index', [
            'module' => $module,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single NotificationsTemplate model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($key)
    {
        $module = \suver\notifications\Module::getInstance();
        if (\Yii::$app->request->isAjax) {
            return $this->renderAjax('view', [
                'module' => $module,
                'model' => $this->findModel($key),
            ]);
        } else {
            return $this->render('view', [
                'module' => $module,
                'model' => $this->findModel($key),
            ]);
        }
    }

    /**
     * Creates a new NotificationsTemplate model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new NotificationsTemplate();

        if ($model->load(\Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'key' => $model->key]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing NotificationsTemplate model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($key)
    {
        $model = $this->findModel($key);

        if ($model->load(\Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'key' => $model->key]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing NotificationsTemplate model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($key)
    {
        $this->findModel($key)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the NotificationsTemplate model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return NotificationsTemplate the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($key)
    {
        if (($model = NotificationsTemplate::find()->andWhere(['key'=>$key])->one()) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
