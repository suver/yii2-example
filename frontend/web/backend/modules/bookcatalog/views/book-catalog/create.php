<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\modules\bookcatalog\models\BookCatalog */

$this->title = Yii::t('common', 'Create Book Catalog');
$this->params['breadcrumbs'][] = ['label' => Yii::t('common', 'Book Catalogs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-catalog-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
