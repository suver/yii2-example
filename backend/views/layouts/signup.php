<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\SignupAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

SignupAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="nav-sm">
<?php $this->beginBody() ?>
    <div class="site-wrapper">
        <div class="site-wrapper-inner">
            <div class="cover-container">
                <div class="masthead clearfix">
                    <div class="inner">
                        <h3 class="masthead-brand">Example</h3>
                    </div>
                </div>

                <div class="inner cover">
                    <!--p class="lead"></p-->
                    <?= Alert::widget() ?>
                    <?= $content ?>
                </div>

                <div class="mastfoot">
                    <div class="inner">
                        <p>Реализовано <a href="http://farpse.com">farpse</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>