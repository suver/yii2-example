<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\modules\bookcatalog\models\BookAuthors */

$this->title = Yii::t('common', 'Update {modelClass}: ', [
    'modelClass' => 'Book Authors',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('common', 'Book Authors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('common', 'Update');
?>
<div class="book-authors-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
