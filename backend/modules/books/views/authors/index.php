<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\modules\books\models\search\AuthorsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('common', 'Авторы');
$this->params['breadcrumbs'][] = ['label' => Yii::t('common', 'Каталог книг'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = $this->title;


\backend\modules\books\assets\AppAsset::register($this);
?>
<div class="book-authors-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('common', 'Добавить нового автора'), ['create', 'page'=>\Yii::$app->request->get('page', null), 'per-page'=>\Yii::$app->request->get('per-page', null)], ['class' => 'btn btn-success']) ?>
    </p>
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
