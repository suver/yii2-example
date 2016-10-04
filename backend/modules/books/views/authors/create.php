<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\modules\books\models\Authors */

$this->title = Yii::t('common', 'Новый автор');
$this->params['breadcrumbs'][] = ['label' => Yii::t('common', 'Каталог книг'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('common', 'Авторы'), 'url' => ['authors/index']];
$this->params['breadcrumbs'][] = $this->title;
\backend\modules\books\assets\AppAsset::register($this);
?>
<div class="book-authors-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
