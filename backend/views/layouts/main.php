<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
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
<body class="nav-md">
<?php $this->beginBody() ?>

<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="<?php echo \yii\helpers\Url::home() ?>" class="site_title"><i class="fa fa-paw"></i> <span>Example</span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile">
                    <div class="profile_pic">
                        <img src="/images/img.jpg" alt="<?php echo Yii::$app->user->identity->username ?>" class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Привет,</span>
                        <h2><?php echo Yii::$app->user->identity->username ?></h2>
                    </div>
                </div>
                <!-- /menu profile quick info -->

                <br />

                <?php
                NavBar::begin([
                    'brandLabel' => false,
                    'brandUrl' => Yii::$app->homeUrl,
                    'renderInnerContainer' => false,
                    'options' => [
                        'class' => 'main_menu_side hidden-print main_menu',
                        'id' => 'sidebar-menu',
                    ],
                ]);
                /*$menuItems = [
                    ['label' => '<i class="fa fa-home"></i> Home', 'url' => ['site/index']],
                ];*/
                if (Yii::$app->user->isGuest) {
                    $menuItems[] = ['label' => '<i class="fa fa-home"></i> Войти', 'url' => ['site/login']];
                }
                else {
                    //$menuItems[] = ['label' => '<i class="fa fa-home"></i> Выйти', 'url' => ['/site/logout']];
                    $menuItems[] = ['label' => '<i class="fa fa-home"></i> Каталог книг', 'url' => ['/books/catalog']];
                    $menuItems[] = ['label' => '<i class="fa fa-home"></i> Авторы', 'url' => ['/books/authors']];
                }
                echo "<h3>&nbsp;</h3>";
                echo Nav::widget([
                    'encodeLabels' => false,
                    'options' => ['class' => 'nav side-menu'],
                    'items' => $menuItems,
                ]);
                NavBar::end();
                ?>

                <!-- /menu footer buttons -->
                <!--div class="sidebar-footer hidden-small">
                    <a data-toggle="tooltip" data-placement="top" title="Settings">
                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Lock">
                        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                    </a>
                    <a href="/site/logout" data-toggle="tooltip" data-placement="top" title="Logout">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                    </a>
                </div-->
                <!-- /menu footer buttons -->
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <img src="/images/img.jpg" alt=""><?php echo Yii::$app->user->identity->username ?>
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="javascript:;"> Профиль</a></li>
                                <li><a href="<?php echo \yii\helpers\Url::toRoute('site/logout') ?>"><i class="fa fa-sign-out pull-right"></i> Выход</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">

                <div class="page-title">
                    <div class="title_left">
                        <h3><?php echo $this->title ?> <small><?php echo isset($this->params['notice']) ? $this->params['notice'] : '' ?></small></h3>
                    </div>

                    <!--div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">Go!</button>
                                </span>
                            </div>
                        </div>
                    </div-->
                </div>

                <div class="clearfix"></div>
                <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
                <?= Alert::widget() ?>
                <?= $content ?>

            </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
            <div class="pull-right">
                Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
