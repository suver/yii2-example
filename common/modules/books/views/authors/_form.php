<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\modules\books\models\Authors */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="book-authors-form">

    <?php $form = ActiveForm::begin(); ?>

    <img src="<?php echo $model->linkedFile('photo')->thumbnail('200x200')->byDefault('/images/default-author.jpg')?>" alt="<?php echo Html::encode($model->full_name) ?>" class="img-circle" width="200" height="200">

    <?= $form->field($model, 'photo')->fileInput() ?>

    <?= $form->field($model, 'full_name')->textInput(['maxlength' => true]) ?>

    <?php // echo  $form->field($model, 'created_at')->textInput() ?>

    <?php // echo  $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('common', 'Добавить') : Yii::t('common', 'Сохранить'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
