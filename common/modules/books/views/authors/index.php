<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;
use yii\widgets\ListView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\modules\books\models\search\AuthorsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('common', 'Авторы');
$this->params['breadcrumbs'][] = ['label' => Yii::t('common', 'Каталог книг'), 'url' => ['/books/catalog']];
$this->params['breadcrumbs'][] = $this->title;


\common\modules\books\assets\AppAsset::register($this);
?>
<div class="book-authors-index">

    <div class="box">
        <div class="box-header">
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


            <?php $form = ActiveForm::begin([
                'action' => ['index'],
                'method' => 'get',
            ]); ?>

            <?php echo $form->field($searchModel, 'full_name') ?>

            <div class="row">
                <div class="col-md-6">

                    <div class="form-group">
                        <?= Html::submitButton(Yii::t('common', 'Отфлиьтровать'), ['class' => 'btn btn-primary']) ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <?= Html::a(Yii::t('common', 'Добавить нового автора'), \yii\helpers\ArrayHelper::merge(['create'], \Yii::$app->request->get()), ['class' => 'btn btn-success pull-right']) ?>
                </div>
            </div>


            <?php ActiveForm::end(); ?>

        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap">
                <div class="row">
                    <div class="col-sm-6"></div>
                    <div class="col-sm-6"></div>
                </div>
                <div class="row">
                    <div class="col-sm-12">

                        <?php Pjax::begin(); ?>
                        <?= ListView::widget([
                            'dataProvider' => $dataProvider,
                            'itemOptions' => ['class' => 'item'],
                            'summary' => 'Показано <b>{begin, number}-{end, number}</b> из <b>{totalCount, number}</b> {totalCount, plural, one{запись} other{записей}}',
                            'layout' => '<div class="summary">{summary}</div><div class="list row">{items}</div><div class="summary">{pager}</div>',
                            'emptyText' => Yii::t('common', 'Записей не добавлено'),
                            'emptyTextOptions' => [],
                            'itemOptions' => ['class' => 'item col-md-3'],
                            'itemView' => function ($model, $key, $index, $widget) {
                                return $this->render('_item', ['model' => $model]);
                            },
                        ]) ?>
                        <?php /* echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'full_name',
            'created_at',
            'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); */ ?>
                        <?php Pjax::end(); ?></div>

                    </div>
                </div>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
