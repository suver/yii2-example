<?php

namespace backend\modules\books\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $sourcePath = '@backend/modules/books/assets';
    //public $basePath = '@webroot';
    //public $baseUrl = '@web';
    public $css = [
        'css/bookcatalog.css',
        'css/font-awesome.css',
    ];
    public $js = [
        'js/common.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
