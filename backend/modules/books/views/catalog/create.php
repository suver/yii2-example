<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\modules\books\models\Catalog */

$this->title = Yii::t('common', 'Добавить издание');
$this->params['breadcrumbs'][] = ['label' => Yii::t('common', 'Каталог книг'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('common', 'Книги'), 'url' => ['catalog/index']];
$this->params['breadcrumbs'][] = $this->title;
\backend\modules\books\assets\AppAsset::register($this);
?>
<div class="book-catalog-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
