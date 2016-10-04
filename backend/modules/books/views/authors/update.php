<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\modules\books\models\Authors */

$this->title = Yii::t('common', 'Редактировать {modelClass}: ', [
        'modelClass' => 'Автора',
    ]) . $model->full_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('common', 'Каталог книг'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('common', 'Авторы'), 'url' => ['authors/index']];
$this->params['breadcrumbs'][] = ['label' => $model->full_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('common', 'Редактирование');
\backend\modules\books\assets\AppAsset::register($this);
?>
<div class="book-authors-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
