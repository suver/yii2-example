<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model common\modules\books\models\Catalog */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="book-catalog-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-9">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-3">
            <?php echo  $form->field($model, 'isbn')->widget(\yii\widgets\MaskedInput::className(), [
                'mask' => '999-9-999-99999-9',
            ]) ?>
        </div>
    </div>

    <?= $form->field($model, 'authors_ids', ['template' => '{label}<br/>{input}{error}'])->widget(
        \yii2mod\chosen\ChosenSelect::className(), [
        'items' => \yii\helpers\ArrayHelper::map(\common\modules\books\models\Authors::find()->where('id != :id', [':id' => (int)$model->id])->all(), 'id' ,'full_name'),
        'options' => [
            'data-placeholder' => 'Выберите авторов',
            'no_results_text' => 'Нет вариантов для выбора',
            'placeholder_text_multiple' => '2',
            'placeholder_text_single' => '1',
            'multiple' => true,
            'disable_search' => 5,
            'search_contains' => true,
            'single_backstroke_delete' => false,
            'width' => '100%',
        ],
    ]); ?>
    <a href="#" id="addAuthor"><i class="glyphicon glyphicon-plus"></i></a>

    <?php echo  $form->field($model, 'description')->widget(\suver\editor\Editor::className(), []); ?>

    <!--div class="row">
        <div class="col-md-4">
            <?php echo  $form->field($model, 'format')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?php echo  $form->field($model, 'binding')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?php echo  $form->field($model, 'language_editions')->textInput(['maxlength' => true]) ?>
        </div>
    </div-->

    <div class="row">
        <div class="col-md-4">
            <?php echo  $form->field($model, 'number_of_pages')->widget(\yii\widgets\MaskedInput::className(), [
                'mask' => '9{1,4}',
            ]) ?>
        </div>
        <div class="col-md-4">
            <?php echo  $form->field($model, 'printing')->widget(\yii\widgets\MaskedInput::className(), [
                'mask' => '9{1,9}',
            ]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'date_publication')->widget(\yii\jui\DatePicker::classname(), [
                'options' => [
                    'class' => 'form-control',
                ],
                'language' => 'ru',
                'dateFormat' => 'dd.MM.yyyy',
            ]); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <?php echo  $form->field($model, 'weight')->widget(\yii\widgets\MaskedInput::className(), [
                'mask' => '9{1,4}',
            ]) ?>
        </div>
        <div class="col-md-4">
            <?php echo  $form->field($model, 'age_restrictions')->widget(\yii\widgets\MaskedInput::className(), [
                'mask' => '9{1,2}',
            ]) ?>
        </div>
        <div class="col-md-4">

        </div>
    </div>

    <?php echo  $form->field($model, 'is_hit')->checkbox() ?>

    <?php // echo  $form->field($model, 'created_at')->textInput() ?>

    <?php // echo $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('common', 'Добавить') : Yii::t('common', 'Сохранить'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>


    <?php

    $this->registerJs(
        "$(document).ready(function() {
            $('#addAuthor').click(function(e){
               e.preventDefault();      
               $('#pModal').modal('show');  
            });
            
            $('#w2').on('submit', function( event ) {
                event.preventDefault();
                //console.log( $( this ).serializeArray() );
                $.ajax({
                    url: '/books/authors/ajax-create',
                    data: $( this ).serializeArray(),
                    type: 'post',
                    dataType : 'json'
                }).done(function(response){
                    $('#catalog-authors_ids').append('<option value=\"' + response.id + '\" selected=\"selected\">' + response.full_name + '</option>')
                    $('#catalog-authors_ids').trigger('chosen:updated');
                });
                $('#pModal').modal('hide');  
            });
        });
    ");

    Modal::begin([
        'id'=>'pModal',
    ]);
        Pjax::begin();
        echo $this->render('_form_author', [
            'model' => new \common\modules\books\models\Authors(),
        ]);
        Pjax::end();
    Modal::end();
    ?>

</div>
