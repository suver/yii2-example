<?php

use yii\helpers\Html;

?>
<div class="image">
    <a href="<?php echo \yii\helpers\Url::to(['view', 'id' => $model->id]) ?>">
        <img src="<?php echo $model->linkedFile('photo')->thumbnail('200x200')->byDefault('/images/default-author.jpg')?>" alt="<?php echo Html::encode($model->full_name) ?>" class="img-circle" width="200" height="200">
    </a>
</div>
<div class="title">
    <?php echo Html::a(Html::encode($model->full_name), ['view', 'id' => $model->id])?>
</div>
