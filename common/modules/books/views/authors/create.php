<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\modules\books\models\Authors */

$this->title = Yii::t('common', 'Новый автор');
$this->params['breadcrumbs'][] = ['label' => Yii::t('common', 'Каталог книг'), 'url' => ['/books/catalog']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('common', 'Авторы'), 'url' => \yii\helpers\ArrayHelper::merge(['authors/index'],Yii::$app->request->get())];
$this->params['breadcrumbs'][] = $this->title;
\common\modules\books\assets\AppAsset::register($this);
?>
<div class="book-authors-create">

    <div class="box">
        <div class="box-header">
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap">
                <div class="row">
                    <div class="col-sm-6"></div>
                    <div class="col-sm-6"></div>
                </div>
                <div class="row">
                    <div class="col-sm-12">

                        <?= $this->render('_form', [
                            'model' => $model,
                        ]) ?>

                    </div>
                </div>
            </div>
        </div>
        <!-- /.box-body -->
    </div>

</div>
