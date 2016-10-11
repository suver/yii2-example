<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\modules\books\models\search\CatalogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('common', 'Книги');
$this->params['breadcrumbs'][] = ['label' => Yii::t('common', 'Каталог книг'), 'url' => ['/books/catalog']];
$this->params['breadcrumbs'][] = $this->title;

\common\modules\books\assets\AppAsset::register($this);
?>
<div class="book-catalog-index">

    <div class="box">
        <div class="box-header">
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <p>
                <?= Html::a(Yii::t('common', 'Добавить издание'), \yii\helpers\ArrayHelper::merge(['create'],Yii::$app->request->get()), ['class' => 'btn btn-success']) ?>
            </p>

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
                                            return Html::a('<span class="glyphicon glyphicon-eye-open"></span>',
                                                \yii\helpers\ArrayHelper::merge(['view', 'id' => $model->id],Yii::$app->request->get()) , ['class' => 'view', 'data-pjax' => '0']);
                                        },
                                        'update' => function ($url, $model) {
                                            return Html::a('<span class="glyphicon glyphicon-pencil"></span>',
                                                \yii\helpers\ArrayHelper::merge(['update', 'id' => $model->id],Yii::$app->request->get()) , ['class' => 'view', 'data-pjax' => '0']);
                                        },
                                        'delete' => function ($url, $model) {
                                            return Html::a('<span class="glyphicon glyphicon-trash"></span>',
                                                \yii\helpers\ArrayHelper::merge(['delete', 'id' => $model->id],Yii::$app->request->get()) , [
                                                    'class' => 'view', 'data-pjax' => '0',
                                                    'data-confirm' => Yii::t('common', 'Вы уверены что хотите удалить эту запись?'),
                                                    'data-method' => 'post',
                                                ]);
                                        },
                                    ],
                                ],
                            ],
                        ]); ?>
                        <?php Pjax::end(); ?>

                    </div>
                </div>
            </div>
        </div>
        <!-- /.box-body -->
    </div>

</div>

<?php

/*$this->registerJs(
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
yii\bootstrap\Modal::end();*/
?>
