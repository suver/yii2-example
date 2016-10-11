<?php

use yii\helpers\Html;
use backend\widgets\DataView;

/* @var $this yii\web\View */
/* @var $model common\modules\books\models\Catalog */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('common', 'Каталог книг'), 'url' => ['/books/catalog']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('common', 'Книги'), 'url' => \yii\helpers\ArrayHelper::merge(['catalog/index'],Yii::$app->request->get())];
$this->params['breadcrumbs'][] = $this->title;

\common\modules\books\assets\AppAsset::register($this);
?>
<div class="book-catalog-view">

    <div class="box">
        <div class="box-header">
            <?= Html::a(Yii::t('common', 'Редактировать'), \yii\helpers\ArrayHelper::merge(['update', 'id' => $model->id],Yii::$app->request->get()), ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('common', 'Удалить'), \yii\helpers\ArrayHelper::merge(['delete', 'id' => $model->id],Yii::$app->request->get()), [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('common', 'Вы уверены что хотите удалить эту запись?'),
                    'method' => 'post',
                ],
            ]) ?>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <div class="row">
                    <div class="col-sm-6"></div>
                    <div class="col-sm-6"></div>
                </div>
                <div class="row">
                    <div class="col-sm-12">

                        <?= DataView::widget([
                            'model' => $model,
                            'attributes' => [
                                'id',
                                'isbn',
                                'title',
                                [
                                    'attribute' => 'description',
                                    'format' => 'raw',
                                    'value' => \suver\editor\TransformationWidget::widget(['message' => $model->description]),
                                ],
                                'format',
                                'number_of_pages',
                                'printing',
                                'binding',
                                'language_editions',
                                'age_restrictions',
                                'publication_type',
                                'weight',
                                'date_publication',
                                [
                                    'label' => Yii::t('common', 'Авторы'),
                                    'value' => implode(", ", \yii\helpers\ArrayHelper::getColumn($model->authors, "full_name")),
                                ],
                                'created_at',
                                'updated_at',
                            ],
                        ]) ?>

                    </div>
                </div>
            </div>
        </div>
        <!-- /.box-body -->
    </div>


</div>
