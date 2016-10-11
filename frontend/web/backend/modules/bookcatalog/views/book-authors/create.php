<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\modules\bookcatalog\models\BookAuthors */

$this->title = Yii::t('common', 'Create Book Authors');
$this->params['breadcrumbs'][] = ['label' => Yii::t('common', 'Book Authors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-authors-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
