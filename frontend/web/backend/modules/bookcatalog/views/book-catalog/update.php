<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\modules\bookcatalog\models\BookCatalog */

$this->title = Yii::t('common', 'Update {modelClass}: ', [
    'modelClass' => 'Book Catalog',
]) . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('common', 'Book Catalogs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('common', 'Update');
?>
<div class="book-catalog-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
