<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\modules\books\models\search\CatalogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('common', 'Книги');
$this->params['breadcrumbs'][] = ['label' => Yii::t('common', 'Каталог книг'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = $this->title;

\backend\modules\books\assets\AppAsset::register($this);
?>
<div class="book-catalog-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('common', 'Добавить издание'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'emptyText' => 'Книг не добавлено',
        'summary' => 'Показано <b>{begin, number}-{end, number}</b> из <b>{totalCount, number}</b> {totalCount, plural, one{запись} other{записей}}',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'date_publication',
            [
                'label'=>Yii::t('common', 'Авторы'),
                'attribute' => 'authors',
                'value'=> function($model) {
                    return implode(", ", \yii\helpers\ArrayHelper::getColumn($model->authors, "full_name"));
                },
            ],
            //'created_at',
            //'updated_at',
            ['class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'view' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url , ['class' => 'view', 'data-pjax' => '0']);
                    },
                ],
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>

<?php

$this->registerJs(
    "$(document).on('ready pjax:success', function() {  // 'pjax:success' use if you have used pjax
    $('.view').click(function(e){
       e.preventDefault();      
       $('#pModal').modal('show')
                  .find('.modal-content')
                  .load($(this).attr('href'));  
   });
});
");

yii\bootstrap\Modal::begin([
    'id'=>'pModal',
]);
yii\bootstrap\Modal::end();
?>
