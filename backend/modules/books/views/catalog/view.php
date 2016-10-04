<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\modules\books\models\Catalog */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('common', 'Каталог книг'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('common', 'Книги'), 'url' => ['catalog/index']];
$this->params['breadcrumbs'][] = $this->title;
\backend\modules\books\assets\AppAsset::register($this);
?>
<div class="book-catalog-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'date_publication',
            [
                'label' => Yii::t('common', 'Авторы'),
                'value' => implode(", ", \yii\helpers\ArrayHelper::getColumn($model->authors, "full_name")),
            ],
            'created_at',
            'updated_at',
        ],
    ]) ?>

    <div class="control">
        <?= Html::a(Yii::t('common', 'Редактировать'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('common', 'Удалить'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('common', 'Вы уверены что хотите удалить эту запись?'),
                'method' => 'post',
            ],
        ]) ?>
    </div>

</div>
