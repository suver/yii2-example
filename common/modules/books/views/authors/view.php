<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\modules\books\models\Authors */

$this->title = $model->full_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('common', 'Каталог книг'), 'url' => ['/books/catalog']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('common', 'Авторы'), 'url' => \yii\helpers\ArrayHelper::merge(['authors/index'],Yii::$app->request->get())];
$this->params['breadcrumbs'][] = $this->title;
\common\modules\books\assets\AppAsset::register($this);
?>
<div class="book-authors-view">

    <div class="box">
        <div class="box-header">
            <?= Html::a(Yii::t('common', 'Редактировать'), \yii\helpers\ArrayHelper::merge(['update', 'id' => $model->id],Yii::$app->request->get()), ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('common', 'Удалить'), ['delete', 'id' => $model->id], [
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

                        <?= \backend\widgets\DataView::widget([
                            'model' => $model,
                            'attributes' => [
                                //'id',
                                [
                                    'attribute' => 'photo',
                                    'format' => 'raw',
                                    'value' => '<img src="' . $model->linkedFile('photo')->thumbnail('200x200')->byDefault('/images/default-author.jpg') . '" class="img-circle" width="200" height="200">',
                                ],
                                'full_name',
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
