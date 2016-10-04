<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\modules\books\models\Authors */

$this->title = $model->full_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('common', 'Каталог книг'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('common', 'Авторы'), 'url' => ['authors/index']];
$this->params['breadcrumbs'][] = $this->title;
\backend\modules\books\assets\AppAsset::register($this);
?>
<div class="book-authors-view">

    <p>
        <?= Html::a(Yii::t('common', 'Редактировать'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('common', 'Удалить'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('common', 'Вы уверены что хотите удалить эту запись?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'full_name',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
