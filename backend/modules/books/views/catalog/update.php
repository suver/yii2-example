<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\modules\books\models\Catalog */

$this->title = Yii::t('common', 'Редактировать {modelClass}: ', [
        'modelClass' => 'Книгу',
    ]) . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('common', 'Каталог книг'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('common', 'Книги'), 'url' => ['catalog/index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('common', 'Редактировать');
\backend\modules\books\assets\AppAsset::register($this);
?>
<div class="book-catalog-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
